<style>

</style>
<img src="{{asset('img/logo.png')}}" height='100px'alt="Logo">
<hr>
<br>
<center><strong>Laporan Hasil Wawancara</strong></center>
<br>
<table>
    <col width="130">
    <col width="80">
    <tr>
        <td width="130">Nama Pelamar</td>
        <td> : </td>
        <td>{{$all->jobs_apply_name}}</td>
    </tr>
    <tr>
        <td width="130">Tempat, Tanggal Lahir</td>
        <td> : </td>
        <td>{{$all->jobs_apply_place_of_birth.", ".date("F j, Y, g:i a", strtotime($all->jobs_apply_birth_date))}}</td>
    </tr>
    <tr>
        <td width="130">Posisi</td>
        <td> : </td>
        <td>{{$all->jobs_title}}</td>
    </tr>
    <tr>
        <td width="130">Lokasi Kerja</td>
        <td> : </td>
        <td>{{$all->jobs_apply_location}}</td>
    </tr>
    <tr>
        <td width="130">Tipe Pekerjaan</td>
        <td> : </td>
        <td>{{$all->jobs_apply_type_time}}</td>
    </tr>
    <tr>
        <td width="130">Hari, Tanggal</td>
        <td> : </td>
        <td>
            @php
            $hari = date('w', strtotime($interview->created_at));
            if($hari == 0) $str_hari = "Senin";
            else if($hari == 1) $str_hari = "Selasa";
            else if($hari == 2) $str_hari = "Rabu";
            else if($hari == 3) $str_hari = "Kamis";
            else if($hari == 4) $str_hari = "Jum'at";
            else if($hari == 5) $str_hari = "Sabtu";
            else if($hari == 6) $str_hari = "Minggu";
            @endphp
            {{$str_hari.", ".date("F j, Y, g:i a", strtotime($interview->created_at))}}
        </td>
    </tr>
    <tr>
        <td width="130">Alamat E-Mail</td>
        <td> : </td>
        <td>{{$all->jobs_apply_email}}</td>
    </tr>
    <tr>
        <td width="130">Nomor Telepon</td>
        <td> : </td>
        <td>{{$all->jobs_apply_phone}}</td>
    </tr>
</table>


