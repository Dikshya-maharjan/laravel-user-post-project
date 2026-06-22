<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IdCard;
use App\Models\Employee;

class IdCardController extends Controller
{
    // Show create form
    public function create()
    {
        $employees = Employee::all();
        return view('idcard.create', compact('employees'));
    }

    // Store ID card
    public function store(Request $request)
    {
       

        IdCard::create([
            'employee_id' => $request->employee_id,
            'card_number' => $request->card_number
        ]);

        return redirect('/employees');
    }
}