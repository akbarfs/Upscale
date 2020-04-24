@extends('layouts.hf')

@section('content')

    <section id="contact" class="section_c" style="margin-top: 100px;">
        <div class="container">
            <div class="row text-center" style="margin: 0 80px 80px 80px;">
                <div class="col-md-12">
                    <h1>Referral</h1>
                    <p style="margin-top: 30px;font-family: Arial;font-style: normal;font-weight: normal;font-size: 18px;line-height: 28px;text-align: center;">Dapatkan keuntungan dengan mempunyai kode referral</p>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="boxed boxed--border">
                        <form class="row mx-0">
                            <div class="col-md-12"></div>
                            <div class="col-md-12">
                                <div class="col-md-1"></div>
                                <label class="col-md-3" style="margin-top: 7px;">Full name</label>
                                <input type="text" name="name" class="col-md-7 validate-required" required="" placeholder="Nama lengkap teman">
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-1"></div>
                                <label class="col-md-3" style="margin-top: 7px;">Email Address</label>
                                <input type="email" name="email" class="col-md-7 validate-required" required="" placeholder="Email Aktif">
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-1"></div>
                                <label class="col-md-3" style="margin-top: 7px;">Phone number</label>
                                <input type="text" name="phone" class="col-md-7 validate-required" required="" placeholder="Whatsapp/Telegram">
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-1"></div>
                                <label class="col-md-3">Nama Penerima</label>
                                <input type="text" name="namapenerima" class="col-md-7 validate-required" required="" placeholder="Nama Penerima Bank">
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-1"></div>
                                <label class="col-md-3" style="margin-top: 7px;">Bank Name</label>
                                <input type="text" name="bankname" class="col-md-4 validate-required" required="" placeholder="Nama Bank">
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-1"></div>
                                <label class="col-md-3">Bank Number Account</label>
                                <input type="text" name="bankaccountnumber" class="col-md-4 validate-required" required="" placeholder="Nomer Rekening Bank">
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-1"></div>
                                <label class="col-md-3" style="margin-top: 7px;">Kota</label>
                                <input type="text" name="kota" class="col-md-4 validate-required" required="" placeholder="Asal">
                            </div>
                            <div class="col-md-12">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-7"><img src="{{ asset('career/images/asset/captcha.png') }}" alt=""></div>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-3">
                                <button id="submit-btn" class="btn btn--primary" type="submit"
                                    style="background: #4AB3FF; color: #fff;">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
    </section>

@endsection