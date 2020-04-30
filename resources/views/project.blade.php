
<section class="mx-5">
    <form action="" method="POST">
        <input type="hidden" name="class_id" value="1">
        <div align="left" style="font-size: 16px; " class="step">
            <h1 style="font-size: 24px; font-weight: bold ; margin-top:10px">Hai Kak !</h1>
            <p>Kami bermaksud untuk memfollowup pendaftaran / pertanyaan - pertanyaan anda , kami minta waktu sebentar untuk interview lewat form ini ya kak..</p>
            <p>Untuk saat ini kelas offline ( onsite ) di jogja yang tidak ada biaya pendaftaran sedang ditiadakan karena covid-19 kak , saat ini hanya tersedia kelas online dengan biaya yang bisa menyesuaikan</p>
            <p>Jawaban-jawaban ini nanti termasuk faktor penentu biaya, namun kami&nbsp; tepat menyediakan program beasiswa dengan konsep ISA ( Income Share Agreement ) untuk beberapa pendaftar yang kami rasa memiliki potensi dari hasil interview &amp; test&nbsp;</p>
            <p>Silahkan jawab dan klik tombol lanjut</p>

            <input type="hidden" name="ids[]" value="1">
            <input type="hidden" name="questions[]" value="Hai Kak !" >
            <div id="answer">    
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answers[]" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Default radio
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answers[]" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                        Second default radio
                    </label>
                </div>
            </div>
            <hr style="margin-top: 20px">
            <a class="btn big-btn bg-primary flat-btn float-btn navigate nav-next mt-n5" style="cursor: pointer; float: right;">
                Next<i class="fa fa-angle-right"></i>
            </a>
            <div style="clear: both;"></div>
        </div>

        <div align="left" style="font-size: 16px;  display:none " class="step">
            <h1 style="font-size: 24px; font-weight: bold ; margin-top:10px">Apaibila tidak lolos seleksi beasiswa apakah bersedia dialihkan ke kelas regular ?</h1>
            <p>kalau program regular ada biayanya kak, namun bisa menyesuaikan kemampuan masing-masing , dari kakak sndiri maksimal budget untuk belajar berapa kak ? sekaligus untuk data survey kami</p>
            
            <input type="hidden" name="ids[]" value="192">
            <input type="hidden" name="questions[]" value="Apaibila tidak lolos seleksi beasiswa apakah bersedia dialihkan ke kelas regular ?" >
            <div id="answer">
                <textarea name="answers[]" cols="30" rows="8"  style="width: 100%; margin-top: 20px"></textarea>
            </div>
            <hr style="margin-top: 20px">
            <a class="btn big-btn bg-primary flat-btn float-btn navigate nav-prev mt-n5" style="float: left;">
                Kembali
            </a>
            <a class="btn big-btn bg-primary flat-btn float-btn navigate nav-next mt-n5" style="cursor: pointer; float: right;">
                Next<i class="fa fa-angle-right"></i>
            </a>
            <div style="clear: both;"></div>
        </div>

        <div align="left" style="font-size: 16px;  display:none " class="step">
            <h1 style="font-size: 24px; font-weight: bold ; margin-top:10px">Kalau boleh tau dapat informasi seputar program ini dari mana ?</h1>
            <input type="hidden" name="ids[]" value="3">
            <input type="hidden" name="questions[]" value="Kalau boleh tau dapat informasi seputar program ini dari mana ?" >
            <div id="answer" class="my-5">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Instagram
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                    <label class="form-check-label" for="defaultCheck2">
                        Facebook
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                    <label class="form-check-label" for="defaultCheck2">
                        Forum
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                    <label class="form-check-label" for="defaultCheck2">
                        Kerabat
                    </label>
                </div>
            </div>
            <hr style="margin-top: 20px">
            <a class="btn big-btn bg-primary flat-btn float-btn navigate nav-prev" style="float: left;">
                Kembali
            </a>             
            <!-- <a class="btn big-btn bg-primary flat-btn float-btn navigate nav-next" style="cursor: pointer; float: right;">
                Next<i class="fa fa-angle-right"></i>
            </a> -->
            <div style="clear: both;"></div>
        </div>
    </form>
</section>
<script>
    $(document).ready(function()
    {
        $(".nav-next:not(:last)").click(function()
        {
            $(this).parent().hide();
            $(this).closest('.step').next().show();
            return false ; 
        });
        $(".nav-prev").click (function()
        {
            $(this).parent().hide();
            $(this).closest('.step').next().show();
            return false ;
        });
        $(".nav-next:last").click(function()
        {
            $(this).parent().hide();
            $(this).closest('.step').next().show();
            return false ; 
        })
    });
</script>