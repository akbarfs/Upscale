<?php

namespace App\Exports;

use App\Models\Talent;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class TalentExport implements FromCollection, ShouldAutoSize
{ 
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
            $data = Talent::select(DB::raw("*, users.email as member_email"));

            $data->join("users","talent.user_id","=","users.id","LEFT");
            
            if ( $_GET['talent_name'] ) {$data->where("talent_name","LIKE","%".$_GET['talent_name']."%"); }
            if ( $_GET['talent_phone'] ) {$data->where("talent_phone","LIKE","%".$_GET['talent_phone']."%"); }
            if ( $_GET['talent_email'] ) {$data->where("talent_email","LIKE","%".$_GET['talent_email']."%"); }
            // if ( $_GET['talent_address'] ) {$data->where("talent_address","LIKE","%".$_GET['talent_address']."%"); }        

            $data->orderBy("talent_id","DESC");

            return $data = $data->paginate(10);
    }
    
}
