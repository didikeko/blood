 <?php
 //   var_dump($partner);
 // // echo $value[0]['nama'];
 //   die();
 foreach  ($partner as $value): 


?>
    <section>
        <div class="container footer-wrapper">
            <div class="row"> 
                <div class="col-md-2"> 

                    <div id="spied"> 
                        <ul class="nav entity-show-sidebar hidden-sm hidden-xs" data-spy="affix"> 
                            <li> 
                                <a href="#account" style="color: #686E6A" ><strong>Pengaturan Akun</strong></a>
                            </li> 
                            <li> 
                                <a href="#password" style="color: #686E6A" ><strong>Pengaturan Password</strong></a> 
                            </li> 
                            <li> 
                                <a href="#email" style="color: #686E6A" ><strong>Pengaturan Email</strong></a> 
                            </li>
                        </ul> 
                    </div> 

                </div> 
                <div class="col-md-10"> 
                    <div id="account">
                        <div class="entity-description-item">
                            <h2>Pengaturan Akun</h2><br>
                            <div class="row-paragraph">
                           <!--  method="POST" enctype="multipart/form-data" action="<?php //echo site_url ('Partner/Dashboard/update_partner');?>"  -->
                                <form accept-charset="UTF-8" method="POST" enctype="multipart/form-data" action="<?php echo site_url ('Partner/Dashboard/update_partner');?>" role="form" id="profile-form" class="form-horizontal js-bootstrap-validator">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="name">Nama</label>
                                        <div class="col-sm-10">
                                            <input name="nama" type="text" class="form-control" id="name" value="<?php echo $value->nama?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="username">Username</label>
                                        <div class="col-sm-10">
                                            <input name="username" type="text" class="form-control" id="name" value="<?php echo $value->username?>">
                                        </div>
                                    </div>

                                   <!--  <div class="form-group">
                                        <label class="control-label col-sm-2" for="display_name">Username</label>
                                        <div class="col-sm-10">
                                            <input name="username" type="text" class="form-control" id="display_name" value="<?php// echo $value->username?>">
                                        </div>
                                    </div> -->

                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Email</label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static"><?php echo $value->email?></p>
                                            <p class="help-block">Bila Anda hendak mengubah email, Anda dapat melakukannya <a href="#email-update">pada form di bawah.</a></p>
                                        </div>
                                    </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="image">Foto</label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img src="<?php echo base_url ().'assets/images/profil/'.$value->foto?>" alt='Andri Puji Prasetiyo' class='img-responsive' />
                                                    </div>
                                                    <div class="col-md-10">
                                                        Gambar Profile Anda sebaiknya memiliki rasio 1:1 dan berukuran tidak lebih dari 2MB.<br/>
                                                        <input type="file" name="image" title="Change Avatar" data-filename-placement="inside">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="phone">Nomor Telepon</label>
                                            <div class="col-sm-10">
                                                <input name="phone" type="text" class="form-control" id="phone" value="<?php echo $value->telepon?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="city">Asal Provinsi</label>
                                            <div class="col-sm-10">
                                                <select id="propinsi" name="propinsi" class="form-control" style="height: 34px">
                                                    <option value="0">-Pilih Provinsi-</option><br>
                                                    <?php $this->load->view('user/src/get_province'); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="city">Asal Kota</label>
                                            <div class="col-sm-10">
                                                <select id="origin" name="origin" class="form-control" style="height: 34px">
                                                </select>
                                                <!-- <span class="help-block">Kota saat ini: <?php //echo $value->kota?></span> -->
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="phone">Alamat Lengkap</label>
                                            <div class="col-sm-10">
                                                <input name="alamat" type="text" class="form-control" id="alamat" value="<?php echo $value->alamat?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-10 col-sm-offset-2">
                                                <button type="submit" class="btn btn-md btn btn-danger" type="submit" id="update_partner">
                                                    <span class="text-with-icon">
                                                        <i class="fa fa-save"></i> Simpan Perubahan
                                                    </span>

                                                </button>
                                                <div id="displayHasil"></div>
                                            </div>
                                        </div>
                                       

                                        
                                        
                                        </form>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div id="password">
                            <div class="entity-description-item">
                                <div class="row-paragraph">


                                    <div class="spacier">

                                        <form method="POST" action="<?php echo site_url ('Partner/Dashboard/update_password');?>" accept-charset="UTF-8" role="form" id="email-update" class="form-horizontal">

                                        <div class="form-group">
                                            <div class="col-sm-10 col-sm-offset-2">
                                                <div class="page-header">
                                                    <h3>Ubah Password</h3>
                                                    <p>Isi form dibawah ini hanya bila Anda hendak mengubah password Anda.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="password">Password</label>
                                            <div class="col-sm-10">
                                                <input name="password" type="password" class="form-control" id="password"  name="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Minimal 6 Karakter' : '');
                                                if (this.checkValidity())
                                                    form.kpassword.pattern = this.value;" placeholder="Change password" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="password_confirmation">Konfirmasi Password</label>
                                            <div class="col-sm-10">
                                                <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" name="kpassword" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Masukkan Password Yang Sama' : '');" placeholder="Verify new password" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-10 col-sm-offset-2">
                                                <button type="submit" class="btn btn-md btn btn-danger" type="submit">
                                                    <span class="text-with-icon">
                                                        <i class="fa fa-save"></i> Perbarui Password
                                                    </span>
                                                </button>
                                            </div>
                                        </div>    

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <hr>

                        <div id="email">
                            <div class="entity-description-item">
                                <h2>Pengaturan Email</h2><br>
                                <div class="row-paragraph">


                                    <div class="spacier">

                                        <form method="POST" action="#" accept-charset="UTF-8" role="form" id="email-update" class="form-horizontal"><input name="_token" type="hidden" value="#">

                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="name">Email Baru</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="new_email" placeholder="Masukkan email baru Anda" class="form-control">
                                                    <p class="help-block">
                                                        Ketika Anda mengirim permintaan untuk mengubah Email Anda, Bloodemergency akan mengirim email verifikasi untuk memvalidasi bahwa Email yang Anda masukkan di atas adalah benar milik Anda.
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-10 col-sm-offset-2">
                                                    <button type="submit" class="btn btn-md btn btn-danger">
                                                        <span class="text-with-icon">
                                                            <i class="fa fa-envelope"></i> Ubah Email
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            
            <?php
        endforeach

        ?>
