<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function doAdmin(){
        return 'Admin';
    }
    public function prompts(Question $questions){
        $questions =  Question::all();
        return view('/admin.prompts',['questions' => $questions]);
    }
    public function doPrompt(Request $request, Question $questions){
        $prompt = Question::find($request->question_no);
        $prompt->prompt =  htmlentities($request->prompt);
        $prompt->save();
        return redirect('/admin/prompts')->with('status', 'Prompt updated!');
    }
    
}
