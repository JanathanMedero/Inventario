<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class EmployeController extends Controller
{
    public function index()
    {
        $employees = User::all();

        return view('auth.employees.index', compact('employees'));
    }

    public function delete($slug)
    {
        $employe = User::where('slug', $slug)->delete();

        return back()->with('success', 'Empleado eliminado correctamente'); 
    }

    public function store(Request $request)
    {
        $employe = new User;

        $employe->role_id = $request->role_id;
        $employe->name = $request->name;
        $employe->slug = Str::slug($request->name);
        $employe->email = $request->email;
        $employe->password = Hash::make($request->password);

        $employe->save();

        return redirect()->route('employe.index')->with('success', 'Empleado creado correctamente');
    }
}
