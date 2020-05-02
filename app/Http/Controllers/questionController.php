<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Question;

class questionController extends Controller
{
    public function create()
    {
        return view('admin.questionanswer.question');
    }

    public function store(Request $request)
    {
        // $answer=$request->answer;
        // $answer=explode(' ',$answer);
        // $data = [
        //     'question_id'=>$request->question_id,
        //     'question'=>$request->question,
        //     'description'=>$request->description,
        //     'type'=>$request->type,
        //     'answer' => $answer // var txt =  imam batch 5
        // ];                                          // txt.slice(" ") => [imam,batch,5]
        // dd($request->all());

        Question::create ([
            'type_question' => $request->type_question,
            'question' => $request->question,
            'description' => $request->description,
            'type' => $request->type
        ]);
        return redirect('/admin/question/create');
    }
}
