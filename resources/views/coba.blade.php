<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            /*border:1px solid #dee2e6; */
            clear:both; border-collapse:separate; border-spacing:0;}
    </style>
</head>
<body style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
<div class="container">
                <center><img src="logo-suitcareer.png" alt="" width="20%"></center>  <br>
                <p align="center" style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                    <b>REPORT TALENT</b>
                </p>
                <hr>
                <div class="table-responsive">
                <table width="100%">
                    <tr>
                        <td ><strong style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><b>POSITION AS</b></strong></td>
                        <td id="positionas">{{$posisi}}</td>
                    </tr>
                    <tr>
                        <td ><strong style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><b>TALENT NAME</b></strong></td>
                        <td  id="namatalent">{{ucwords($all->talent_name)}}</td>
                    </tr>
                    <tr>
                        <td >
                            <strong style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                            <b>TALENT BOD</b>
                            </strong>
                        </td>
                        <td id="birthtalent">{{$all->talent_place_of_birth.", ".$all->talent_birth_date}}</td>
                    </tr>
                    <tr>
                        <td >
                            <strong style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                            <b>MARTIAL STATUS</b>
                            </strong>
                        </td>
                        <td id="statustalent">{{ucfirst($all->talent_martial_status)}}</td>
                    </tr>
                    <tr>
                        <td ><strong style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><b>CURRENT ADDRESS</b></strong></td>
                        <td id="addresscurrent">{{$all->talent_address}}</td>
                    </tr>
                    <tr >
                        <td ><strong style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><b>PREFERED LOCATION</b></strong></td>
                        <td id="preferlocation">{{$preferloc->location_name}}</td>
                    </tr>
                    <tr>
                        <td ><strong style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><b>TOTAL EXPERIENCE</b></strong></td>
                        <td id="pengalamankerja">{{$all->talent_totalexperience}}</td>
                    </tr>
                    <tr>
                        <td ><strong style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><b>NOTICE PERIOD</b></strong></td>
                        <td id="noticeperiode">
                            @if ($all->talent_available=="no")
                                {{ucfirst($all->talent_available)}}
                            @elseif ($all->talent_available=="yes")
                                {{ucfirst($all->talent_available)." , ".\Carbon\Carbon::parse($all->talent_date_ready)->format('d-m-Y')}}
                            @elseif ($all->talent_available=="1_month")
                                1 Month Notice
                            @else
                                ASAP
                            @endif
                        </td>
                    </tr>
                    <hr>
                </table>
                </div>

                <p style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                        <b>TALENT SKILL OVERVIEW</b>
                </p>
                <!-- <div style="text-align:center; margin-left: 0px;" > -->
                <table  width="100%"  border="1" id="teknologidanlevel">
                                                                <tr style="background-color: #ABB4BD">
                                                                    <td align="center"><strong>TECHNOLOGY STACK</strong> </td>
                                                                    <td align="center" width="50%"><strong>LEVEL</strong></td>
                                                                </tr>
                                                                @foreach ($skill as $s)
                                                                    <tr align="center">
                                                                        <td>{{$s->skill_name}}</td>
                                                                        <td>{{$s->st_level}}</td>
                                                                    </tr>
                                                                @endforeach
                                                        </table>
                </div>
                <hr>
                <p style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                        <b>EXPERIENCE HIGHLIGHT</b>
                </p>
                <div style="margin-left:50px;" id="experiencehighlight">
                    @php
                        $getData = DB::table('work_experience')->where('workex_talent_id',$all->talent_id)->get();
                    @endphp
                    @foreach ($getData as $exper)
                        <p style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                            <b>{{$exper->workex_office}}</b>
                        </p>
                        <p style="margin-top: -15px;">{{$exper->workex_position}}</p>
                        <p style="margin-top: -15px; font-size: 13px;">
                            @php
                                $start = explode(' ',$exper->workex_startdate);
                                $end = explode(' ',$exper->workex_enddate);
                                if ($start[0]=='0' && $end[0]=='0') {
                                    echo $start[1]." ".$start[2]." - ".$end[1]." ".$end[2]."<br>";
                                }else{
                                    echo $exper->workex_startdate." - ".$exper->workex_enddate."<br>";
                                }
                            @endphp
                        </p>
                        <p style="margin-left: 30px; font-size: 16px;"><strong>Job Description : </strong></p>
                        <div style="margin-left: 40px; font-size: 14px;">
                            {!! $exper->workex_desc !!}
                        </div>
                        <p style="margin-left: 30px; font-size: 16px;"><strong>Project Handled : </strong></p>
                        <div style="margin-left: 40px; font-size: 14px;">
                               {!!$exper->workex_handle_project!!}
                        </div>
                        <br>
                    @endforeach
                </div>
                <hr>
                <p style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                        <b>PROJECT HIGHLIGHT</b>
                </p>
                <div style="margin-left:50px;">
                    @php
                        $getdatapor = DB::table('portfolio')->where('portfolio_talent_id',$all->talent_id)->get();
                    @endphp
                    @foreach ($getdatapor as $por)
                        <p style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                            <b>{{$por->portfolio_name}}</b>
                        </p>
                        <p style="margin-top: -15px;">
                            {{$por->portfolio_startdate.' - '.$por->portfolio_enddate}}
                        </p>
                        <p style="margin-left: 30px; font-size: 16px;"><strong>Project Description : </strong></p>
                        <p style="margin-left: 40px; font-size: 14px;">{{$por->portfolio_desc}}</p>
                        <p style="margin-left: 30px; font-size: 16px;"><strong>Technology Used : </strong></p>
                        <p style="margin-left: 40px; font-size: 14px;">{{$por->portfolio_tech}}</p>
                    @endforeach
                </div>
                <hr>
                <p style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                        <b>EDUCATIONAL BACKGROUND</b>
                </p>
                <div class="container" align="center">
                    <table width="100%" border="1">
                    <!--<table width="100%">-->
                        <thead align="center" style="background-color: greenyellow">
                            <tr>
                                <td>Educational Institutional</td>
                                <td>Education Level</td>
                                <td>Year</td>
                                <td>GPA</td>
                            </tr>
                        </thead>
                        <tbody align="center">
                            <?php if( count($edu)>0 ) { ?>
                                @foreach ($edu as $education)
                                <tr>
                                    <td>{{ucfirst($education->edu_name)}}</td>
                                    <td>
                                        @if ($education->edu_level=='other')
                                            {{ucfirst($education->edu_level_other)}}
                                        @else
                                            {{ucfirst($education->edu_level)}}
                                        @endif
                                    </td>
                                    <td>
                                        {{$education->edu_datestart}} <br>
                                        {{$education->edu_dateend}} <br>                                                                                
                                    </td>
                                    <td>{{$education->edu_value}}</td>
                                </tr>
                                @endforeach
                            <?php } else { echo "<tr><td colspan='4'>No data entry</td></tr>"; } ?>
                        </tbody>
                    </table>
                </div>
                <hr>
                <p style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                    <b>LICENSES & CERTIFICATION</b>
                </p>
                <?php if( count($certif)>0 ) { ?>
                    <div style="margin-left:50px;">
                        @foreach ($certif as $certification)
                            <p style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                                <b>{{$certification->certif_name}}</b>
                                </p>
                                    <p style="margin-top: -15px;">
                                        {{$certification->certif_company." - ".$certification->certif_years}} <br>
                                                                        <!--{{-- {{$c->certif_expired}}<br> --}}-->
                                        {{$certification->certif_expired}} <br>
                                        Credential ID : {{$certification->certif_number}}
                                                                        <!--{{-- 0111101111111 --}}-->
                                    </p>
                        @endforeach
                    </div>
                <?php } else { echo "No data entry"; } ?>
                <br>
                <hr>
                <p style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                        <b>SUITCAREER NOTES</b>
                </p>
                <?php if( isset($all->talent_notes_report_talent) && $all->talent_notes_report_talent!='' ) { ?>
                    <table width=100% border="1" style="border-color: greenyellow">
                    <!--<table width=100% >-->
                        <tr>
                            <td>
                               {!! $all->talent_notes_report_talent !!}
                            </td>
                        </tr>
                    </table>
                <?php } else { echo "No data entry"; } ?>
                <br> <br>
                <table width=100%>
                    <tr style="background-color: greenyellow;">
                        <td style="padding-left: 10px" colspan="2"> <strong>Further Information</strong> </td>
                    </tr>
                    <tr style="font-size:12px; vertical-align:middle; padding-top:4px;">
                        <td style="padding-left: 0px;">
                            PT Talenta Sinergi Group <br>
                            Website: www.upscale.id <br>
                            Email: hrd@upscale.id <br>
                            Phone : +62 221 5088 0150 <br>
                            A : +62 857 1281 9290
                        </td>
                        <td style="padding-left: 88px; padding-top:4px;">
                            <strong>Our Main Office, Yogyakarta </strong><br>
                            Jln Ngadinegaran Blok MJ III No. 144 RT/RW, Mantrijeron, Kota Yogyakarta, DI.Yogyakarta <br> <br>
                            <!--<strong>Our Business Office, Jakarta</strong><br>-->
                            <!--Madison Park, Magnolia Tower 10BJ, Tanjung Duren Selatan, Jakarta Barat <br>-->
                        </td>
                    </tr>
                </table>
                </div>
</body>
</html>
