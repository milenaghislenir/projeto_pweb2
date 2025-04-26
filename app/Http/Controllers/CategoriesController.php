<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('categories.index',['data'=>$categories]);
    }


    public function create()
    {
        $categories = Categories::all();
        return view('categories.form',['data'=>$categories]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'genre' => 'required|string|max:255',
            'description' => 'required|string|',
            'popularity' => 'required|integer|min:0' //máximo????
        ]);
        $data = [
            'genre' => $request->genre,
            'description' => $request->description,
            'popularity' => $request->popularity

        ];

        Categories::create($data);

        return redirect("category");
    }

    public function edit(string $id)
    {
        $category = Categories::find($id);
        return view('categories.form', ['category'=>$category]);
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'genre' => 'required|string|max:255',
            'description' => 'required|string|',
            'popularity' => 'required|integer|min:0' //máximo????
        ]);
        $data = [
            'genre' => $request->genre,
            'description' => $request->description,
            'popularity' => $request->popularity

        ];

        $category=Categories::find($id);
        $category->update($data);

        return redirect("category");
    }


    public function destroy(string $id)
    {
        $category=Categories::find($id);
        $category->delete();
        return redirect("category");
    }

    public function search(Request $request)
    {
        if (!empty($request->value)) {
            $value = $request->value;
            $type = $request->type;
            $data = Categories::where($type,'like',"%$value%")->get();

            if (empty($data)) {
                return view('categories.index', ['data'=>$data]);
            }

        }

        else {
            $data = Categories::all();
        }
        return view('categories.index', ['data'=>$data]);

    }
}
