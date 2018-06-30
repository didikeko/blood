
		  <div class="panel-body table-responsive">
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>email</th>
					<th>Telepon</th>
                    <th>Golongan darah</th>
					<th>Provinsi</th>
					<th>Kota</th>
				</tr>
			</thead>
			<tbody>
	<?php
		$curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: e01523bc558bbc1262bdfa71ae84af51"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {echo "cURL Error #:" . $err;} 
        else {
        	$data = json_decode($response, true);
        	// echo '<td>'.$data['rajaongkir']['results'][$id_prov]['province'].'<td>';
    	}
 //===============================INIT KE DUA==================================================
		$x=1;
		foreach ($pendonor as $value):
				echo '<tr>';
				echo	'<td>'.$x++.'</td>';
				echo	'<td>'.$value->nama.'</td>';
				echo	'<td>'.$value->email.'</td>';
				echo	'<td>'.$value->telepon.'</td>';
                echo    '<td>'.$value->golongan_darah.'</td>';
		for ($j=0; $j < count($data['rajaongkir']['results']); $j++){
            	if ($data['rajaongkir']['results'][$j]['province_id'] == $value->id_provinsi) {
            			$prov_name= $data['rajaongkir']['results'][$j]['province'];
            		break;
            	}
            	
        	}
				echo	'<td>'.$prov_name.'</td>';
    	$curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$value->id_provinsi",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: e01523bc558bbc1262bdfa71ae84af51"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $datacity = json_decode($response, true);
            for ($j=0; $j < count($datacity['rajaongkir']['results']); $j++){
            	if ($datacity['rajaongkir']['results'][$j]['city_id'] == $value->id_kota) {
            			$city_name= $datacity['rajaongkir']['results'][$j]['city_name'];
            		break;
            	}
            	
        	}
        }
				echo	'<td>'.$city_name.'</td>';
				echo '<tr>';	
		endforeach
	?>
			</tbody>
			</table>
		  </div>
		
	</div>	<!--/.main-->
	