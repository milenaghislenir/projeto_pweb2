<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Employees;
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
            'salary' => 'required|integer|min:0'
        ]);
        $data = [
            'name' => $request->name,
            'age' => $request->age,
            'position' => $request->position,
            'salary'=> $request->salary

        ];

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
            'salary' => 'required|integer|min:0'
        ]);
        $data = [
            'name' => $request->name,
            'age' => $request->age,
            'position' => $request->position,
            'salary'=> $request->salary

        ];

        $employee=Employees::find($id);
        $employee->update($data);

        return redirect("employee");
    }


    public function destroy(string $id)
    {
        $employee=Employees::find($id);
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
}
