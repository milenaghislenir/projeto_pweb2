<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Directors;
use App\Models\Movies;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function index()
    {
        $movies = Movies::all();
        return view('movies.index',['data'=>$movies]);
    }

    public function create()
    {
        $categories = Categories::all();
        $directors = Directors::all();
        return view('movies.form',['categories'=>$categories,'directors'=>$directors]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'director_id' => 'required',
            'year' => 'required|string',
            'category_id' => 'required',
            'tomatoes' => 'required|integer|min:0'
        ]);
        $data = [
            'title' => $request->title,
            'director_id' => $request->director_id,
            'year' => $request->year,
            'category_id'=> $request->category_id,
            'tomatoes' => $request->tomatoes

        ];

        Movies::create($data);

        return redirect("movie");
    }

    public function edit(string $id)
    {
        $categories = Categories::all();
        $directors = Directors::all();
        $movie = Movies::find($id);
        return view('movies.form', ['movie'=>$movie,'categories'=>$categories,'directors'=>$directors]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'director_id' => 'required',
            'year' => 'required|string',
            'category_id' => 'required',
            'tomatoes' => 'required|integer|min:0'
        ]);
        $data = [
            'title' => $request->title,
            'director_id' => $request->director_id,
            'year' => $request->year,
            'category_id'=> $request->category_id,
            'tomatoes' => $request->tomatoes

        ];

        $movie=Movies::find($id);
        $movie->update($data);

        return redirect("movie");
    }

    public function destroy(string $id)
    {
        $movie=Movies::find($id);
        $movie->delete();
        return redirect("movie");
    }

    public function search(Request $request)
    {
        if (!empty($request->value)) {
            $value = $request->value;
            $type = $request->type;
            $data = Movies::where($type,'like',"%$value%")->get();

            if (empty($data)) {
                return view('movies.index', ['data'=>$data]);
            }

        }

        else {
            $data = Movies::all();
        }
        return view('movies.index', ['data'=>$data]);

    }
}
