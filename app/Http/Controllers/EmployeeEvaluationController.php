<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Evaluation;

class EmployeeEvaluationController extends Controller
{
    public function index(){
        $evaluations = Evaluation::all();

        return view('views-employee.dashboard')->with('evaluations', $evaluations);
    }
}
