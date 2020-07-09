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

                <p  style=" background-color: #053D6E; font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif" class="text-white">
                        <b>TALENT SKILL OVERVIEW</b>
                </p>
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
                <p style=" background-color: #053D6E; font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif" class="text-white">
                        <b>EXPERIENCE HIGHLIGHT</b>
                </p>
                <div  id="experiencehighlight">
                                                            @php
                                                                $getData = DB::table('work_experience')->where('workex_talent_id',$all->talent_id)->get();
                                                            @endphp
                                                            @foreach ($getData as $exper)
                                                        <table width="100%" border="1">
                                                        
                                                                <tr>
                                                                <th scope="col">Office</th>
                                                                <td>:</td>
                                                                <td>
                                                                <!-- <p style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"> -->
                                                                    {{$exper->workex_office}}
                                                                <!-- </p> -->
                                                                </td>
                                                                </tr>

                                                                <tr>
                                                                <th scope="col">Posisition</th>
                                                                <td>:</td>
                                                                <td>
                                                                    <!-- <p style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"> -->
                                                                    {{$exper->workex_position}}
                                                                    <!-- </p> -->
                                                                </td>
                                                                </tr>

                                                                <tr>
                                                                <th scope="col">Description</th>
                                                                <td>:</td>
                                                                <td>
                                                                    <!-- <p style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"> -->
                                                                     {!! $exper->workex_desc !!}
                                                                    <!-- </p> -->
                                                                </td>
                                                                </tr>

                                                                <tr>
                                                                <th scope="col">Start Date & End Date</th>
                                                                <th>:</th>
                                                                <td>        
                                                                    <!-- <p style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"> -->
                                                                   
                                                                    @php
                                                                        $start = explode(' ',$exper->workex_startdate);
                                                                        $end = explode(' ',$exper->workex_enddate);
                                                                        if ($start[0]=='0' && $end[0]=='0') {
                                                                            echo $start[1]." ".$start[2]." - ".$end[1]." ".$end[2]."<br>";
                                                                        }else{
                                                                            echo $exper->workex_startdate." - ".$exper->workex_enddate."<br>";
                                                                        }
                                                                    @endphp
                                                                    <!-- </p> -->
                                                                </td>
                                                                </tr>

                                                                <tr>
                                                                <th scope="col">Project Handled</th>
                                                                <td>:</td>
                                                                <td>
                                                                    <!-- <p style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"> -->
                                                                    {!!$exper->workex_handle_project!!}
                                                                    <!-- </p> -->
                                                                </tr>
                                                            </table>
                    
                                                                <br>
                                                            @endforeach
                                                        </div>  

                                        <hr>
                <p style=" background-color: #053D6E; font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif" class="text-white">
                        <b>PROJECT HIGHLIGHT</b>
                </p>
                <table width="100%" border="1">
                                                                    @php
                                                                      $getdatapor = DB::table('portfolio')->where('portfolio_talent_id',$all->talent_id)->get();
                                                                    @endphp
                                                                    @foreach ($getdatapor as $por)

                                                                        <tr>
                                                                            <td>Project Name</td>
                                                                            <td>:</td>
                                                                            <td>
                                                                                {{$por->portfolio_name}}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Project Description</td>
                                                                            <td>:</td>
                                                                            <td>   
                                                                                {{$por->portfolio_desc}} 
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Teknology Used</td>
                                                                            <td>:</td>
                                                                            <td>
                                                                                {{$por->portfolio_tech}}                                                               
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>Dated Created</td>
                                                                            <td>:</td>
                                                                            <td>
                                                                                {{$por->portfolio_startdate.' - '.$por->portfolio_enddate}}
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </table>                                                     
                <hr>
                <p style=" background-color: #053D6E; font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif" class="text-white">
                        <b>EDUCATIONAL BACKGROUND</b>
                </p>
                <div align="center">
                                                                <table width="100%" border="1">
                                                                    <thead align="center" style="background-color: #ABB4BD">
                                                                        <tr>
                                                                            <td>Educational Institutional</td>
                                                                            <td>Education Level</td>
                                                                            <td>Year</td>
                                                                            <td>GPA</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody align="center">
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
                                                                    </tbody>
                                                                </table>
                                                            </div>
                <hr>
                <p style=" background-color: #053D6E; font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif" class="text-white">
                    <b>LICENSES & CERTIFICATION</b>
                </p>
                <table width="100%" border="1">
                                                                    <thead align="center" style="background-color: #ABB4BD">
                                                                        <tr>
                                                                            <td>Certification Name</td>
                                                                            <td>Certification Years</td>
                                                                            <td>Certification Company</td>
                                                                            <td>Certification Number</td>
                                                                            <td>Certification Expired</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody align="center">
                                                                    @foreach ($certif as $certification)
                                                                        <tr>
                                                                            <td>
                                                                                 {{$certification->certif_name}}
                                                                            </td>
                                                                            
                                                                            <td>
                                                                                {{$certification->certif_company}}
                                                                            </td>
                                                                            
                                                                            <td>
                                                                            {{$certification->certif_years}}
                                                                            <br>{{-- Scrum Organization LTD Issued January 2019 • <br> --}}
                                                                                   {{-- {{$c->certif_expired}}<br> --}}
                                                                                  <br>                                                                    
                                                                            </td>
                                                                            
                                                                            <td>
                                                                            Credential ID {{$certification->certif_number}}
                                                                            </td>

                                                                            <td>
                                                                            {{$certification->certif_expired}}
                                                                            {{-- 0111101111111 --}}
                                                                            </td>
                                                                        </tr>
                                                                       
                                                                    </tbody>
                                                                    @endforeach
                                                                </table>

                <hr>
                <p style=" background-color: #053D6E; font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif" class="text-white">
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
                         <tr style=" background-color: #053D6E;">
                                <td style="padding-left: 10px" colspan="2" class="text-white"> Further Information </td>
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
