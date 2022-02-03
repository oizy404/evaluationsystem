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

    public function access($key){

        try{
            $evaluation = Evaluation::where('access_key',$key)->first();

            if($evaluation->status === 0)
                return redirect()->route('keyNotFound');
            else
                if($evaluation->tool_id==5){
                    return view('views-ntpEval.ratingsNTP-page')->with('evaluation', $evaluation);  
                }
                elseif($evaluation->tool_id==3){
                    return view('views-student.ratingsAdmin')->with('evaluation', $evaluation);  
                }
                elseif($evaluation->tool_id==4){
                    return view('views-student.ratingsSupervisor-page')->with('evaluation', $evaluation);
                }
        }
        catch(Exception $e){
            return redirect()->route('front');
        }
        
    }
}
