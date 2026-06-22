<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee; // ✅ MUST IMPORT MODEL

class EmployeeController extends Controller
{
    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        Employee::create([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect('/employees');
    }

    public function index()
    {
        $employees = Employee::with('idCard')->get();
        return view('employee.index', compact('employees'));
    }
}