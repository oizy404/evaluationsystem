<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;
use App\Models\Score;
use App\Models\Student;
use App\Models\Comment;

class RatingsController extends Controller
{
    public function access(Request $request){

            try{
            $evaluation = Evaluation::where('access_key', trim($request->access_key))->first();
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

    public function submit(Request $request){

        $permitted_chars = '0123456789';
        $stud_id = (int) substr(str_shuffle($permitted_chars), 0, 10);

        echo $stud_id;

        $comment = new Comment;
        $student = new Student;

        $eval_id = $request->evaluation_id;
        $tool_id = $request->tool_id;

        $student->id = $stud_id;

        if($request->fname == ""){
            $student->fname = "";
        }
        else{
            $student->fname = $request->fname;
        }
        
        if($request->lname == ""){
            $student->lname = "";
        }
        else{
            $student->lname = $request->lname;
        }

        if($request->course == ""){
            $student->section = "";
        }
        else{
            $student->section = $request->course;
        }

        $student->evaluation_id = $eval_id;
        $student->save();

        if($request->comment){
            $comment->comment = $request->comment;
        }
        else{
            $comment->comment = "";
        }
        $comment->student_id = $stud_id;
        $comment->evaluation_id = $eval_id;
        $comment->save();

        $data = array();
        //organize $request array to new array '$data'. Item and score only
        foreach ($request->request as $key => $value){
            if(isset($key)){
                if($key != "_method" && $key != "_token" && $key != "evaluation_id" && $key != "tool_id" &&
                $key != "comment" && $key != "fname" && $key != "lname" && $key != "course")
                {
                    $data[$key] = $value;
                }
            }
        } 
        //dd($request->request);
     
           foreach($data as $item => $score){
               //echo $item ." => ".$score;
              // echo "<br>";
              $score = Score::create([
                'evaluation_id' => $eval_id,
                'tool_id' => $tool_id,
                'item_id' => $item,
                'score' => $score,
                'student_id' => $stud_id
              ]);
           }
           
       return redirect()->route('success-eval');
       
    
    }

    public function submitTotal(Request $request){
       // return $request->all();
        foreach($request->request as $key => $value){
            echo $key. " = ". $value;
            echo "<br>";    
        }
        
        return redirect("evaluations/".$request->evaluation."?status=stay");
    }
}
