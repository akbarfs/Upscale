<?php

namespace App\Imports;


use Illuminate\Support\Facades\DB;
use App\Models\Pra_talent;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class PratalentImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       
        
      
            $data=DB::table('pra_talent')->where([['pt_fullname','=',$row['Full name']],['pt_email','=',$row['Email']],['pt_phone1','=',$row['Phone 1']]])->count();
            // dd($data);
            // die();
            if($data==0){

       return new Pra_talent([
            //
            'pt_linkedin_id'=> $row['id'],
            'pt_profile_url'=>$row['Profile url'],
            'pt_fullname'=>$row['Full name'],
            'pt_email'=>$row['Email'],
            'pt_phone1'=>$row['Phone 1'],
            'pt_title'=>$row['Title'],
            'pt_avatar'=>$row['Avatar'],
            'pt_location'=>$row['Location'],
            'pt_birthday'=>$row['Birthday'],
            'pt_organization1'=>$row['Organization 1'],
            'pt_organization_position1'=>$row['Organization Title 1'],
            'pt_organization_start1'=>$row['Organization Start 1'],
            'pt_organization_end1'=>$row['Organization End 1'],
            'pt_organization2'=>$row['Organization 2'],
            'pt_organization_position2'=>$row['Organization Title 2'],
            'pt_organization_start2'=>$row['Organization Start 2'],
            'pt_organization_end2'=>$row['Organization End 2'],
           
            'pt_education'=>$row['Education 1'],
            'pt_education_degree'=>$row['Education Degree 1'],
            'pt_education_major'=>$row['Education FOS 1'],
            'pt_education_start'=>$row['Education Start 1'],
            'pt_education_end'=>$row['Education End 1'],
            'pt_skill'=>$row['Skills'],
            'pt_status'=>"draft",
            'pt_from'=>"linkedin",
            'pt_created_date'=>Carbon::now('Asia/Jakarta'),

        ]);

        }
        else{

        }

    
    
    }
}
        // 'pt_organization4'=>$row[48],
        //     'pt_organization_position4'=>$row[49],
        //     'pt_organization_start4'=>$row[50],
        //     'pt_organization_end4'=>$row[51],
        //     'pt_organization5'=>$row[58],
        //     'pt_organization_position5'=>$row[59],
        //     'pt_organization_start5'=>$row[60],
        //     'pt_organization_end5'=>$row[61],
        //     'pt_organization6'=>$row[68],
        //     'pt_organization_position6'=>$row[69],
        //     'pt_organization_start6'=>$row[70],
        //     'pt_organization_end6'=>$row[71],
        //     'pt_organization7'=>$row[78],
        //     'pt_organization_position7'=>$row[79],
        //     'pt_organization_start7'=>$row[80],
        //     'pt_organization_end7'=>$row[81],

        // 'pt_linkedin_id'=> $row['id'],
        // 'pt_profile_url'=>$row['Profile url'],
        // 'pt_fullname'=>$row['Full name'],
        // 'pt_email'=>$row['Email'],
        // 'pt_phone1'=>$row['Phone 1'],
        // 'pt_title'=>$row["Title"],
        // 'pt_avatar'=>$row[7],
        // 'pt_location_id'=>$row[8],
        // 'pt_birthday'=>$row[10],
        // 'pt_organization1'=>$row[28],
        // 'pt_organization_position1'=>$row[29],
        // 'pt_organization_start1'=>$row[30],
        // 'pt_organization_end1'=>$row[31],
        // 'pt_organization2'=>$row[38],
        // 'pt_organization_position2'=>$row[39],
        // 'pt_organization_start2'=>$row[40],
        // 'pt_organization_end2'=>$row[41],
       
        // 'pt_education'=>$row[98],
        // 'pt_education_degree'=>$row[99],
        // 'pt_education_major'=>$row[100],
        // 'pt_education_start'=>$row[102],
        // 'pt_education_end'=>$row[103],
        // 'pt_skill'=>$row[119],
        // 'pt_status'=>"unprocess",
        // 'pt_created_date'=>Carbon::now(),