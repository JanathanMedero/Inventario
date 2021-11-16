<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index()
    {
        $employees = User::all();

        return view('auth.employees.index', compact('employees'));
    } 
}
