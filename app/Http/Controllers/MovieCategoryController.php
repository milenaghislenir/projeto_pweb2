<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Movies;
use Illuminate\Http\Request;

class MovieCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Categories $category)
    {
        $movies = $category->movies()->get();
        return view('moviecategory.list', ['data' => $movies, 'category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Categories $category)
    {
        return view('movie.category.form', [
            'category' => $category
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'director_id' => 'required',
            'year' => 'required|string',
            'category_id' => 'required',
            'tomatoes' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $directory = "movies/";

            $image->storeAs(
                $directory,
                $fileName,
                'public'
            );
            $data['image'] = $directory . $fileName;
        }

        Movies::create($data);

        return redirect("movie");
    }


    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {

    }

    public function edit(Categories $category, string $id )
    {
        $movie = Categories::find($id);
        return view('movie.category.form', [
            'category' => $category,
            'movie' => $movie,
       ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id ,Categories $categories)
    {$request->validate([
        'title' => 'required|string|max:255',
        'director_id' => 'required',
        'year' => 'required|string',
        'category_id' => 'required',
        'tomatoes' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);
    $data = $request->all();
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $fileName = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $directory = "movies/";

        $image->storeAs(
            $directory,
            $fileName,
            'public'
        );
        $data['image'] = $directory . $fileName;
    }

    $movie=Movie::find($id);
    $movie->update($data);

    return redirect("movie");
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $category,string $id)
    {
        $movie=Movies::find($id);

        if ($movie->image) {
            $imagePath = public_path("storage/{$movie->image}");
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $movie->delete();
        return redirect("movie");
    }
}
