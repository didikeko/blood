<section class="bg0 p-t-104 p-b-116">
  <div class="container">
    <div class="flex-w flex-tr">
      <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
        <form action="<?php echo site_url('Broadcast/message'); ?>" method="post">
          <h4 class="mtext-105 cl2 txt-center p-b-30">
            Masukkan data Pasien
          </h4>

          <div class="bor8 m-b-20 how-pos4-parent">
            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="nama" placeholder="Nama Pasien">
          </div>

          <div class="form-group">
            <div class="bor8 m-b-20 how-pos4-parent">
              <select name="blood" class="form-control stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="sel1">
                <option value="" disabled selected hidden>Pilih Golongan Darah</option>
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

          <div class="bor8 m-b-20 how-pos4-parent">
            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="penyakit" placeholder="Penyakit yang dialami pasien">
          </div>

          <div class="bor8 m-b-20 how-pos4-parent">
            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="umur" placeholder="Umur Pasien">
          </div>

          <div class="form-group">
            <div class="bor8 m-b-20 how-pos4-parent">
              <select name="gender" class="form-control stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="sel1">
                <option value="" disabled selected hidden>Jenis Kelamin</option>
                <option value=0>Laki-Laki</option>
                <option value=1>Perempuan</option>
              </select>
                </div>
            </div>


      </div>

      <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">

          <h4 class="mtext-105 cl2 txt-center p-b-30">
            Buat Broadcast Untuk Pendonor
          </h4>

          <div class="bor8 m-b-30">
            <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="pesan" placeholder="Berikan ulasan pesan untuk pendonor"></textarea>
          </div>

          <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
            Submit
          </button>
        </form>
      </div>
    </div>
  </div>
</section>
