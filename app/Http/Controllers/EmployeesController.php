<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Employees;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employees::all();
        return view('employees.index',['data'=>$employees]);
    }


    public function create()
    {
        $employees = Employees::all();
        return view('employees.form',['data'=>$employees]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'position' => 'required|string',
            'salary' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $directory = "employees/";

            $image->storeAs(
                $directory,
                $fileName,
                'public'
            );
            $data['image'] = $directory . $fileName;
        }
        Employees::create($data);

        return redirect("employee");
    }

    public function edit(string $id)
    {
        $employee = Employees::find($id);
        return view('employees.form', ['employee'=>$employee]);
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'position' => 'required|string',
            'salary' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $directory = "employees/";

            $image->storeAs(
                $directory,
                $fileName,
                'public'
            );
            $data['image'] = $directory . $fileName;
        }

        $employee=Employees::find($id);
        $employee->update($data);

        return redirect("employee");
    }


    public function destroy(string $id)
    {
        $employee=Employees::find($id);

        if ($employee->image) {
            $imagePath = public_path("storage/{$employee->image}");
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $employee->delete();
        return redirect("employee");
    }

    public function search(Request $request)
    {
        if (!empty($request->value)) {
            $value = $request->value;
            $type = $request->type;
            $data = Employees::where($type,'like',"%$value%")->get();

            if (empty($data)) {
                return view('employees.index', ['data'=>$data]);
            }

        }

        else {
            $data = Employees::all();
        }
        return view('employees.index', ['data'=>$data]);

    }

    public function report()
    {
        $movies = Employees::orderBy('name')->get();

        $data = [
            'employees' => $employees,
        ];

        $pdf = Pdf::loadView('employees.report', $data);
        return $pdf->download('relatorio_listagem_employees.pdf');
    }
}
