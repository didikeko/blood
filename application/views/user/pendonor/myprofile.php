
<header class="masthead bg-danger text-white txt-center">
  

  <div class="container">
    <?php
foreach ($pendonor as $value):
?>
    <img class="imgdidik1" src="<?php echo base_url ().'assets/images/profil/'.$value->foto?>" alt="avatar">
    
    <h4 class="font-weight-light mb-0 icon-clock" > Bergabung Sejak 26 Mei 2018</h4><br>
    <h4 class="font-weight-light mb-0 icon-home">Kota</h4>


  </div>

</header>
<!-- Portfolio Grid Section -->
<section class="features-icons bg-light text-center">
  <div class="container">
    <div class="row">

      <div class="txt-center" style="width: 33%;">
        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
          <div class="features-icons-icon d-flex">
            <i class="icon-trophy m-auto text-warning"></i>
          </div>
          <h3>Kontribusi</h3></br>
          <h4>20 Kali</h4>
        </div>

      </div>
      <div style="border-left: thick solid #ff0000;"></div>
      <div class="txt-center" style="width: 33%;">
        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
          <div class="features-icons-icon d-flex">
            <i class="icon-drop m-auto text-warning"></i>

          </div>
          <h3> Golongan Darah</h3><br>
          <h4><?php echo strtoupper($value->golongan_darah)?></h4>

        </div>

      </div>
      <div style="border-left: thick solid #ff0000;"></div>
      <div class="txt-center" style="width: 33%;">
        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
          <div class="features-icons-icon d-flex">
            <i class="icon-star m-auto text-warning"></i>

          </div>
          <h3> Point</h3><br>
          <h4>1500 Points</h4>
        </div>

      </div>

    </div>
  </div>
</section>
<?php
endforeach
?>
    
