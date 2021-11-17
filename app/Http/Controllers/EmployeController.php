<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEmployeRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Auth;

class EmployeController extends Controller
{
    public function index()
    {
        $employees = User::all();

        if (Auth::user()->role_id == 1)
        {
            return view('auth.employees.index', compact('employees'));
        }else
        {
            abort(403, 'Acción no autorizada');
        }

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

    public function edit($slug)
    {
        $employe    = User::where('slug', $slug)->first();

        $roles      = Role::all();

        return view('auth.employees.edit', compact('employe', 'roles'));
    }

    public function update(UpdateEmployeRequest $request, $slug)
    {
        $employe = User::where('slug', $slug)->first();

        $employe->name      = $request->name;
        $employe->slug      = Str::slug($request->name);
        $employe->email     = $request->email;
        $employe->role_id   = $request->role_id;

        if ($request->password)
        {
            $employe->password = Hash::make($request->password);
        }

        $employe->save();

        return redirect()->route('employe.index')->with('success', 'Empleado actualizado correctamente');

    }

}
