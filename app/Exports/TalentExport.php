<?php

namespace App\Exports;

use App\Models\Talent;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class TalentExport implements FromCollection, ShouldAutoSize,WithHeadings
{ 
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
            $select  = "talent.talent_name";
            
            if ( isset($_GET['contact']) && $_GET['contact'] == 'on' ) 
            {
                $select = $select .",talent.talent_email,talent.talent_phone"; 
            }

            if (isset($_GET['member_date']) && $_GET['member_date'] == 'on')
            {
                $select = $select .", users.created_at as member_date";
            }

            if (isset($_GET['ready_jogja']) && $_GET['ready_jogja'] == 'on')
            {
                $select = $select .",talent.talent_onsite_jogja";
            }

            if (isset($_GET['ready_jakarta']) && $_GET['ready_jakarta'] == 'on')
            {
                $select = $select .",talent.talent_onsite_jakarta";
            }

            if (isset($_GET['isa']) && $_GET['isa'] == 'on')
            {
                $select = $select .",talent.talent_isa";
            }

            if (isset($_GET['created']) && $_GET['created'] == 'on')
            {
                $select = $select .",talent.talent_created_date";
            }

            if (isset($_GET['skill']) && $_GET['skill'] == 'on')
            {
                $select = $select .",talent.talent_skill";
            }
            
            if (isset($_GET['date_ready']) && $_GET['date_ready'] == 'on')
            {
                $select = $select .",talent.talent_date_ready";
            }

            if (isset($_GET['active']) && $_GET['active'] == 'on')
            {
                $select = $select .",talent.talent_last_active  ";
            }


            //ok lengkapin y , hati2 masalah komanya ,  krena kan penggabungan string
            //klo digabung komanya lupa nnti jadinya "talent_name talentEmail, talent_Phone
            //klo kosong gt jd error , gmn udah bisa y ? komanya yg benar seperti yg di contack ya pak?
            //y tergntung talent.talent_name,talent.talent_email,talent.talent_phone, users.created_at as member_date
            //nah klo digabungkan bener ga ada yg kosong , paham ga ? varubale $select cm dilanjutin terus kebawah
            //gmn udah paham ? paham pak

            $data = Talent::select(DB::raw($select)); 

            $data->join("users","talent.user_id","=","users.id","LEFT");

            if ( $_GET['talent_name'] ) {$data->where("talent_name","LIKE","%".$_GET['talent_name']."%"); }
            if ( $_GET['talent_phone'] ) {$data->where("talent_phone","LIKE","%".$_GET['talent_phone']."%"); }
            if ( $_GET['talent_email'] ) {$data->where("talent_email","LIKE","%".$_GET['talent_email']."%"); }
            // if ( $_GET['talent_address'] ) {$data->where("talent_address","LIKE","%".$_GET['talent_address']."%"); }
            if ( $_GET['talent_onsite_jogja'] ) {$data->where("talent_onsite_jogja",$_GET['talent_onsite_jogja']); }
            if ( $_GET['talent_onsite_jakarta'] ) {$data->where("talent_onsite_jakarta",$_GET['talent_onsite_jakarta']); }
            if ( $_GET['talent_isa'] ) {$data->where("talent_isa",$_GET['talent_isa']); }

            if ( $_GET['status_member'] == "member" )
            {
                $data->where("users.email","!=","");
            }

            if ( $_GET['status_member'] == "non-member" )
            {
                $data->where("users.email","=",null);
            }
            if ( $_GET['order'] != '' )
            {
                $ar = explode(",",$_GET['order']);
                foreach ( $ar as $row)
                {
                    $data->orderBy($row,"DESC");
                }
            }
            else
            {
                $data->orderBy("talent_id","DESC");
            }

            return $data = $data->get();
    }

    public function headings(): array
    {
        $select  = "talent.talent_name";
        if ( isset($_GET['contact']) && $_GET['contact'] == 'on' ) 
        {
              return [
            'Nama',
            'Email', 
        ];
        }
   
    }
    
}
