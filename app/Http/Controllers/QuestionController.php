<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CMS;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Blog;
use App\Models\Package;
use App\Models\Questions;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function questionsList(){
        $question =Questions::orderBy('sequence','ASC')->get();
        return view('admin.question.questionList',compact('question'));
    }

    public function addQuestions()
    {
        return view('admin.question.addQuestion');
    }

    public function submitQuestions(Request $request)
    {
        // dd($request->all());
        //update part is ni done yet.....
        if(!empty($request->id)){
            $question =  Questions::find($request->id);
            $question->question = $request->question;
            $question->use_for = $request->questionfor;
            $question->question_type = $request->question_type;
            $question->number_of_values = $request->number_of_values;
            $question->sequence = $request->sequence; 
           
            $question->save();
            Alert::success('Success', 'Question updated !');
        }else{
            $validated = $request->validate([
                'question' => 'required',
                'sequence' => 'required',
            ]);

            $value =  $request->values ;
            if(!empty($value)){
                $new_value = implode("~ ", $value);
            }
            else{
                $new_value = '';
            }
            $question = new Questions();
            $question->question = $request->question;
            $question->use_for = $request->questionfor;
            $question->question_type = $request->question_type;
            $question->number_of_values = $request->number_of_values;
            $question->values = $new_value;
            $question->sequence = $request->sequence;           
            $question->save();
            Alert::success('Success', 'Question added !');
        }
        
        return redirect()->route('questionsList');
    }

    public function deleteQuestions(Request $request)
    {
        $delete = Questions::find($request->id);
        $delete->delete();
    }

    public function editQuestions($id)
    {
        $pakage = Questions::where('id',$id)->first();
        return view('admin.question.addPackages')->with('cms',$pakage);
    }
}   