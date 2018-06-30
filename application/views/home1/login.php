<section class="bg0 p-t-104 p-b-116">
  <div class="container">
    <div class="flex-w flex-tr">
      <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
        <form action="<?php echo site_url('Broadcast/message'); ?>" method="post">
          <h4 class="mtext-105 cl2 txt-center p-b-30">
            Log In to Blood Emergency
          </h4>

          <div class="bor8 m-b-20 how-pos4-parent">
            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="username" placeholder="Username or Email">
          </div>


          <div class="bor8 m-b-20 how-pos4-parent">
            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="penyakit" placeholder="Password">
          </div>

          <div class="form-group">
            <div class="bor8 m-b-20 how-pos4-parent">
              <select name="blood" class="form-control stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="sel1">
                <option value="" disabled selected hidden>Lo-gin Sebagai</option>
                <option value="1">User Rumah Sakit</option>
                <option value="2">User Pendonor</option>
              </select>
                </div>
            </div>

          <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
            Submit
          </button>
        </form>


      </div>
    </div>
  </div>
</section>
