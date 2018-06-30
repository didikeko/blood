
<header class="masthead bg-danger text-white txt-center">
  

  <div class="container">
    <?php
foreach ($partner as $value):
?>
    <img class="img-fluid mb-5 d-block mx-auto imgdidik1"  src="<?php echo base_url ().'assets/images/profil/'.$value->foto?>" alt="">
    <h1 class="text mb-0"><?php echo $value->nama?></h1><br>
    <h4 class="font-weight-light mb-0 icon-clock" > Bergabung Sejak 26 Mei 2018</h4><br>
    <h4 class="font-weight-light mb-0 icon-home"> Kota Yogyakarta</h4>

<?php
endforeach
?>
    
  </div>

</header>
