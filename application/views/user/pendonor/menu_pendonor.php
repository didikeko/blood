<!-- Header -->
<header class="header-v2">
    <!-- Topbar -->
    <div class="top-bar ">
        <div class="content-topbar flex-sb-m h-full container">
            <div class="left-top-bar flex-w txt-center">
                Sumbangkan Darah anda untuk kemanusiaan
            </div>

        </div>
    </div>
    <!-- Header desktop -->
    <div class="container-menu-desktop trans-03">
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop p-l-45 container">

                <!-- Logo desktop -->		
                <a href="#" class="logo">
                    <img src="<?php echo base_url('assets'); ?>/images/icons/logo-01.png" alt="IMG-LOGO">
                </a>


                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li>
                            <a href="<?php echo site_url('Pendonor/DashboardPo'); ?>">Home</a>
                        </li>

                        <li>
                            <a href="about.html">About</a>
                        </li>

                    </ul>
                </div>	

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m h-full">
                    <div class="flex-c-m h-full p-r-24">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
                            <!-- <i class="zmdi zmdi-search"></i> -->
                            <i3 style="font-size: 20px; font-variant: small-caps;"><?php echo $this->session->userdata('username').' '?></i><img class="imgdidik2" src="<?php echo base_url ().'assets/images/profil/'.$foto?>" alt="avatar">
                        </div>
                    </div>

                    <div class="flex-c-m h-full p-l-18 p-r-25 bor5">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="<?php echo $count; ?>">
                            <i class="icon-bell"></i>
                        </div>
                    </div>

                    <div class="flex-c-m h-full p-lr-19">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
                            <i class="zmdi zmdi-menu"></i>
                        </div>
                    </div>
                </div>
            </nav>
        </div>	
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->		
        <div class="logo-mobile">
             <i3 style="font-size: 20px; font-variant: small-caps;"><?php echo $this->session->userdata('username').' '?></i><img class="imgdidik2" src="<?php echo base_url ().'assets/images/profil/'.$foto?>" alt="avatar">
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
            <div class="flex-c-m h-full p-r-10">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
                    <i class="zmdi zmdi-search"></i>
                </div>
            </div>

            <div class="flex-c-m h-full p-lr-10 bor5">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="<?php echo $count; ?>">
                    <i class="icon-bell"></i>
                </div>
            </div>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
           <li class="p-b-13">
                    <a href="<?php echo site_url(); ?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Home
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="<?php echo site_url('Pendonor/DashboardPo/profile'); ?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Akun Saya
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="<?php echo site_url('Pendonor/DashboardPo/ubah'); ?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Ubah Profile
                    </a>
                </li>
                <li class="p-b-13">
                    <a href="#" class="stext-102 cl2 hov-cl1 trans-04">
                        Help & FAQs
                    </a>
                </li>
                 <li class="p-b-13">
                    <a href="<?php echo site_url('Pendonor/DashboardPo/logout'); ?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Logout
                    </a>
                </li>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="<?php echo base_url('assets'); ?>/images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header>

<!-- Cart -->
    <div class="wrap-header-cart js-panel-cart">
        <div class="s-full js-hide-cart"></div>

        <div class="header-cart flex-col-l p-l-65 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-102 cl2" style="color: #D50000">
                    Patient Need Your Blood
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>

            <div class="header-cart-content flex-w js-pscroll">
                <ul class="header-cart-wrapitem w-full">
                    <?php 
                             foreach ($pasien as $row):
                     ?>
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11" >
                            <!-- <img src="<?php //echo base_url('assets'); ?>/images/icon_blood.png" alt="IMG"> -->
                           
                                
                           
                            
                                <span class="glyphicon glyphicon-heart" aria-hidden="true" style="color: #D50000" > </span>
                                 <form id=f1>
                                    <input type="hidden" name="id_aproval" value="<?php echo $row->id_aproval?>">  
                                  </form>
                                
                                
                                
                           
                   
                        </div>

                        <div class="header-cart-item-txt p-t-8 st" style="font-weight: bold">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04 bolddidi">
                                <?php  echo $row->nama?> (<?php echo $row->golongan_darah?>)
                            </a>
                             <span class="header-cart-item-info">
                                <?php  echo $row->nm?>
                            </span>
                        </div>
                    </li>
                    <?php 
                           endforeach
                     ?>
                    
                </ul>

                <div class="w-full">
                    <div class="header-cart-total w-full p-tb-40">
                        Pemdor Today : 20
                    </div>

                    <!-- <div class="header-cart-buttons flex-w w-full">
                        <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            Lihat Daftar
                        </a>

                        <!-- <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Check Out
                        </a> -->
                    </div> -->
                </div>
            </div>
        </div>
    </div>


<!-- Sidebar -->
<aside class="wrap-sidebar js-sidebar">
    

    <div class="sidebar flex-col-l p-t-22 p-b-25">
        <div class="flex-r w-full p-b-30 p-r-27">
            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
            <ul class="sidebar-link w-full">
                <li class="p-b-13">
                    <a href="<?php echo site_url('Pendonor/DashboardPo/profile'); ?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Home
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="<?php echo site_url('Pendonor/DashboardPo/profile'); ?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Akun Saya
                    </a>
                </li>

                <li class="p-b-13">
                    <a href="<?php echo site_url('Pendonor/DashboardPo/ubah'); ?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Ubah Profile
                    </a>
                </li>
                <li class="p-b-13">
                    <a href="#" class="stext-102 cl2 hov-cl1 trans-04">
                        Help & FAQs
                    </a>
                </li>
                 <li class="p-b-13">
                    <a href="<?php echo site_url('Pendonor/DashboardPo/logout'); ?>" class="stext-102 cl2 hov-cl1 trans-04">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>