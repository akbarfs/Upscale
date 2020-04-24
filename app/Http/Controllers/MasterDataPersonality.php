<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\QuestionModel;
class MasterDataPersonality extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noper = 1;
        $p = DB::table('test_question')
            ->join('question','question.question_id','=','test_question.tq_question_id')
            ->where('test_question.tq_ct_id','=','8')
            ->get();

        return view('admin.personality',compact('p','noper'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

                $question = new QuestionModel;
                $question->question_text = $request->text_q;
                $question->question_desc = $request->desc_q;
                $question->question_type = "personality";
                $question->save();
                $tq = DB::table('test_question')->insert([
                    'tq_question_id'=>$question->question_id,
                    'tq_ct_id'=>"8",
                    'tq_sort'=>$request->sort,
                    'tq_active'=>$request->active
                ]);
        return redirect()->back()->with('successpersonality','Data Berhasil Di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $person = DB::table('test_question')
        ->join('question','question.question_id','=','test_question.tq_question_id')
        ->where('test_question.tq_ct_id','=','8')
        ->where('tq_id',$id)
        ->first();
        return response()->json($person);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $now = Carbon::now('Asia/Jakarta');

        $person = DB::table('test_question')
        ->join('question','question.question_id','=','test_question.tq_question_id')
        ->where('test_question.tq_ct_id','=','8')
        ->where('tq_id',$id)
        ->first();
                    $update = DB::table('question')->where('question_id',$person->tq_question_id)->update([
                        'question_text'=>$request->text_q,
                        'question_desc'=>$request->desc_q,
                        'question_updated_date'=>$now
                    ]);
                    $updatetq = DB::table('test_question')->where('tq_id',$id)->update([
                        'tq_sort'=>$request->sort,
                        'tq_active'=>$request->active,
                        'tq_updated_date'=>$now
                    ]);
        return redirect()->back()->with('successpersonality','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = DB::table('test_question')
        ->join('question','question.question_id','=','test_question.tq_question_id')
        ->where('test_question.tq_ct_id','=','8')
        ->where('tq_id',$id)
        ->first();
            $update = DB::table('question')->where('question_id',$person->tq_question_id)->delete();
            $updatetq = DB::table('test_question')->where('tq_id',$id)->delete();
            return redirect()->back();
    }

    public function ubahactive($id){
        $update = DB::table('test_question')->where('tq_id',$id)->update([
            'tq_active'=>"YES"
        ]);
        return redirect()->back();
    }
}
