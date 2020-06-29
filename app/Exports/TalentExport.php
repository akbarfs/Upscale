<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class TalentExport implements FromCollection, ShouldAutoSize, WithHeadings
{ 
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
            $data = Talent::select(DB::raw("talent.talent_name, talent.talent_email,  users.created_at as member_date"));

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
        return [
            'Nama',
            'Email', 
        ];
    }
    
}
