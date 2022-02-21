<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;

class TeacherController extends Controller
{
    public function index(){
        $evaluations = Evaluation::where('status',1)->get();

        return view('views-student.dashboard')->with('evaluations', $evaluations);
    }

    public function access($key){

        try{
            $evaluation = Evaluation::where('access_key',$key)->first();

            if($evaluation->status == 0){
                return redirect()->route('keyNotFound');
            }
            else
                if($evaluation->tool_id==1){
                    return view('views-student.ratings-page')->with('evaluation', $evaluation);  
                }
                elseif($evaluation->tool_id==2){
                    return view('views-student.ratings-page')->with('evaluation', $evaluation);  
                }
        }
        catch(Exception $e){
            return redirect()->route('front');
        }
        
    }
}
