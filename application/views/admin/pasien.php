
		  <div class="panel-body table-responsive">
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Pasien</th>
					<th>Golongan Darah</th>
					<th>Umur</th>
                    <th>Jenis Kelamin</th>
				</tr>
			</thead>
			<tbody>
	<?php
		
		$x=1;
		foreach ($pasien as $value):
				echo '<tr>';
				echo	'<td>'.$x++.'</td>';
				echo	'<td>'.$value->nama.'</td>';
				echo	'<td>'.$value->golongan_darah.'</td>';
				echo	'<td>'.$value->umur.'</td>';
                if ($value->jenis_kelamin == '0' ) {
                    $gen= 'perempuan';
                }
                else{
                    $gen = 'laki-laki';
                }
                echo    '<td>'.$gen.'</td>';
               	echo '<tr>';	
		endforeach
	?>
			</tbody>
			</table>
		  </div>
		
	</div>	<!--/.main-->
	