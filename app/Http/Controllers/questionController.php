<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Inquery;
use App\InqueryOption;

class questionController extends Controller
{
    public function create()
    {
        return view('admin.questionanswer.question');
    }

    public function store(Request $request)
    {
        $id = Inquery::create ([
            'type_question' => $request->type_question,
            'question' => $request->question,
            'description' => $request->description, 
            'type_option' => $request->type_option
        ]);
        
        $array = $request->option; 
        foreach($array as $data)
        {
            InqueryOption::create ([
                'inquery_id' => $id->id,
                'option' => $data,
            ]);
        }
        return redirect('question/create');
    }
}
