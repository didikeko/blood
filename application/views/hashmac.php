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

		<title>Admin</title>
	</head>
	<body>
		<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Hash MAC</h1>
	               		<hr />
	               	</div>
	            </div>
				<div class="main-login main-center">
					<form class="form-horizontal"  action="<?php echo site_url("Hash\hash_mac") ?>" method="post">

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Masukkan Kunci Hash</label>
							<div class="cols-sm-10">
                <div class="input-group">
                      <span class="input-group-addon">Text</span>
                      <input id="msg" type="text" class="form-control" name="key" placeholder="Additional Info">
                    </div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Masukkan Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="pass" id="confirm"  placeholder="Masukkan passwordmu"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<button type="submit" class="btn btn-primary btn-lg btn-block login-button">Hash Mac</button>
						</div>

					</form>
				</div>
			</div>
		</div>


		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	</body>
</html>
