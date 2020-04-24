@extends('layouts.hf')

@section('content')

    <section id="contact" class="section_c" style="margin-top: 100px;">
        <div class="container">
            <div class="row text-center" style="margin: 0 80px 80px 80px;">
                <div class="col-md-12">
                    <h1>Refer a friend for a job?</h1>
                    <p style="margin-top: 30px;font-family: Arial;font-style: normal;font-weight: normal;font-size: 18px;line-height: 28px;text-align: center;">Care pada teman yang sedang mencari kerja / teman mau move on pada kerjaan yang diimpikan baik tim, suasana kerja maupun kesejahteraan lainnya + dapat bonus Rp.500.000</p>
                    <p style="color:rgb(150, 150, 150); Arial;font-style: normal;font-weight: normal;font-size: 16px;text-align: center;">Belum memiliki referral code? Klik <a  href="{{ route('referral') }}" style="color: blue;">disini.</a></p>
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
                                <label class="col-md-3" style="margin-top: 7px;">Phone number</label>
                                <input type="text" name="phone" class="col-md-7 validate-required" required="" placeholder="Whatsapp/Telegram">
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-1"></div>
                                <label class="col-md-3" style="margin-top: 7px;">Email Address</label>
                                <input type="email" name="email" class="col-md-7 validate-required" required="" placeholder="Email Aktif">
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-1"></div>
                                <label class="col-md-3" style="margin-top: 7px;">Skills</label>
                                <input type="text" name="skill" class="col-md-7 validate-required" required="" placeholder="PHP/Laravel/UI/UX dst..">
                            </div>
                            <div class="col-md-12">
                                    <div class="col-md-1"></div>
                                    <label class="col-md-3" style="margin-top: 7px;">Job Position</label>
                                    <select class="col-md-7">
                                            <option value="fulltime">Full Time</option>
                                            <option value="parttime">Part Time</option>
                                            <option value="freelance">Freelance</option>
                                            <option value="internship">Internship</option>
                                    </select>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-1"></div>
                                <label class="col-md-3" style="margin-top: 7px;">Upload CV</label>
                                    <input type="file" class="col-md-4 form-control-file" id="exampleFormControlFile1">
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-1"></div>
                                <label class="col-md-3" style="margin-top: 7px;">Referral Code</label>
                                <input type="text" name="referral" class="col-md-4 validate-required" required="">
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