<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class attendController extends Controller
{

    public function __construct()
    {
        if(session('level') != 'admin') {
            Auth::logout();
            return redirect('/');
        }
        $this->middleware('auth');
    }

    public function index()
    {
        $staff = DB::table('attendance_staff')->where('as_active', '=', 'Y')->orderBy('as_name', 'ASC')->get();
        
        return view('admin.attendance.home', compact('staff'));
    }
    
    public function uploadlog(Request $request)
    {
        ini_set('memory_limit', '-1');
        $file   = $request->file('file');
        $data   = file_get_contents($file);
        $data   = preg_split( '/\r\n|\r|\n/', $data);
        
        if($request->type == 'dat') {
            for ($i=0; $i<(count($data)-1); $i++) {
            	$a = preg_split('/\s+/', $data[$i]);
                // 	echo $a[0].'-'.$a[1].'-'.$a[2].'-'.$a[3].'-'.$a[4].'<br>';
                try {
                    DB::table('attendance')->insert([ 'attendance_staff_id' => $a[0], 'attendance_time' => $a[1]." ".$a[2] ]);
                } catch (\Illuminate\Database\QueryException $e) {
                    // echo $e->getMessage();
                }
            }
        } else {
            // echo count($data); die();
            for ($i=1; $i<(count($data)-1); $i++) {
            	$a    = explode(',', $data[$i]);
            	$date = substr($a[3], 6,4).'-'.substr($a[3], 3,2).'-'.substr($a[3], 0,2);
            	$time = substr($a[3], 11,6).':00';
                // echo $a[2].' - '.$a[3].' - '.$date.' - '.$time.'<br>';
                try {
                    DB::table('attendance')->insert([ 'attendance_staff_id' => $a[2], 'attendance_time' => $date.' '.$time ]);
                } catch (\Illuminate\Database\QueryException $e) {
                    // echo $e->getMessage();
                }
            }
        }
        
        return redirect()->back()->with('success', 'Success Input');
    }
    
    public function dopermit(Request $request)
    {
        DB::table('attendance_permit')->insert([ 
            'ap_staff_id' => $request->staff, 
            'ap_start' => $request->start,
            'ap_end' => $request->end,
            'ap_status' => $request->status,
            'ap_desc' => $request->desc
        ]);
        // return redirect()->back();
        return redirect()->back()->with('success', 'Success Input');
    }
    
    public function interview(Request $request)
    {
        if($request->name == 'dian') {
            $url = "https://whereby.com/erporate-hiring";
        }
        else {
            $url = "https://whereby.com/erporate-hiring1";
        }
        
        return view('admin.attendance.interview', compact('url'));
    }
}
?>