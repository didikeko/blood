


<!-- Slider -->
<section class="section-slide">
  <div class="wrap-slick1">
    <div class="slick1">
      <div class="item-slick1" style="background-image: url(<?php echo base_url('assets'); ?>/images/slide-01.jpg);">
        <div class="container h-full">
          <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
              <span class="ltext-101 cl2 respon2">
                Setetes Darahmu Bermanfaat Bagi Orang Lain
              </span>
            </div>

            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
              <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                Donorin
              </h2>
            </div>

            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
              <a href="<?php echo site_url('login'); ?>" class="flex-c-m stext-101 cl0 size-101 bor1 hov-btn1 p-lr-15 trans-04" style="background-color: #e8260c">
               DONATE Now
             </a>
           </div>
         </div>
       </div>
     </div>

     <div class="item-slick1" style="background-image: url(<?php echo base_url('assets'); ?>/images/slide-02.jpg);">
      <div class="container h-full">
        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
          <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
            <span class="ltext-101 cl2 respon2">
              Donate Your Blood and make different
            </span>
          </div>

          <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
              Blood Emergency
            </h2>
          </div>

          <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
            <a href="product.html" class="flex-c-m stext-101 cl0 size-101  bor1 hov-btn1 p-lr-15 trans-04" style="background-color: #e8260c">
              Donate Now
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>



<!-- Icons Grid -->
<section class="features-icons bg-light text-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
          <div class="features-icons-icon d-flex">
            <i class="icon-heart m-auto text-danger"></i>
          </div>
          <h3>Donor Darah</h3></br>
          <p class="lead mb-0">Setetes darah anda akan bermanfaat bagi orang lain.</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
          <div class="features-icons-icon d-flex">
            <i class="icon-clock m-auto text-danger"></i>
          </div>
          <h3>Waktu</h3></br>
          <p class="lead mb-0">Waktu merupakan hal yang riskan disaat seseorang membutuhkan darah.</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
          <div class="features-icons-icon d-flex">
            <i class="icon-bell m-auto text-danger"></i>
          </div>
          <h3>Notifikasi</h3></br>
          <p class="lead mb-0">Dapatkan notifikasi setelah anda melakukukan login. Notifikasi berupa </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!--SERVICE END-->
<div id="portfolio">
  <div class="container">
    <div class="page-title text-center">
      <h1>Blood Emergency</h1>
     
      
    </div>
    <div class="row">
      <div class="col-lg-12">
        <ul id="portfolio-flters">
          <li data-filter=".filter-app, .filter-card, .filter-logo, .filter-web" class="filter-active">All</li>
          <li data-filter=".filter-app">A</li>
          <li data-filter=".filter-card">B</li>
          <li data-filter=".filter-logo">AB</li>
          <li data-filter=".filter-web">O</li>
        </ul>
      </div>
    </div>

    <div class="row" id="portfolio-wrapper">
    <?php 
        foreach ($a as $row):
    ?>
      <div class="col-lg-4 mb-4 portfolio-item protofolio-item filter-app">
        
          <div class="card h-100">
            <h4 class="card-header" style="background-color: white" ><?php echo $row->nama.' Reshus :'.$row->golongan_darah?></h4>
            <div class="card-body">
              <p class="card-text"><?php echo $row->isi_pesan?></p>
            </div>
            <div class="card-footer">
              <a href="<?php echo $row->link_map?>" class="btn btn-primary"><?php echo $row->nama_rumahsakit?></a>
            </div>
          </div>
        
      </div>
     <?php
        endforeach
     ?>


    <?php 
        foreach ($b as $val):
    ?>
      <div class="col-lg-4 mb-4 portfolio-item protofolio-item  filter-card">
        
          <div class="card h-100">
            <h4 class="card-header" style="background-color: white"><?php echo $val->nama.' Reshus :'.$val->golongan_darah?></h4>
            <div class="card-body">
              <p class="card-text"><?php echo $val->isi_pesan?>.</p>
            </div>
            <div class="card-footer">
              <a href="<?php echo $val->link_map?>" class="btn btn-primary"><?php echo $val->nama_rumahsakit?></a>
            </div>
          </div>
        
      </div>

    <?php
        endforeach
     ?>


    <?php 
        foreach ($ab as $ce):
    ?>
      <div class="col-lg-4 mb-4 portfolio-item protofolio-item  filter-logo">
        
          <div class="card h-100">
            <h4 class="card-header" style="background-color: white"><?php echo $ce->nama.' Reshus :'.$ce->golongan_darah?></h4>
            <div class="card-body">
              <p class="card-text"><?php echo $ce->isi_pesan?>.</p>
            </div>
            <div class="card-footer">
              <a href="<?php echo $ce->link_map?>" class="btn btn-primary"><?php echo $ce->nama_rumahsakit?></a>
            </div>
          </div>
        
      </div>
    <?php
        endforeach
     ?>
     
    <?php 
        foreach ($o as $ob):
    ?>
      <div class="col-lg-4 mb-4 portfolio-item protofolio-item  filter-web">
        
          <div class="card h-100">
            <h4 class="card-header" style="background-color: white"><?php echo $ob->nama.' Reshus :'.$ob->golongan_darah?></h4>
            <div class="card-body">
              <p class="card-text"><?php echo $ob->isi_pesan?>.</p>
            </div>
            <div class="card-footer">
             <a href="<?php echo $ob->link_map?>" class="btn btn-primary"><?php echo $ob->nama_rumahsakit?></a>
            </div>
          </div>
        
      </div>
    <?php
        endforeach
     ?>
     
    </div>
  </div>
</div>