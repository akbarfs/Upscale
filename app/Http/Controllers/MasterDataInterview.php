<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Models\QuestionModel;
class MasterDataInterview extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interview=DB::table('test_question')
                ->join('question','question.question_id','=','test_question.tq_question_id')
                ->join('category_test','test_question.tq_ct_id','=','category_test.ct_id')
                ->where('tq_ct_id','!=','8')
                ->where('tq_active','=','YES')
                ->orderBy('tq_sort', 'asc')
                ->get();
        $no =1;
        $nopos =1;

        $noper = 1;
        $p = DB::table('test_question')
            ->join('question','question.question_id','=','test_question.tq_question_id')
            ->where('test_question.tq_ct_id','=','8')
            ->get();

        $ct = DB::table('category_test')->where('ct_name','!=','Personality Value')->get();
        $qt = DB::table('question')
        ->select('question_type')
        ->groupBy('question_type')
        ->where('question_type','!=','')
        ->get();
        return view('admin.masterdatainterview',compact('interview','no','qt','ct','nopos','p','noper'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $qt = new QuestionModel;
        $qt->question_text = $request->text_q;
        $qt->question_desc = $request->desc_q;
        $qt->question_type = $request->tipe;
        $qt->save();
        $tq = DB::table('test_question')->insert([
            'tq_question_id'=>$qt->question_id,
            'tq_ct_id'=>$request->category,
            'tq_sort'=>$request->sort,
            'tq_active'=>$request->active
        ]);
        return redirect()->back()->with('successinterview','Data Berhasil Di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $interview=DB::table('test_question')
                ->join('question','question.question_id','=','test_question.tq_question_id')
                ->join('category_test','test_question.tq_ct_id','=','category_test.ct_id')
                ->where('tq_ct_id','!=','8')
                ->where('tq_active','=','YES')
                ->where('tq_id','=',$id)
                ->first();
        return response()->json($interview);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $interview=DB::table('test_question')
                ->join('question','question.question_id','=','test_question.tq_question_id')
                ->join('category_test','test_question.tq_ct_id','=','category_test.ct_id')
                ->where('tq_ct_id','!=','8')
                ->where('tq_active','=','YES')
                ->where('tq_id','=',$id)
                ->first();
        return response()->json($interview);
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
        $a = DB::table('test_question')->where('tq_id',$id)->first();

        $qt = DB::table('question')->where('question_id',$a->tq_question_id)->update([
            'question_text'=>$request->text_q,
            'question_desc'=>$request->desc_q,
            'question_type'=>$request->tipe,
            'question_updated_date'=>$now
        ]);

        $tq = DB::table('test_question')->where('tq_id',$id)->update([
            'tq_ct_id'=>$request->category,
            'tq_sort'=>$request->sort,
            'tq_updated_date'=>$now,
            'tq_active'=>$request->active
        ]);

        return redirect()->back()->with('successinterview','Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = DB::table('test_question')->where('tq_id',$id)->first();
        $qt = DB::table('question')->where('question_id',$a->tq_question_id)->delete();
        $tq = DB::table('test_question')->where('tq_id',$id)->delete();
        return redirect()->back()->with('successinterview','Data berhasil di hapus');
    }

    public function storeposition(Request $req){
        $this->validate($req,[
            'singkatan'=>'max:3',
        ],[
            'max'=>':attribute Max :max'
        ]);
        $singkatan = strtoupper($req->singkatan);
        $set = DB::table('category_test')->insert([
            'ct_name'=>$req->positionname,
            'ct_desc'=>$req->posdesc,
            'ct_singkatan'=>$singkatan,
        ]);

        return redirect()->back()->with('successpos','Data Berhasil di Save');
    }

    public function editposition($id){
        $ct = DB::table('category_test')
        ->where('ct_name','!=','Personality Value')
        ->where('ct_id',$id)
        ->first();
        return response()->json($ct);
    }

    public function updateposition(Request $req, $id){
        $this->validate($req,[
            'singkatan'=>'max:3',
        ],[
            'max'=>':attribute Max :max'
        ]);
        $singkatan = strtoupper($req->singkatan);
        $ct = DB::table('category_test')
        ->where('ct_id',$id)
        ->update([
            'ct_name'=>$req->positionname,
            'ct_desc'=>$req->posdesc,
            'ct_singkatan'=>$singkatan,
        ]);

        return redirect()->back()->with('successpos','Data Berhasil di Update');
    }

    public function hapusposition($id){
        $delete = DB::table('category_test')->where('ct_id',$id)->delete();
        return redirect()->back()->with('successpos','Data Berhasil di Delete');
    }
}
