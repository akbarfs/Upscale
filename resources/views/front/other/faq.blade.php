@extends('layouts.template',['logo'=>'transparent'])

@section("menu_class",'light')

@section('content')


<main>
    <section class="section-base">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3>{{lang('For Business','Untuk Perusahaan / Pengusaha')}}</h3>
                    <hr class="space-sm">
                    <ul class="accordion-list">
                        <li>
                            <a href="#">{{lang('Who are we?','Siapakah kami ?')}}</a>
                            <div class="content">
                                <p>
                                    {{lang('We are a company focusing on providing the best talent for business.','Kami adalah perusahaan yang berfokus pada solusi penyedia talent / tenaga kerja.')}}
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="#">{{lang('Who needs us?','Siapakah yang membutuhkan kami ?')}}</a>
                            <div class="content">
                                <p>
                                    {{lang('All companies that need talents for both full-time or part-time, for both on-site or remote working.','Semua perusahaan yang membutuhkan talent ( tenaga kerja ), baik sebagai karyawan fulltime, freelance, secara onsite ( dikantor anda ) atau secara remote ( from home / tempat lainya )')}}
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="#">{{lang('Which company is suitable for our services?','Skala perusahaan yang cocok menggunakan Upscale ?')}}</a>
                            <div class="content">
                                <p>
                                    {{lang('Our services are suitable for all small business, startups and corporate.','Service kami cocok untuk segala level perusahaan, baik UKM, Startup maupun corporate')}}
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="#">{{lang('How to request a talent?','Bagaimana cara request talent / tenaga kerja ?')}}</a>
                            <div class="content">
                                <p>
                                    {{lang('Just fill the quotation form or start a live chat and one of our representatives will help you from there.','Silahkan hubungi kami ke nomor 087-888-666-531, baik whatsapp atau telephone')}}
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="#">{{lang('What makes us unique?','Apakah kelebihan / keunikan Upscale dibanding perusahaan lain')}}</a>
                            <div class="content">
                                <p>
                                    {{lang('We have a rapidly growing ecosystem and with collaboration from universities, partnership, and community we have more than tens of thousands talent.','Perusahaan kami memiliki ecosystem yang berkembang pesat, dengan kerjasama dengan berbagai pihak kami memiliki total database talent pool lebih dari puluhan ribu talent.')}}
                                </p>
                            </div>
                        </li>
                    </ul>
                    <hr class="space">
                </div>
                <div class="col-lg-6">
                <h3>{{lang('For Talent','Untuk Talent')}}</h3>
                    <hr class="space-sm">
                    <ul class="accordion-list">
                        <li>
                            <a href="#">{{lang('How to join as talent?','Bagaimana cara mendaftar Upscale ?')}}</a>
                            <div class="content">
                                <p>
                                    {{lang('You can directly fill the data on our registration form via "For Talent" menu.','Bisa klik tombol login / register di kanan atas website ini , atau klik ke halaman "for talent"')}}
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="#">{{lang('What\'s the benefit to join as talent?','Apa manfaat bergabung ke upscale?')}}</a>
                            <div class="content">
                                <p>
                                    {{lang('Other than opportunities to get hired by the multinational company, you can also get the benefit to join our growing network and share knowledge.','Selain mendapatkan tawaran pekerjaan, anda dapat memperluas network kamu agar banyak peluang yang mungkin bisa anda dapatkan.')}}
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="#">{{lang('What\'s the employment status from UpScale?','Bagaimana status pekerja bagi talent yang mendapatkan pekerjaan?')}}</a>
                            <div class="content">
                                <p>
                                    {{lang('We will have some options including a direct contract as UpScale\'s team, or under our client\'s contract with their company regulation. It will depend on the deal between the client and the talent itself.','Status pekerja ada beberapa macam, ada yang sebagai karyawan upscale, ada yang berstatus sebagai pegawai internal client kami. Tergantung kesepakatan dari client dan talent itu sendiri.')}}
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="#">{{lang('Am I able to get side project from UpScale?','Apakah saya bisa mendapatkan side project dari Upscale?')}}</a>
                            <div class="content">
                                <p>
                                    {{lang('Yes, you can get the side project from UpScale. As long as you provide that information on the profile, we\'ll help to find you a project-based job that best-matched with your skill.','Ya, tentu saja. Meskipun anda saat ini sudah bekerja, namun kami bisa membantu anda mendapatkan pekerjaan sampingan. Namun pastikan tidak mengganggu pekerjaan ya.')}}
                                </p>
                            </div>
                        </li>
                    </ul>
                    <hr class="space">
                </div>
            </div>
        </div>
    </section>    
</main>

<script src="{{url('template/upscale/themekit/scripts/sticky-kit.min.js')}}"></script>

@endsection