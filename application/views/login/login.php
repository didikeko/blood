
<section class="bg0 p-t-104 p-b-116">


    <div class="container">
        <div class="form-login">
            <h4 class="mtext-105 cl2 txt-center p-b-30">
                Login
            </h4>
            <form method="post" action="<?php echo site_url ('Login/cek_login');?>" id="login">
                <div class="form-group">
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="password" type="password" name="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Minimal 6 Karakter' : '');" placeholder="Password" required>
                    </div>
                </div>

                <div class="form-check" style="margin-left: 20px; margin-bottom: 20px">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Saya menyetujui <a href="">aturan pakai</a> yang berlaku</label>
                </div>
                
                <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" type="submit">
                    Submit
                </button>
                <div style="margin-top: 10px">
                    <label>Belum Mempunyai Akun BloodEmrgence? <a href="<?php echo site_url('Register'); ?>"> Daftar Sekarang</a></label>
                </div>
                    
            </form>
        </div>
    </div>
</section>



