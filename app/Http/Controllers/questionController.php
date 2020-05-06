<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use App\Inquiry;
use App\InquiryQuestion;
use App\InquiryQOption;

class questionController extends Controller
{
    public function inquiry()
    {
        $inquiry = Inquiry::all();
        return view('admin.questionanswer.inquiry',compact('inquiry'));
    }

    public function storeInquiry(Request $request)
    {
        Inquiry::create ([ 
            'package_inquiry' => $request->package_inquiry
        ]);
        return redirect('inquiry');
    }

    public function destroyInquiry($id)
    {
        Inquiry::destroy($id);
        return redirect('inquiry');
    }

    public function create($id)
    {
        $inquiry = Inquiry::find($id);
        return view('admin.questionanswer.question',compact('inquiry'));
    }

    public function storeQuestion(Request $request)
    {
        $cek = InquiryQuestion::latest('sort')->first();
        if ($cek == null)
        { $sort = 0; }
        else
        { $sort= $cek->sort; }
        $id = InquiryQuestion::create ([
            'inquiry_id' => $request->inquiry_id,
            'question' => $request->question,
            'description' => $request->description, 
            'type_option' => $request->type_option,
            'sort' => $sort+1
        ]);
        
        $array = $request->option;
        foreach($array as $data)
        {
            InquiryQOption::create ([
                'question_id' => $id->id,
                'option' => $data,
            ]);
        }
        return redirect()->back();
    }

    public function destroyQuestion($id)
    {
        InquiryQuestion::destroy($id);
        return redirect()->back();
    }
}