
  <!-- Content page -->
  <section class="bg0 p-t-104 p-b-200">
    <div class="container">
      <div class="flex-w flex-tr">
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Pendonor</th>
      <th scope="col">Email Pendonor</th>
      <th scope="col">Nama Pasien</th>
      <th scope="col">Verifikasi</th>
    </tr>
  </thead>
  <tbody>
<?php 
$x=1;
foreach ($aprove as $key): 
?>
    <tr>
      <th scope="row"><?php echo $x++; ?></th>
      <td><?php echo $key->nama_pendonor?></td>
      <td><?php echo $key->email?></td>
      <td><?php echo $key->nama?></td>
      <td>
        <span class="glyphicon glyphicon-heart" aria-hidden="true" style="color: #D50000; font-size: 30px;" > </span>
              <form id=f1>
                <input type="hidden" name="id_aproval" value="<?php echo $key->id_aproval?>">  
              </form>                             

       </td>
    </tr>

<?php endforeach ?>
  </tbody>
</table>
      </div>
    </div>
  </section>  
