<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi Penggunaan Lcd dan Absen</title>
    <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.css">
    <style>
        body {

           background: #333 url('http://localhost/Project/images/wallpaper.png') center center no-repeat; 
        }
        
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
    </style>
    
</head>
<body style="background-color: #221;">
<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default" style="margin-top: 10%;">
				<div class="panel-heading">
                     <h2 align="center" style="font-family: Times New Roman, Times, serif; font-size:24px;" ;>Sistem Informasi LCD</h2>      
                     <img class="center" src="http://localhost/Project/images/logo.png" width="50px"/> <br>
                     


				</div>
                <div class="panel-body" style="background-color: #ccc;">
                    <form action="<?php echo base_url('c_sim/user_login') ?>" method="post" class="form-horizontal">
                    <?php if ($error = $this->session->flashdata('pesan')): ?>
						<div class="form-group">
							<div class="col-md-12">
								<div class="alert alert-dismissible alert-danger">
								  <button type="button" class="close" data-dismiss="alert">&times;</button>
								  <?php echo $error; ?>
								</div>
							</div>
						</div>
						<?php endif ?>
                        <div class="form-group">
                            <div class="col-md-12">
                            <input class="form-control" type="text" name="username" value="" placeholder="Masukkan Username" required="">
                            
                            </div>
                            <div class="col-md-12">
									<?php echo form_error('username','<span class="text-danger">','</span>') ?>
								</div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                            <input class="form-control" type="password" name="password" value="" placeholder="Masukkan Password" required="">
                            
                            </div>
                            <div class="col-md-12">
									<?php echo form_error('password','<span class="text-danger">','</span>') ?>
								</div>    
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                            <input class="btn btn-primary btn-block" type="submit" value="Login">
                            
                            </div>    
                        </div>
                    </form>
        </div>
        </div>
    </div>
</div>
</div>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
</body>
</html>