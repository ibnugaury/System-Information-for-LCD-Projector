<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Help</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.semanticui.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
  
    #main {
    width: 800px;
    margin: 40px auto 0;
    padding: 50px;
    box-sizing: border-box;
    background: url('img/paper-pattern.jpg') top left repeat;
    box-shadow: 0 10px 15px -8px #000;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    text-align: center;
    }

    
    
    
    
    
    
    
    </style>
</head>

<body>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <img src="http://localhost/Project/images/logo.png" width="25px"/>
  <a class="navbar-brand" href="<?php echo base_url('c_home') ?>">Teknik Unhas</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown" data-toggle="dropdown" role="button" aria-expanded="false">Admin <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href=""><span class="fa fa-user"></span>&nbsp; Data Admin</a></li>
          </ul>
        </li>
      </ul>
       <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown" data-toggle="dropdown" role="button" aria-expanded="false">Laporan Harian <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url('c_report') ?>"><span class="fa fa-book"></span>&nbsp; Catatan Data Pengguna</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
        
          <a href="#" class="dropdown" data-toggle="dropdown" role="button" aria-expanded="false"><img style="border-radius: 100%;height: 35px;width: 50px;" src="<?php echo base_url('uploads/'.$this->session->userdata('foto')) ?>" alt=""> <?php echo "Opsi ".strtoupper($this->session->userdata('username')); ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a onclick="return confirm('Anda Ingin Menghapus Semua Data??')" href="<?php echo base_url('c_home/DeleteAllMahasiswa') ?>"><i class="fa fa-trash"></i>Delete All Data</a></li>
            <li><a onclick="return confirm('Anda Ingin Keluar?')" href="<?php echo base_url('c_sim/keluar') ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div id="main"> 
        <img src="http://localhost/Project/images/logo.png" width="50px"/>
      
        <h1>Panduan Website</h1>
        <p></p>

      
    </div>
</body>

</html>