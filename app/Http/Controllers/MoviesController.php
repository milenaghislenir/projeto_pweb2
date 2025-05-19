<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Directors;
use App\Models\Movies;
use Barryvdh\DomPDF\Facade\Pdf;
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

        $movie=Movies::find($id);
        $movie->update($data);

        return redirect("movie");
    }

    public function destroy(string $id)
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

    public function report()
    {
        $movies = Movies::orderBy('title')->get();

        $data = [
            'movies' => $movies,
        ];

        $pdf = Pdf::loadView('movies.report', $data);
        return $pdf->download('relatorio_listagem_movies.pdf');
    }
}
