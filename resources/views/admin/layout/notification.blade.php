@php
$data = App\Models\CompanyReqLog::where('is_read_notif', 1)
@endphp

<div class="page-header float-right">
    <div class="page-title">
        <ol class="breadcrumb text-right" style="position:relative;">
            <div style="cursor:pointer;font-size:24px;margin-right:16px;position:relative;color:#ffff00;" data-target="#notification" data-toggle="modal">
                <i class="fa fa-bell"></i>
                <div style="width:20px;height:20px;background-color:#ff0000;top:0;right:-8px;position:absolute;border-radius:50%;color:#fff;text-align:center;font-size:12px;border:3px solid #fff;"><strong>{{ count($data->get()) }}</strong></div>
            </div>
            <li><a href="{{route('dashboard')}}">Dashboard</a></li>

            <!-- notif -->
            <div class="modal fade" id="notification" style="background-color:transparent;">
                <div class="modal-dialog" style="position:absolute;top:15px;right:200px;">
                    <div class="modal-content" style="width:260px;">
                    <div id="loading" align="center">
                        <div class="spinner-border text-primary" id="spinner" role="status" style="text-align: center;">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>

                        <div id="posts" style="background-color:#f0f1f5;padding:10px;">
                        @if (count($data->get())>0)
                        @foreach($data->latest()->take(3)->get() as $notif)
                        <form method="post" enctype="multipart/form-data" class="hire-talent">
                        @csrf
                            <div class="layout-notif">
                                <a href="{{ route('jobsapplyclient.notif',['id' => $notif->talent_id]) }}" data-id="{{ $notif->talent_id }}" style="display:flex;flex-direction:row;gap:9px;" class="id_notif" data-toggle="tooltip" title="{{ $notif->company_request->company->company_name }}">
                                    <div style="width:31px;height:31px;background-color:#ffffff;">
                                    <img src="{{ $notif->company_request->company->company_pic }}" alt="" class="company_pic" srcset="">
                                    </div>
                                    <p class="notif" style="width:176px;font-size:11px;color:#000000;line-height:13px;">
                                        Hi Upscale, tolong hubungi saya, saya tertarik dengan Talent <strong>{{$notif->talent->talent_name}}</strong>
                                    </p>
                                    <p style="font-size:8px;color:#000000;line-height:10px;" class="date">{{$notif->created_at}}</p>
                                </a>
                                <div style="height:1px;width:100%;background-color:#9b9b9b;margin-bottom:4px;"></div>
                            </div>
                            </form>
                        @endforeach
                        @else
                        <p class="notif" style="width:176px;font-size:11px;color:#000000;line-height:13px;text-align:center;">Belum ada notifikasi terbaru</p>
                        @endif
                        <a href="{{route('jobsapplyclient.all-notif')}}">
                            <button class="see-more" style="cursor:pointer;background-color:#ffffff;color:black;text-align:center;width: 100%;font-size:11px;height:fit-content;border:none;margin-top:14px;">Lihat semua notifikasi</button>
                        </a>
                        </div>
                    </div>
                </div>
            </div>

        </ol>                
    </div>
</div>