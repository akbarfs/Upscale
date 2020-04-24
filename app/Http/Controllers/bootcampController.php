<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bootcamp;
use App\Materi;
use App\SubMateri;
use App\Faq;
use App\Mentor;
use App\Fasilitas;
use App\Alumni;
use App\Soal;
use App\ClassEvent;
use App\BootFas;
use App\Calendar;
use App\Icon;
use App\LocationMaster;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use Collective\Html\HtmlFacade;
//use Image;
use DB;
use Redirect;


class bootcampController extends Controller
{
    public function index()

    {
    	$bootcamps = Bootcamp::all();

    	return view('bootcamp/index', compact('bootcamps'));
    }

    public function store(Request $request)
    {
         
        
        //$imagePath = request('event_image')->store('uploads', 'public');

        //$image = Image::make(public_path("storage/{$imagePath}"))->fit(500,500);
        //$image->save();
         
        //$event = Bootcamp::create($request->all());

        $event = new Bootcamp;
        $event->event_title = $request->event_title;
        $event->event_fee = $request->event_fee;
        $event->event_desclass = $request->event_desclass;

        $image= $request->file('event_image');
        $imageName = 'Image_Event_'.$event->event_title.'.'.$image->getClientOriginalExtension();
        $path = public_path().'/event';
        $upload = $image->move($path,$imageName);

        
        $event->event_image = $imageName;
        $event->event_date = $request->event_date;
        $event->event_enddate = $request->event_enddate;
        $event->event_location = $request->location;
        $event->event_soal = $request->soal;
        $event->event_class = $request->event_class;
        $event->save();

        $event->icon()->attach($request->icon);
        $event->fasilitas()->attach($request->fasilitas);
        $event->mentor()->attach($request->mentor);

        // $event->calendar()->attach([
        //    $request->calendar_name,
        //    $request->calendar_date,
        //     $request->url,
        //    $request->text 
        // ]);

        // // $size = count(collect($request)->get('id'));
        // $size = $event->event_id;

        // for ($i = 0; $i < $size; $i++)
        // {
        //     $simpan = DB::connection('erpo_bootcamp')->table('t_calendar')->insert([
        //         //'main_event_id' => $event->event_id,
        //         'calendar_name' => $request->get('calendar_name'),
        //         'calendar_date' => $request->get('calendar_date'),
        //         'url' => $request->get('url'),
        //         'calendar_text' => $request->get('text')
        //       ]);
        // }
    if($request->input('id') == null)
            {
                return redirect('admin/bootcamp');
            }
    else {
        foreach($request->input('id') as $key => $value) {
            $kalender  = new Calendar;
            $kalender->main_event_id = $event->event_id;
            $kalender->calendar_name = $request->calendar_name[$key];
            $kalender->calendar_date = $request->calendar_date[$key];
            $kalender->url = $request->url[$key];
            $kalender->calendar_text = $request->text[$key];
            $kalender->save();
        }
        return redirect('admin/bootcamp');
    }
        // foreach($request->input('id') as $key => $value) {
        //     $kalender  = new Calendar;
        //     $kalender->main_event_id = $event->event_id;
        //     $kalender->calendar_name = $request->calendar_name[$key];
        //     $kalender->calendar_date = $request->calendar_date[$key];
        //     $kalender->url = $request->url[$key];
        //     $kalender->calendar_text = $request->text[$key];
        //     $kalender->save();
        // }
    

        // return redirect('admin/bootcamp');

        // dd($request->all());
    }

    public function getIndex()
    {
        $items 	= ClassEvent::orderBy('order')->get();
        $class = ClassEvent::where('parent_id','=',0)->get();

		$menu 	= new ClassEvent;
		$menu   = $menu->getHTML($items);

        return view('admin.bootcamp.class', array('items'=>$items,'menu'=>$menu), compact('class'));
    }

    public function getEdit($id)
	{	
		$item = ClassEvent::find($id);
		return view('admin.bootcamp.editclass', array('item'=>$item));
	}

    public function postEdit($id)
	{	
		$item = ClassEvent::find($id);	
		$item->class_name 		= e(Input::get('class_name',''));	

		$item->save();
		return Redirect::to("admin/bootcamp/class/");
	}

    public function postIndex()
	{	
	    $source       = e(Input::get('source'));
	    $destination  = e(Input::get('destination',0));

	    $item             = ClassEvent::find($source);
	    $item->parent_id  = $destination;  
	    $item->save();

	    $ordering       = json_decode(Input::get('order'));
	    $rootOrdering   = json_decode(Input::get('rootOrder'));

	    if($ordering){
	      foreach($ordering as $order=>$item_id){
	        if($itemToOrder = ClassEvent::find($item_id)){
	            $itemToOrder->order = $order;
	            $itemToOrder->save();
	        }
	      }
	    } else {
	      foreach($rootOrdering as $order=>$item_id){
	        if($itemToOrder = ClassEvent::find($item_id)){
	            $itemToOrder->order = $order;
	            $itemToOrder->save();
	        }
	      }
	    }

	    return 'ok ';
	}

	public function postNew()
	{
		// Create a new menu item and save it
		$item = new ClassEvent;
	
        $item->class_name 		= e(Input::get('class_name',''));
		$item->order 	= ClassEvent::max('order')+1;

		$item->save();

		return Redirect::to('admin/bootcamp/class');
    }

    public function postNewMateri(Request $request)
	{
		// Create a new menu item and save it
		$item = new ClassEvent;
	
        $item->class_name 		= e(Input::get('class_name',''));
        $item->parent_id = $request->class_parent_id;	
		$item->order 	= ClassEvent::max('order')+1;

		$item->save();

		return Redirect::to('admin/bootcamp/class');
    }
    
    public function postDelete()
	{
		$id = Input::get('delete_id');
		// Find all items with the parent_id of this one and reset the parent_id to zero
		$items = ClassEvent::where('parent_id', $id)->get()->each(function($item)
		{
			$item->parent_id = 0;  
			$item->save();  
		});
		// Find and delete the item that the user requested to be deleted
		$item = ClassEvent::find($id);
		$item->delete();
		return Redirect::to('admin/bootcamp/class');
	}

    public function materiIndex()
    {
        $submateri = DB::connection('erpo_bootcamp')->table('t_submateri')->join('t_materi','materi_id','=','t_submateri.main_materi_id')->get();
        $soal = DB::connection('erpo_bootcamp')->table('t_soal')->join('t_materi','materi_id','=','t_soal.id_materi')->get();
        //$submateri = Materi::with('submateri')->get();
        $mainmateri = Materi::all();
        $nomain = 1;
        $nosub = 1;
        $no = 1;
        
        return  view('admin.bootcamp.materi.index', compact('submateri','soal','mainmateri','nomain','nosub','no'));
    }

    public function submateriStore(Request $request)
    {
        $submateri = DB::connection('erpo_bootcamp')->table('t_submateri')->insert([
            'submateri' => $request->submateri,
            'main_materi_id' => $request->t_materi
        ]);
        
        return redirect()->back()->with('Success','Data Berhasil di tambahkan');
    }

    public function submateriEdit(Request $request)
    {
        $submateri = SubMateri::where('submateri_id','=', $request->id)->first();
        return response()->json($submateri);
    }

    public function submateriUpdate(Request $request,$id)
    {

        $submateri = DB::connection('erpo_bootcamp')->table('t_submateri')->where('submateri_id',$request->submateri_id)->update([
            'submateri' => $request->submateri,
            'main_materi_id' => $request->t_materi
        ]);

        return redirect()->back()->with('Success','Data Berhasil di Update');
    }

    public function submateriDelete(Request $request)
    {
        $submateri = SubMateri::where('submateri_id','=', $request->id)->delete();
        return redirect()->back()->with('Success', 'Data Berhasil di Hapus');
    }

    public function materiStore(Request $request)
    {
        $this->validate($request, [
            'materi_main' => 'required'
        ]);

        $mainmateri = new Materi;
        $mainmateri->materi_main = $request->materi_main;
        $mainmateri->save();

        return redirect()->back()->with('Success', 'Data berhasil ditambahkan');
    }

    public function materiEdit(Request $request)
    {
        $mainmateri = Materi::where('materi_id','=', $request->id)->first();
        return response()->json($mainmateri);
    }

    public function materiUpdate(Request $request)
    {
        
        $mainmateri = DB::connection('erpo_bootcamp')->table('t_materi')->where('materi_id',$request->materi_id)->update([
            'materi_main'=>$request->materi_main
        ]);
        

        return redirect()->back()->with('Success', 'Data berhasil di Update');
    }

    public function materiDelete(Request $request)
    {
        $mainmateri = Materi::where('materi_id','=', $request->id)->delete();
        return redirect()->back()->with('Success', 'Data berhasil dihapus');
    }

    public function faqIndex()
    {
        $faq = Faq::all();
        $nofaq = 1;
        
        return view('admin.bootcamp.faq', compact('faq','nofaq'));
    }

    public function faqStore(Request $request)
    {
        $this->validate($request, [
            'quest' => 'required',
            'answ' => 'required'
        ]);

        $faq = new Faq;
        $faq->quest = $request->quest;
        $faq->answ = $request->answ;
        $faq->save();

        return redirect()->back()->with('Success', 'Data berhasil disimpan');
    }

    public function faqEdit(Request $request)
    {
        $faq = Faq::where('faq_id','=', $request->id)->first();
        return response()->json($faq);
    }

    public function faqUpdate(Request $request)
    {
        $mainmateri = DB::connection('erpo_bootcamp')->table('t_faq')->where('faq_id',$request->faq_id)->update([
            'quest'=>$request->quest,
            'answ'=>$request->answ
        ]);
        
        return redirect()->back()->with('Success', 'Data berhasil diupdate');
    }

    public function faqDelete(Request $request, $id)
    {
        $faq = Faq::where('faq_id','=', $request->id)->delete();
        
        return redirect()->back()->with('Success', 'Data berhasil dihapus');
    }

    public function fasilitasIndex()
    {
        $fas = Fasilitas::all();
        $ico = Icon::all();
        $mentor = Mentor::all();
        $soal = DB::connection('erpo_bootcamp')->table('t_soal')->join('t_class','class_id','=','t_soal.id_materi')->get();
        $class = ClassEvent::where('parent_id', '=', 0)->get();
        $cla = ClassEvent::where('parent_id', '=', 0)->get();
        $loc = LocationMaster::all();
        $nol = 1;
        $no = 1;
        $nomen = 1;
        $noico = 1;
        $nofas = 1;
        
        return view('admin.bootcamp.masterdata', compact('fas','ico','mentor','soal','class','cla','loc','nol','no','nomen','noico','nofas'));
    }

    public function fasilitasStore(Request $request)
    {
        $this->validate($request, [
            'fasilitas_name' => 'required',
            'fasilitas_icon' => 'required'
        ]);

        $fas = new Fasilitas;
        $fas->fasilitas_name = $request->fasilitas_name;

        $icon = $request->file('fasilitas_icon');
        $iconName = 'Icon_Fasilitas_'.$fas->fasilitas_name.'.'.$icon->getClientOriginalExtension();
        $path = public_path().'/fasilitas';
        $upload = $icon->move($path,$iconName);

        $fas->fasilitas_icon = $iconName;
        $fas->save();

        return redirect()->back()->with('Success', 'Data berhasil ditambahkan');
    }

    public function fasilitasEdit(Request $request)
    {
        $fas = Fasilitas::where('id', '=', $request->id)->first();
        return response()->json($fas);
    }

    public function fasilitasUpdate(Request $request, $id)
    {
        $fas = Fasilitas::find($id);

        if(!empty($request->fasilitas_icon))
        {
            $icon = $request->file('fasilitas_icon');
            $iconName = 'Icon_Fasilitas_'.$fas->fasilitas_name.'.'.$icon->getClientOriginalExtension();
            $path = public_path().'/fasilitas';
            $upload = $icon->move($path,$iconName);
        }
        else
        {
            $iconName = $fas->fasilitas_icon;
        }

        $fas->fasilitas_name = $request->fasilitas_name;
        $fas->fasilitas_icon = $iconName;
        $fas->update();

        return redirect()->back()->with('Success', 'Data berhasil diupdate');
    }

    public function fasilitasDelete(Request $request, $id)
    {
        // echo("waks");
        //dd($request->all());
        $fas = Fasilitas::where('id','=', $request->id)->delete();
        
        return redirect()->back()->with('Success', 'Data berhasil dihapus');
    }

    public function iconStore(Request $request)
    {
        $this->validate($request, [
            'icon_name' => 'required',
            'icon_image' => 'required'
        ]);

        $ico = new Icon;
        $ico->icon_name = $request->icon_name;

        $icon = $request->file('icon_image');
        $iconName = 'Icon_Software_'.$ico->icon_name.'.'.$icon->getClientOriginalExtension();
        $path = public_path().'/iconsoft';
        $upload = $icon->move($path,$iconName);

        $ico->icon_image = $iconName;
        $ico->save();

        return redirect()->back()->with('Success', 'Data berhasil ditambahkan');
    }

    public function iconEdit(Request $request)
    {
        $ico = Icon::where('icon_id', '=', $request->id)->first();
        return response()->json($ico);
    }

    public function iconUpdate(Request $request, $id)
    {
        $ico = Icon::find($id);

        if(!empty($request->icon_image))
        {
            $icon = $request->file('icon_image');
            $iconName = 'Icon_Software_'.$ico->icon_name.'.'.$icon->getClientOriginalExtension();
            $path = public_path().'/iconsoft';
            $upload = $icon->move($path,$iconName);
        }
        else
        {
            $iconName = $ico->icon_image;
        }

        $ico->icon_name = $request->icon_name;
        $ico->icon_image = $iconName;
        $ico->update();

        return redirect()->back()->with('Success', 'Data berhasil diupdate');
    }

    public function iconDelete(Request $request, $id)
    {
        // echo("waks");
        //dd($request->all());
        $ico = Icon::where('icon_id','=', $request->id)->delete();
        
        return redirect()->back()->with('Success', 'Data berhasil dihapus');
    }

    public function locationStore(Request $request)
    {
        $this->validate($request, [
            'loc_city' => 'required',
            'loc_address' => 'required',
            'loc_maps' => 'required'
        ]);

        $loc = new LocationMaster;
        $loc->loc_city = $request->loc_city;
        $loc->loc_address = $request->loc_address;
        $loc->loc_maps = $request->loc_maps;
        $loc->save();

        return redirect()->back()->with('Success', 'Data berhasil ditambahkan');
    }

    public function locationEdit(Request $request)
    {
        $loc = LocationMaster::where('loc_id', '=', $request->id)->first();
        return response()->json($loc);
    }

    public function locationUpdate(Request $request, $id)
    {
        $loc = LocationMaster::find($id);

        $loc->loc_city = $request->loc_city;
        $loc->loc_address = $request->loc_address;
        $loc->loc_maps = $request->loc_maps;
        $loc->update();

        return redirect()->back()->with('Success', 'Data berhasil diupdate');
    }

    public function locationDelete(Request $request, $id)
    {
        // echo("waks");
        //dd($request->all());
        $loc = LocationMaster::where('loc_id','=', $request->id)->delete();
        
        return redirect()->back()->with('Success', 'Data berhasil dihapus');
    }

    public function alumni()
    {
        $event = Bootcamp::all();
        $count = Alumni::all()->count();
        $pcount = Alumni::where('alumni_status','publish')->get()->count();

        return view('admin.bootcamp.alumni', compact('event','count','pcount'));
    }

    public function AlumniIndex()
    {
        $all = Alumni::orderBy('alumni_id', 'asc')->get();

        return Datatables::of($all)
        ->addColumn('checkbox', '<center><input type="checkbox" name="alumni_checkbox[]" class="checkbox" value="{{$alumni_id}}"/></center')
        ->addIndexColumn()
        ->addColumn('created_date', function($all){
          return $all->created_date->format('d M Y');
        })
        ->addColumn('alumni_status', function($all){
          if($all->alumni_status == 'publish'){
            return '<span class="badge badge-success">Publish</span>';
          } else{
            return '<span class="badge badge-danger">Unpublish</span>';
          }
        })
        ->addColumn('action', function($all){
          return '<center>
          <a href="#edit-alumni" data-editid="'.$all->alumni_id.'" type="button" data-toggle="modal" data-target="#modal-edit-alumni" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
          <a href="#" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="See Alumni Details" target="_blank"><i class="fa fa-share-square-o"></i></a>
          <a href="#hapus-alumni" data-hapusid="'.$all->alumni_id.'" class="btn btn-danger btn-sm deleteBootcamp"><i class="fa fa-trash"></i></a>
          </center>';
        })
        ->rawColumns(['checkbox','action','alumni_status'])
        ->make(true);
    }
    
    public function move(Request $request)
    {
        $id_array = $request->input('id');
        // $step = $request->input('pindah');

        $data = Alumni::whereIn('alumni_id', $id_array);

        if($data->update(['alumni_status' => 'publish']))
        {
          return 'success';
        }
    }

    public function addAlumni(Request $request)
    {
        $this->validate($request, [
            'alumni_email' => 'required',
            'alumni_name' => 'required',
            'alumni_address' => 'required',
            'alumni_wa' => 'required',
            'alumni_job' => 'required',
            'alumni_work' => 'required',
            'bootcamp' => 'required',
            'alumni_testimoni' => 'required',
            'alumni_photo' => 'required'
        ]);

        $alumni = new Alumni;
        $alumni->alumni_email = $request->alumni_email;
        $alumni->alumni_name = $request->alumni_name;
        $alumni->alumni_address = $request->alumni_address;
        $alumni->alumni_wa = $request->alumni_wa;
        $alumni->alumni_job = $request->alumni_job;
        $alumni->alumni_work = $request->alumni_work;
        $alumni->alumni_bootcamp = $request->bootcamp;
        $alumni->alumni_testimoni = $request->alumni_testimoni;

        $photo = $request->file('alumni_photo');
        $photoName = 'Alumni_'.$alumni->alumni_name.'.'.$photo->getClientOriginalExtension();
        $path = public_path().'/alumni';
        $upload = $photo->move($path,$photoName);

        $alumni->alumni_photo = $photoName; 
        $alumni->save();

        return redirect('admin/bootcamp/alumni');
        // dd($request->all());
    }

    public function editAlumni(Request $request)
    {
        $alumni = Alumni::where('alumni_id', '=', $request->id)->first();
        return response()->json($alumni);
    }

    public function upAlumni(Request $request, $id)
    {
        $alumni = Alumni::find($id);

        if(!empty($request->alumni_photo))
        {
            $photo = $request->file('alumni_photo');
            $photoName = 'Alumni_'.$alumni->alumni_name.'.'.$photo->getClientOriginalExtension();
            $path = public_path().'/alumni';
            $upload = $photo->move($path,$photoName);
        }
        else
        {
            $photoName = $alumni->alumni_photo;
        }

        $alumni->alumni_email = $request->alumni_email;
        $alumni->alumni_name = $request->alumni_name;
        $alumni->alumni_address = $request->alumni_address;
        $alumni->alumni_wa = $request->alumni_wa;
        $alumni->alumni_job = $request->alumni_job;
        $alumni->alumni_work = $request->alumni_work;
        $alumni->alumni_bootcamp = $request->bootcamp;
        $alumni->alumni_testimoni = $request->alumni_testimoni;
        $alumni->alumni_photo = $photoName;
        $alumni->update();

        return redirect('admin/bootcamp/alumni');
    }

    public function delAlumni(Request $request)
    {
        $alumni = Alumni::where('alumni_id','=',$request->id);

        if($alumni->delete())
      {
        return 'success';
      }
      else
      {
      return 'error';
      }
    }

    public function addSoal(Request $request)
    {
        $soal = new Soal;        
        $soal->file_name = $request->file_name;
        $soal->id_materi = $request->t_materi_soal;

        $doc= $request->file('file_soal');
        $docName = 'Soal'.$soal->file_name.'.'.$doc->getClientOriginalExtension();
        $path = public_path().'/soal';
        $upload = $doc->move($path,$docName);

        
        $soal->file_soal = $docName;
        $soal->save();

        return redirect('admin/bootcamp/masterdata');
        //dd($request->all());
    }

    public function editSoal(Request $request)
    {
        $soal = Soal::where('soal_id','=', $request->id)->first();
        return response()->json($soal);
    }

    public function upSoal(Request $request, $id)
    {
        $soal = Soal::find($id);

        if(!empty($request->file_soal))
        {
            $doc= $request->file('file_soal');
            $docName = 'Soal'.$soal->file_name.'.'.$doc->getClientOriginalExtension();
            $path = public_path().'/soal';
            $upload = $doc->move($path,$docName);
        }
        else
        {
            $docName = $soal->file_soal;
        }

        $soal->file_name = $request->file_name;
        $soal->id_materi = $request->t_materi_soal;
        $soal->file_soal = $docName;
        $soal->update();

        return redirect()->back()->with('Success', 'Data berhasil diupdate');
        // echo("waks");
    }

    public function delSoal(Request $request)
    {
        $soal = Soal::where('soal_id','=', $request->id)->delete();
        
        return redirect()->back()->with('Success', 'Data berhasil dihapus');
    }

}
