<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bombonieres;

class BombonieresController extends Controller
{
    public function index()
    {
        $bombonieres = Bombonieres::all();
        return view('bombonieres.index', ['data' => $bombonieres]);
    }

    public function create()
    {
        return view('bombonieres.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'candy' => 'required|string|max:255',
            'drink' => 'required|string|max:255',
            'salty' => 'required|string|max:255',
        ]);

        $data = [
            'candy' => $request->candy,
            'drink' => $request->drink,
            'salty' => $request->salty,
        ];

        Bombonieres::create($data);

        return redirect("bomboniere");
    }

    public function edit(string $id)
    {
        $bomboniere = Bombonieres::find($id);
        return view('bombonieres.form', ['bomboniere' => $bomboniere]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'candy' => 'required|string|max:255',
            'drink' => 'required|string|max:255',
            'salty' => 'required|string|max:255',
        ]);

        $data = [
            'candy' => $request->candy,
            'drink' => $request->drink,
            'salty' => $request->salty,
        ];

        $bomboniere = Bombonieres::find($id);
        $bomboniere->update($data);

        return redirect("bomboniere");
    }

    public function destroy(string $id)
    {
        $bomboniere = Bombonieres::find($id);
        $bomboniere->delete();
        return redirect("bomboniere");
    }

    public function search(Request $request)
    {
        if (!empty($request->value)) {
            $value = $request->value;
            $type = $request->type;
            $data = Bombonieres::where($type, 'like', "%$value%")->get();
        } else {
            $data = Bombonieres::all();
        }

        return view('bombonieres.index', ['data' => $data]);
    }
}
