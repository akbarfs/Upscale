@extends('layouts.template',['logo'=>'transparent'])

@section("menu_class",'light')

@section('content')


<main>
    <section class="section-base">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Untuk Perusahaan / Pengusaha</h3>
                    <hr class="space-sm">
                    <ul class="accordion-list">
                        <li>
                            <a href="#">Siapakah kami ?</a>
                            <div class="content">
                                <p>
                                    Kami adalah perusahaan yang berfokus pada solusi penyedia talent / tenaga kerja.
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="#">Siapakah yang membutuhkan kami ?</a>
                            <div class="content">
                                <p>
                                    Semua perusahaan yang membutuhkan talent ( tenaga kerja ), baik sebagai karyawan fulltime, freelance, secara onsite ( dikantor anda ) atau secara remote ( from home / tempat lainya )
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="#"> Skala perusahaan yang cocok menggunakan Upscale ?</a>
                            <div class="content">
                                <p>
                                    Service kami cocok untuk segala level perusahaan, baik UKM, Startup maupun corporate
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="#">Bagaimana cara request talent / tenaga kerja ? </a>
                            <div class="content">
                                <p>
                                    Silahkan hubungi kami ke nomor 087-888-666-531, baik whatsapp atau telephone
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="#">  Apakah kelebihan / keunikan Upscale dibanding perusahaan lain </a>
                            <div class="content">
                                <p>
                                    Perusahaan kami memiliki ecosystem yang berkembang pesat, dengan kerjasama dengan berbagai pihak kami memiliki total database talent pool lebih dari puluhan ribu talent. 
                                </p>
                            </div>
                        </li>
                    </ul>
                    <hr class="space">
                    <h3>Untuk Talent</h3>
                    <hr class="space-sm">
                    <ul class="accordion-list">
                        <li>
                            <a href="#">Bagaimana cara mendaftar Upscale ?</a>
                            <div class="content">
                                <p>
                                    Bisa klik tombol login / register di kanan atas website ini , atau klik ke halaman "<a href="{{url('help-talent')}}" target="_blank">for talent</a>"
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="#">Apa manfaat bergabung ke upscale?</a>
                            <div class="content">
                                <p>
                                    Selain mendapatkan tawaran pekerjaan, anda dapat memperluas network kamu agar banyak peluang yang mungkin bisa anda dapatkan.
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="#">Bagaimana status pekerja bagi talent yang mendapatkan pekerjaan?</a>
                            <div class="content">
                                <p>
                                    Status pekerja ada beberapa macam, ada yang sebagai karyawan upscale, ada yang berstatus sebagai pegawai internal client kami. Tergantung kesepakatan dari client dan talent itu sendiri.
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="#">Apakah saya bisa mendapatkan side project dari Upscale?</a>
                            <div class="content">
                                <p>
                                    Ya, tentu saja. Meskipun anda saat ini sudah bekerja, namun kami bisa membantu anda mendapatkan pekerjaan sampingan. Namun pastikan tidak mengganggu pekerjaan ya.
                                </p>
                            </div>
                        </li>
                    </ul>
                    <hr class="space">
                    


                </div>
                <div class="col-lg-4">
                    <hr class="space visible-md" />
                    <div class="fixed-area" data-offset="80">
                        <h2>Contact Us.</h2>
                        <hr class="space-sm">
                        <ul class="text-list text-list-bold">
                            <li><b>Headquarter</b><p>Upscale coworkspace</p></li>
                            <li><b>Location</b><p>Maguwoharjo, Yogyakarta</p></li>
                            <li><b>Phone</b><p>087-888-666-531</p></li>
                            <li><b>Email</b><p>elvron.indonesia@gmail.com</p></li>
                            <!-- <li><b>Sales email</b><p>sales@business.com</p></li> -->
                        </ul>
                        <hr class="space-sm">
                        <div class="icon-links icon-social social-colors">
                            <a class="facebook"><i class="icon-facebook"></i></a>
                            <a class="twitter"><i class="icon-twitter"></i></a>
                            <a class="linkedin"><i class="icon-linkedin"></i></a>
                            <a class="instagram"><i class="icon-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
</main>

<script src="{{url('template/upscale/themekit/scripts/sticky-kit.min.js')}}"></script>

@endsection