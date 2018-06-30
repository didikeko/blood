<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
    <head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

		<!-- Website CSS style -->
		<link rel="stylesheet" type="text/css" href="assets/css/main.css">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
		<style>
.imgBorder {
  padding: 15px 15px 0;
  border-style: solid;
  border-color: green;
}
</style>
		<title>Admin</title>
	</head>
	<body>
		<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Hasil Hash menggunakan MD5</h1>
	               		<hr />
	               	</div>
	            </div>
	            
	            
			
				<div class="main-login main-center">

				<a  class="btn btn-default" aria-label="Left Align" href="<?php echo site_url(); ?>\hash" role="button"><span class="glyphicon glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
					<div class="imgBorder">
						<p><strong>Plaintext :</strong> <?php echo $textnya; ?> </p>
						<p><strong>Hasil Hash:</strong> <?php echo $hashmd; ?> </p>
					</div>
						
						
						

				</div>
			</div>
		</div>
		

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	</body>
</html>
