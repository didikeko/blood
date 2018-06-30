
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <h5>Registration Form</h5>
        <hr>
        <div class="card" style="width: 70%; margin-bottom: 5%">
            <div class="card-body">
                <p>Apa Perbedaan Mendaftar Sebagai Pendonor & Partner?</p>
                <p>Mendaftar Sebagai Pendonor, Anda dapat menjadi pendonor bagi pasien yang membutuhkan </p>
                <p>Mendaftar Sebagai Partner, Anda dapat menjadi informan bagi pendonor jika ada pasien yang membutuhkan </p>
            </div>
        </div>
        <div>
            <h3 class="mtext-105 cl2 txt-center p-b-30">Sekarang Anda Mendaftar Sebagai Pendonor</h3>
        </div>
        <div class="form-login">
            <h4 class="mtext-105 cl2 txt-center p-b-30">
                <a href="<?php echo site_url('Register/Partner'); ?>"><h6>Ingin Mendaftar sebagai Partner?</h6></a>
            </h4>
            <form action="<?php echo site_url('Register/Pendonor_Insert'); ?>" method="post">
                <div class="form-group">
                    <label for="Nama">Nama</label>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="nama" placeholder="Nama">
                    </div>
                </div>
                <div class="form-group">
                    <label for="username">Nama Pengguna</label>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="username" placeholder="Nama Pengguna">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" placeholder="Email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="username">Golongan Darah</label>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <select id="goldarah" name="goldarah" class="text-111 cl2 plh3 size-116 p-l-62 p-r-30" style="background-color: #fff">
                           <option value="O-">O-</option>
                            <option value="O+">O+</option>
                            <option value="A-">A-</option>
                            <option value="A+">A+</option>
                            <option value="B-">B-</option>
                            <option value="B+">B+</option>
                            <option value="AB-">AB-</option>
                            <option value="AB+">AB+</option>
                            
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="password" type="password" name="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Minimal 6 Karakter' : '');
                        if (this.checkValidity())
                            form.kpassword.pattern = this.value;" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group"> 
                    <label for="kpassword">Konfirmasi Password</label>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="kpassword" type="password" name="kpassword" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Masukkan Password Yang Sama' : '');" placeholder="Konfirmasi Password" required>
                    </div>
                </div>
                <div class="form-check" style="margin-left: 20px; margin-bottom: 20px">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Saya menyetujui <a href="">aturan pakai</a> yang berlaku</label>
                </div>

                <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" type="submit">
                    Submit
                </button>
            </form>
        </div>
    </div>
</section>

