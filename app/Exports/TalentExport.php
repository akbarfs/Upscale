<?php

namespace App\Exports;

use App\Models\Talent;
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
            $select  = "talent.talent_name";
            
            if ( isset($_GET['contact']) && $_GET['contact'] == 'on' ) 
            {
                $select = $select .",talent.talent_email,talent.talent_phone"; 
            }

            if (isset($_GET['skill']) && $_GET['skill'] == 'on')
            {
                $select = $select .",talent.talent_skill";
            }
                 
            if (isset($_GET['date_ready']) && $_GET['date_ready'] == 'on')
            {
                $select = $select .",talent.talent_date_ready";
            }

            
            if (isset($_GET['created']) && $_GET['created'] == 'on')
            {
                $select = $select .",talent.talent_created_date";
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

            if (isset($_GET['active']) && $_GET['active'] == 'on')
            {
                $select = $select .",talent.talent_last_active  ";
            }

            if (isset($_GET['member_date']) && $_GET['member_date'] == 'on')
            {
                $select = $select .", users.created_at as member_date";
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

    // semua show
     if (( isset($_GET['contact']) && $_GET['contact'] == 'on' ) && (isset($_GET['skill']) && $_GET['skill'] == 'on') && 
     (isset($_GET['date_ready']) && $_GET['date_ready'] == 'on') && (isset($_GET['created']) && $_GET['created'] == 'on')  && 
     (isset($_GET['ready_jogja']) && $_GET['ready_jogja'] == 'on') && (isset($_GET['ready_jakarta']) && $_GET['ready_jakarta'] == 'on') &&  
     (isset($_GET['isa']) && $_GET['isa'] == 'on') && (isset($_GET['active']) && $_GET['active'] == 'on') && (isset($_GET['member_date']) && $_GET['member_date'] == 'on')
     ) 
     {
           return [
         'Nama',
         'Email',
         'Kontak',
         'Skill',
         'Ready',
         'Created',
         'Ready_Jogja', 
         'Ready_Jakarta',
         'ISA',
         'active',
         'Member_Date'
     ];
     }
     //kecuali member_date
     if (( isset($_GET['contact']) && $_GET['contact'] == 'on' ) && (isset($_GET['skill']) && $_GET['skill'] == 'on') && 
     (isset($_GET['date_ready']) && $_GET['date_ready'] == 'on') && (isset($_GET['created']) && $_GET['created'] == 'on')  && 
     (isset($_GET['ready_jogja']) && $_GET['ready_jogja'] == 'on') && (isset($_GET['ready_jakarta']) && $_GET['ready_jakarta'] == 'on') &&  
     (isset($_GET['isa']) && $_GET['isa'] == 'on') && (isset($_GET['active']) && $_GET['active'] == 'on') 
     ) 
     {
           return [
         'Nama',
         'Email',
         'Kontak',
         'Skill',
         'Ready',
         'Created',
         'Ready_Jogja', 
         'Ready_Jakarta',
         'ISA',
         'active',
     ];
     }
    //kecuali last active
     if (( isset($_GET['contact']) && $_GET['contact'] == 'on' ) && (isset($_GET['skill']) && $_GET['skill'] == 'on') && 
     (isset($_GET['date_ready']) && $_GET['date_ready'] == 'on') && (isset($_GET['created']) && $_GET['created'] == 'on')  && 
     (isset($_GET['ready_jogja']) && $_GET['ready_jogja'] == 'on') && (isset($_GET['ready_jakarta']) && $_GET['ready_jakarta'] == 'on') &&  
     (isset($_GET['isa']) && $_GET['isa'] == 'on') && (isset($_GET['member_date']) && $_GET['member_date'] == 'on')
     ) 
     {
           return [
         'Nama',
         'Email',
         'Kontak',
         'Skill',
         'Ready',
         'Created',
         'Ready_Jogja', 
         'Ready_Jakarta',
         'ISA',
         'Member_Date'
     ];
     }
     // kecuali ISA
     if (( isset($_GET['contact']) && $_GET['contact'] == 'on' ) && (isset($_GET['skill']) && $_GET['skill'] == 'on') && 
     (isset($_GET['date_ready']) && $_GET['date_ready'] == 'on') && (isset($_GET['created']) && $_GET['created'] == 'on')  && 
     (isset($_GET['ready_jogja']) && $_GET['ready_jogja'] == 'on') && (isset($_GET['ready_jakarta']) && $_GET['ready_jakarta'] == 'on') &&  
     (isset($_GET['active']) && $_GET['active'] == 'on') && (isset($_GET['member_date']) && $_GET['member_date'] == 'on')
     ) 
     {
           return [
         'Nama',
         'Email',
         'Kontak',
         'Skill',
         'Ready',
         'Created',
         'Ready_Jogja', 
         'Ready_Jakarta',
         'active',
         'Member_Date'
     ];
     }
     //kecuali ready_jakarta
     if (( isset($_GET['contact']) && $_GET['contact'] == 'on' ) && (isset($_GET['skill']) && $_GET['skill'] == 'on') && 
     (isset($_GET['date_ready']) && $_GET['date_ready'] == 'on') && (isset($_GET['created']) && $_GET['created'] == 'on')  && 
     (isset($_GET['ready_jogja']) && $_GET['ready_jogja'] == 'on') &&  
     (isset($_GET['isa']) && $_GET['isa'] == 'on') && (isset($_GET['active']) && $_GET['active'] == 'on') && (isset($_GET['member_date']) && $_GET['member_date'] == 'on')
     ) 
     {
           return [
         'Nama',
         'Email',
         'Kontak',
         'Skill',
         'Ready',
         'Created',
         'Ready_Jogja', 
         'ISA',
         'active',
         'Member_Date'
      
     ];
     }
     //kecuali ready_jogja
     if (( isset($_GET['contact']) && $_GET['contact'] == 'on' ) && (isset($_GET['skill']) && $_GET['skill'] == 'on') && 
     (isset($_GET['date_ready']) && $_GET['date_ready'] == 'on') && (isset($_GET['created']) && $_GET['created'] == 'on')  && 
     (isset($_GET['ready_jakarta']) && $_GET['ready_jakarta'] == 'on') &&  
     (isset($_GET['isa']) && $_GET['isa'] == 'on') && (isset($_GET['active']) && $_GET['active'] == 'on') && (isset($_GET['member_date']) && $_GET['member_date'] == 'on')
     ) 
     {
           return [
         'Nama',
         'Email',
         'Kontak',
         'Skill',
         'Ready',
         'Created',
         'Ready_Jakarta',
         'ISA',
         'active',
         'Member_Date'
      
     ];
     }
     //kecuali created
     if (( isset($_GET['contact']) && $_GET['contact'] == 'on' ) && (isset($_GET['skill']) && $_GET['skill'] == 'on') && 
     (isset($_GET['date_ready']) && $_GET['date_ready'] == 'on') && 
     (isset($_GET['ready_jogja']) && $_GET['ready_jogja'] == 'on') && (isset($_GET['ready_jakarta']) && $_GET['ready_jakarta'] == 'on') &&  
     (isset($_GET['isa']) && $_GET['isa'] == 'on') && (isset($_GET['active']) && $_GET['active'] == 'on') && (isset($_GET['member_date']) && $_GET['member_date'] == 'on')
     ) 
     {
           return [
         'Nama',
         'Email',
         'Kontak',
         'Skill',
         'Ready',
         'Ready_Jogja', 
         'Ready_Jakarta',
         'ISA',
         'active',
         'Member_Date'
      
     ];
     }
     //kecuali date_ready
     if (( isset($_GET['contact']) && $_GET['contact'] == 'on' ) && (isset($_GET['skill']) && $_GET['skill'] == 'on') && 
     (isset($_GET['created']) && $_GET['created'] == 'on')  && 
     (isset($_GET['ready_jogja']) && $_GET['ready_jogja'] == 'on') && (isset($_GET['ready_jakarta']) && $_GET['ready_jakarta'] == 'on') &&  
     (isset($_GET['isa']) && $_GET['isa'] == 'on') && (isset($_GET['active']) && $_GET['active'] == 'on') && (isset($_GET['member_date']) && $_GET['member_date'] == 'on')
     ) 
     {
           return [
         'Nama',
         'Email',
         'Kontak',
         'Skill',
         'Created',
         'Ready_Jogja', 
         'Ready_Jakarta',
         'ISA',
         'active',
         'Member_Date'
      
     ];
     }
     //kecuali skill
     if (( isset($_GET['contact']) && $_GET['contact'] == 'on' ) && 
     (isset($_GET['date_ready']) && $_GET['date_ready'] == 'on') && (isset($_GET['created']) && $_GET['created'] == 'on')  && 
     (isset($_GET['ready_jogja']) && $_GET['ready_jogja'] == 'on') && (isset($_GET['ready_jakarta']) && $_GET['ready_jakarta'] == 'on') &&  
     (isset($_GET['isa']) && $_GET['isa'] == 'on') && (isset($_GET['active']) && $_GET['active'] == 'on') && (isset($_GET['member_date']) && $_GET['member_date'] == 'on')
     ) 
     {
           return [
         'Nama',
         'Email',
         'Kontak',
         'Ready',
         'Created',
         'Ready_Jogja', 
         'Ready_Jakarta',
         'ISA',
         'active',
         'Member_Date'
      
     ];
     }
     //kecuali contact
     if ((isset($_GET['skill']) && $_GET['skill'] == 'on') && 
     (isset($_GET['date_ready']) && $_GET['date_ready'] == 'on') && (isset($_GET['created']) && $_GET['created'] == 'on')  && 
     (isset($_GET['ready_jogja']) && $_GET['ready_jogja'] == 'on') && (isset($_GET['ready_jakarta']) && $_GET['ready_jakarta'] == 'on') &&  
     (isset($_GET['isa']) && $_GET['isa'] == 'on') && (isset($_GET['active']) && $_GET['active'] == 'on') && (isset($_GET['member_date']) && $_GET['member_date'] == 'on')
     ) 
     {
           return [
         'Nama',
         'Skill',
         'Ready',
         'Created',
         'Ready_Jogja', 
         'Ready_Jakarta',
         'ISA',
         'active',
         'Member_Date'
     ];
     }
     
     //kecuali member_date dan last_active
     if (( isset($_GET['contact']) && $_GET['contact'] == 'on' ) && (isset($_GET['skill']) && $_GET['skill'] == 'on') && 
     (isset($_GET['date_ready']) && $_GET['date_ready'] == 'on') && (isset($_GET['created']) && $_GET['created'] == 'on')  && 
     (isset($_GET['ready_jogja']) && $_GET['ready_jogja'] == 'on') && (isset($_GET['ready_jakarta']) && $_GET['ready_jakarta'] == 'on') &&  
     (isset($_GET['isa']) && $_GET['isa'] == 'on')
     ) 
     {
           return [
         'Nama',
         'Email',
         'Kontak',
         'Skill',
         'Ready',
         'Created',
         'Ready_Jogja', 
         'Ready_Jakarta',
         'ISA',
     ];
     }
        //kecuali member_date, last_active, ISA 
     if (( isset($_GET['contact']) && $_GET['contact'] == 'on' ) && (isset($_GET['skill']) && $_GET['skill'] == 'on') && 
     (isset($_GET['date_ready']) && $_GET['date_ready'] == 'on') && (isset($_GET['created']) && $_GET['created'] == 'on')  && 
     (isset($_GET['ready_jogja']) && $_GET['ready_jogja'] == 'on') && (isset($_GET['ready_jakarta']) && $_GET['ready_jakarta'] == 'on') 
     ) 
     {
           return [
         'Nama',
         'Email',
         'Kontak',
         'Skill',
         'Ready',
         'Created',
         'Ready_Jogja', 
         'Ready_Jakarta',

     ];
     }
     //kecuali member_date, last_active, ISA, ready_jakarta
     if (( isset($_GET['contact']) && $_GET['contact'] == 'on' ) && (isset($_GET['skill']) && $_GET['skill'] == 'on') && 
     (isset($_GET['date_ready']) && $_GET['date_ready'] == 'on') && (isset($_GET['created']) && $_GET['created'] == 'on')  && 
     (isset($_GET['ready_jogja']) && $_GET['ready_jogja'] == 'on')
     ) 
     {
           return [
         'Nama',
         'Email',
         'Kontak',
         'Skill',
         'Ready',
         'Created',
         'Ready_Jogja', 
     ];
     }
      //kecuali member_date, last_active, ISA, ready_jakarta, ready_jogja
     if (( isset($_GET['contact']) && $_GET['contact'] == 'on' ) && (isset($_GET['skill']) && $_GET['skill'] == 'on') && 
     (isset($_GET['date_ready']) && $_GET['date_ready'] == 'on') && (isset($_GET['created']) && $_GET['created'] == 'on')  
     ) 
     {
           return [
         'Nama',
         'Email',
         'Kontak',
         'Skill',
         'Ready',
         'Created',
     ];
     }
    //kecuali member_date, last_active, ISA, ready_jakarta, ready_jogja, created
     if (( isset($_GET['contact']) && $_GET['contact'] == 'on' ) && (isset($_GET['skill']) && $_GET['skill'] == 'on') && 
     (isset($_GET['date_ready']) && $_GET['date_ready'] == 'on')
     ) 
     {
           return [
         'Nama',
         'Email',
         'Kontak',
         'Skill',
         'Ready',
     ];
     }

    //show contact & skill
    if (( isset($_GET['contact']) && $_GET['contact'] == 'on' ) && (isset($_GET['skill']) && $_GET['skill'] == 'on'))
    {
        return [
        'Nama',
        'Email',
        'Kontak',
        'Skill'
                
    ];
    }
    //show contact & ready
    if (( isset($_GET['contact']) && $_GET['contact'] == 'on' ) && (isset($_GET['date_ready']) && $_GET['date_ready'] == 'on'))
    {
        return [
        'Nama',
        'Email',
        'Kontak',
        'Ready'
                    
    ];
    }
     //show contact & created
    if (( isset($_GET['contact']) && $_GET['contact'] == 'on' ) && (isset($_GET['created']) && $_GET['created'] == 'on'))
    {
        return [
        'Nama',
        'Email',
        'Kontak',
        'Created'
                    
    ];
    }

    //show contact & ready jogja
    if (( isset($_GET['contact']) && $_GET['contact'] == 'on' ) && (isset($_GET['ready_jogja']) && $_GET['ready_jogja'] == 'on'))
    {
        return [
        'Nama',
        'Email',
        'Kontak',
        'Ready_Jogja'                     
    ];
    }

    //show contact & ready jakarta
    if (( isset($_GET['contact']) && $_GET['contact'] == 'on' ) && (isset($_GET['ready_jakarta']) && $_GET['ready_jakarta'] == 'on'))
    {
        return [
        'Nama',
        'Email',
        'Kontak',
        'Ready_Jogja'                         
    ];
    }
    //show contact & ISA
    if (( isset($_GET['contact']) && $_GET['contact'] == 'on' ) && (isset($_GET['isa']) && $_GET['isa'] == 'on'))
    {
          return [
        'Nama',
        'Email',
        'Kontak',
        'ISA'                         
    ];
    }
    //show contact & active
    if (( isset($_GET['contact']) && $_GET['contact'] == 'on' ) && (isset($_GET['active']) && $_GET['active'] == 'on'))
    {
        return [
        'Nama',
        'Email',
        'Kontak',
        'Active'                         
    ];
    }

   //show contact & member date
   if (( isset($_GET['contact']) && $_GET['contact'] == 'on' ) && (isset($_GET['member_date']) && $_GET['member_date'] == 'on'))
   {
       return [
       'Nama',
       'Email',
       'Kontak',
       'Member_Date'                         
   ];
   }

    //show skill & ready
    if ((isset($_GET['skill']) && $_GET['skill'] == 'on') && (isset($_GET['date_ready']) && $_GET['date_ready'] == 'on'))
    {
        return [
            'Nama',
            'Skill',
            'Ready'
        ];
    }
    //show skill & created
    if ((isset($_GET['skill']) && $_GET['skill'] == 'on') && (isset($_GET['created']) && $_GET['created'] == 'on'))
    {
        return [
            'Nama',
            'Skill',
            'Created'
        ];
    }
    //show skill & ready jogja
    if ((isset($_GET['skill']) && $_GET['skill'] == 'on') && (isset($_GET['ready_jogja']) && $_GET['ready_jogja'] == 'on'))
    {
        return [
            'Nama',
            'Skill',
            'Ready_Jogja'
        ];
    }
    //show skill & ready jakarta
    if ((isset($_GET['skill']) && $_GET['skill'] == 'on') && (isset($_GET['ready_jakarta']) && $_GET['ready_jakarta'] == 'on'))
    {
        return [
            'Nama',
            'Skill',
            'Ready_Jakarta'
        ];
    }
    //show skill & ISA
    if ((isset($_GET['skill']) && $_GET['skill'] == 'on') && (isset($_GET['isa']) && $_GET['isa'] == 'on'))
    {
        return [
            'Nama',
            'Skill',
            'Ready_Jakarta'
        ];
    }
    //show skill & last active
    if ((isset($_GET['skill']) && $_GET['skill'] == 'on') && (isset($_GET['active']) && $_GET['active'] == 'on'))
    {
        return [
            'Nama',
            'Skill',
            'Active'
        ];
    }
    //show skill & member date
    if ((isset($_GET['skill']) && $_GET['skill'] == 'on') && (isset($_GET['member_date']) && $_GET['member_date'] == 'on'))
    {
        return [
            'Nama',
            'Skill',
            'Member_Date'
        ];
    }

    //show ready & created
    if  ((isset($_GET['date_ready']) && $_GET['date_ready'] == 'on') && (isset($_GET['created']) && $_GET['created'] == 'on') )
     {
        return [
            'Nama',
            'Ready',
            'Created'
        ];
    }
    //show ready & ready jogja
    if  ((isset($_GET['date_ready']) && $_GET['date_ready'] == 'on') && (isset($_GET['ready_jogja']) && $_GET['ready_jogja'] == 'on'))
    {
       return [
           'Nama',
           'Ready',
           'Ready_Jogja'
       ];
   }
    //show ready & ready jakarta
    if  ((isset($_GET['date_ready']) && $_GET['date_ready'] == 'on') && (isset($_GET['ready_jakarta']) && $_GET['ready_jakarta'] == 'on'))
    {
       return [
           'Nama',
           'Ready',
           'Ready_Jakarta'
       ];
   }
    //show ready & ISA
    if  ((isset($_GET['date_ready']) && $_GET['date_ready'] == 'on') && (isset($_GET['isa']) && $_GET['isa'] == 'on'))
    {
       return [
           'Nama',
           'Ready',
           'ISA'
       ];
   }
    //show ready & last active
    if  ((isset($_GET['date_ready']) && $_GET['date_ready'] == 'on') && (isset($_GET['active']) && $_GET['active'] == 'on'))
    {
       return [
           'Nama',
           'Ready',
           'Active'
       ];
   }
    //show ready & member date
    if  ((isset($_GET['date_ready']) && $_GET['date_ready'] == 'on') &&(isset($_GET['member_date']) && $_GET['member_date'] == 'on'))
    {
       return [
           'Nama',
           'Ready',
           'Member_Date'
       ];
   }

    //show created & ready jogja
    if ((isset($_GET['created']) && $_GET['created'] == 'on') && (isset($_GET['ready_jogja']) && $_GET['ready_jogja'] == 'on'))
    {
        return [
            'Nama',
            'Created',
            'Ready_Jogja'
            ];
    }
    //show created & ready jakarta
    if ((isset($_GET['created']) && $_GET['created'] == 'on') && (isset($_GET['ready_jakarta']) && $_GET['ready_jakarta'] == 'on'))
    {
        return [
            'Nama',
            'Created',
            'Ready_Jakarta'
            ];
    }
    //show created & ISA
    if ((isset($_GET['created']) && $_GET['created'] == 'on') && (isset($_GET['isa']) && $_GET['isa'] == 'on'))
    {
        return [
            'Nama',
            'Created',
            'ISA'
            ];
    }
    //show created & last active
    if ((isset($_GET['created']) && $_GET['created'] == 'on') && (isset($_GET['active']) && $_GET['active'] == 'on'))
    {
        return [
            'Nama',
            'Created',
            'Active'
            ];
    }
    //show created & member date
    if ((isset($_GET['created']) && $_GET['created'] == 'on') && (isset($_GET['member_date']) && $_GET['member_date'] == 'on'))
    {
        return [
            'Nama',
            'Created',
            'Member_Date'
            ];
    }
    
    //show ready jogja & ready jakarta
    if ((isset($_GET['ready_jogja']) && $_GET['ready_jogja'] == 'on') && (isset($_GET['ready_jakarta']) && $_GET['ready_jakarta'] == 'on'))
    {
        return [
            'Nama',
            'Ready_Jogja',
            'Ready_Jakarta'
            ];
    }
    //show ready jogja & ISA
    if ((isset($_GET['ready_jogja']) && $_GET['ready_jogja'] == 'on') && (isset($_GET['isa']) && $_GET['isa'] == 'on'))
    {
        return [
            'Nama',
            'Ready_Jogja',
            'ISA'
            ];
    }
    //show ready jogja & last active
    if ((isset($_GET['ready_jogja']) && $_GET['ready_jogja'] == 'on') && (isset($_GET['active']) && $_GET['active'] == 'on'))
    {
        return [
            'Nama',
            'Ready_Jogja',
            'Active'
            ];
    }
    //show ready jogja & member date
    if ((isset($_GET['ready_jogja']) && $_GET['ready_jogja'] == 'on') && (isset($_GET['member_date']) && $_GET['member_date'] == 'on'))
    {
        return [
            'Nama',
            'Ready_Jogja',
            'Member_Date'
            ];
    }

    //show ready jakarta & ISA
    if ((isset($_GET['ready_jakarta']) && $_GET['ready_jakarta'] == 'on') && (isset($_GET['isa']) && $_GET['isa'] == 'on'))
    {
        return [
            'Nama',
            'Ready_Jakarta',
            'ISA'
            ];
    }
    //show ready jakarta & last active
    if ((isset($_GET['ready_jakarta']) && $_GET['ready_jakarta'] == 'on') && (isset($_GET['active']) && $_GET['active'] == 'on'))
    {
        return [
            'Nama',
            'Ready_Jakarta',
            'Active'
            ];
    }
    //show ready jakarta & member date
    if ((isset($_GET['ready_jakarta']) && $_GET['ready_jakarta'] == 'on') && (isset($_GET['member_date']) && $_GET['member_date'] == 'on'))
    {
        return [
            'Nama',
            'Ready_Jakarta',
            'Active'
            ];
    }

    //show ISA  & last active
    if ((isset($_GET['isa']) && $_GET['isa'] == 'on') && (isset($_GET['active']) && $_GET['active'] == 'on') )
    {
        return [
            'Nama',
            'ISA',
            'Active'
            ];
    }
    //show ISA  & member date
    if ((isset($_GET['isa']) && $_GET['isa'] == 'on') && (isset($_GET['member_date']) && $_GET['member_date'] == 'on') )
    {
        return [
            'Nama',
            'ISA',
            'Member_Date'
            ];
    }
    //show last active  & member date
    if ((isset($_GET['active']) && $_GET['active'] == 'on') && (isset($_GET['member_date']) && $_GET['member_date'] == 'on'))
    {
        return [
            'Nama',
            'Active',
            'Member_Date'
            ];
    }

    //show contact 
     if ( isset($_GET['contact']) && $_GET['contact'] == 'on' ) 
     {
        return [
            'Nama',
            'Email',
            'Kontak',
         
        ];
    }
    //show skill
    if (isset($_GET['skill']) && $_GET['skill'] == 'on')
    {
        return [
            'Nama',
            'Skill',
        ];
    }
    //show ready
    if  (isset($_GET['date_ready']) && $_GET['date_ready'] == 'on')
    {
        return [
            'Nama',
            'Ready',
        ];
    }
    //show created
    if (isset($_GET['created']) && $_GET['created'] == 'on')
    {
        return [
            'Nama',
            'Created'
            ];
    }
    //show ready jogja
    if (isset($_GET['ready_jogja']) && $_GET['ready_jogja'] == 'on')
    {
        return [
            'Nama',
            'Ready_Jogja'
            ];
    }
    //show ready jakarta
    if (isset($_GET['ready_jakarta']) && $_GET['ready_jakarta'] == 'on')
    {
        return [
            'Nama',
            'Ready_Jakarta'
            ];
    }
    //show ready isa
    if (isset($_GET['isa']) && $_GET['isa'] == 'on')
    {
        return [
            'Nama',
            'ISA'
            ];
    }
    //show last active
    if (isset($_GET['active']) && $_GET['active'] == 'on')
    {
        return [
            'Nama',
            'Active '
            ];
    }
    //show member date
    if  (isset($_GET['member_date']) && $_GET['member_date'] == 'on')
    {
        return [
            'Nama',
            'Member_Date'
            ];
    }
 
    
}
}