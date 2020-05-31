<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Talent;

class TalentNewController extends Controller
{

    public function show(){
    	 // $data = Talent::paginate(20);
         $data = Talent::simplePaginate(20); 

    	return view('admin.TalentNew',compact('data'));
    }

    public function paginate_data(Request $request){
        if ($request->ajax()) {
            // $data = Talent::paginate(20);
            // $data = $data->simplePaginate(20);

            // for gender
            if ( $request->select == 'male' || $request->select == 'female')
            {
                $data = Talent::where("talent_gender","LIKE","%".$request->select."%");
                
            }// for skill
            else if( $request->select == 'all' || $request->select == 'yes' || $request->select == 'no')
            {
                $data = Talent::where("talent_skill","LIKE","%".$request->select."%");
                if ($data->count() == 0) {
                    echo "Not found data";
                }
                
            }
            else if( $request->select == "new")
            {
                $data = Talent::orderBy("talent_created_date","DESC");
            }
            else if( $request->select == "old")
            {
                $data = Talent::orderBy("talent_created_date","ASC");
            }    

            
            $data = $data->simplePaginate(20);
            return view('paginate.Talent_data',compact('data'))->render();
        }
    }

    public function condition(Request $request){
        $condition = $request->data;

        if (isset($condition)) 
        {
            if ($condition=='all') 
            {
                    $data = DB::table('talent');
            }
            else if($condition=='quarantine')
            {
                $data = DB::table('talent')
                            ->where("talent_condition","LIKE","%$condition%");
                                      
            }
            else if($condition == 'assign'){
                $data = DB::table('talent')
                            ->where("talent_condition","LIKE","%$condition%");
            }
            
            $data = $data->get(); 
            $no = 1;
            $output ='';
            foreach ($data as $talent ) {
                $output .= '
                            <tr>
                             <td>'.$no++.'</td>
                             <td>'.$talent->talent_name.'</td>
                             <td>'.$talent->talent_address.'</td>
                             <td>'.$talent->talent_skill.'</td>
                             <td>'.$talent->talent_created_date.'</td>
                             <td>'.$talent->talent_phone.'</td>
                             <td>'.'<a href="" >Details</a> || <a href="">Substeps</a>'.'</td>
                            </tr>
                            ';
            }
            echo $output;
                      
        }

    }


    public function search(Request $request){
        // DB::enableQueryLog();
           
    	   $keyword = $request->keyword;
           $condition = $request->condition;

                if (isset($keyword)) 
                {
                   $data = DB::table('talent')
                            ->where("talent_name","LIKE","%$keyword%")
                            ->orWhere("talent_phone","LIKE","%$keyword%")
                            ->orWhere("talent_email","LIKE","%$keyword%")
                            ->orWhere("talent_address","LIKE","%$keyword%");                 
                }              

    			
            $data = $data->get();
    	    $no = 1;
            $output ='';
    	    foreach ($data as $talent ) {
    	    	$output .= '
                            <tr>
                             <td>'.$no++.'</td>
                             <td>'.$talent->talent_name.'</td>
                             <td>'.$talent->talent_address.'</td>
                             <td>'.$talent->talent_skill.'</td>
                             <td>'.$talent->talent_created_date.'</td>
                             <td>'.$talent->talent_phone.'</td>
                             <td>'.'<a href="" >Details</a> || <a href="">Substeps</a>'.'</td>
                            </tr>
                            ';
    	    }
            echo $output;
    	    // return response()->json($data);
            // $query = DB::getQueryLog();
         
    }

}
