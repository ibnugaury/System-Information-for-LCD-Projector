<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Halaman Awal</title>
    
    <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/Project/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.semanticui.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css" meedia="screen">
    th, td {
        text-align : center;
    }

    #container-main{
        padding-top: 25px;
        padding-bottom: 20px;
        margin-bottom: 30px;
        color: inherit;
        background-color: #ecf0f1;
    }


    
    </style>
</head>
<body>
    
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <img src="http://localhost/Project/images/logo.png" width="25px"/>
 <a class="navbar-brand" href="<?php echo base_url('c_home') ?> ">Teknik Unhas</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown" data-toggle="dropdown" role="button" aria-expanded="false">Help <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url('c_help') ?>"><span class="fa fa-user"></span>&nbsp; Info</a></li>
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
            <li><a onclick="return confirm('Anda Ingin Menghapus Semua Data??')" href="<?php echo base_url('c_home/DeleteAllMahasiswa') ?>"><i class="fa fa-trash"></i> Delete All Data</a></li>
            <li><a onclick="return confirm('Anda Ingin Keluar?')" href="<?php echo base_url('c_sim/keluar') ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

   
   <div class="container">
    <div id="container-main" class="jumbotron">
  <h2 class="display-3" align="center">Data Penggunaan LCD</h2>
  <h3 align="center">Teknik Unhas</h3>
  <hr>
</div>   

   <?php if ($pesan = $this->session->flashdata('pesan')): ?>
        <div class="form-group">
            <div class="col-md-12">
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $pesan; ?>
                 </div>
             </div>
        </div>
        <?php endif ?>

         <?php if ($pesan = $this->session->flashdata('edit_mahasiswa')): ?>
        <div class="form-group">
            <div class="col-md-12">
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $pesan; ?>
                 </div>
             </div>
        </div>
        <?php endif ?>
        
   <a style="margin:0;" href="" class="btn btn-primary" data-toggle="modal" data-target="#AddModal">Menambah Data</a> 
    <br><br>
   <table id="datatable" class="table table-hover table striped"> 
   <thead>
    <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jenis LCD</th>
            <th>Ruangan</th>
            <th>Mata Kuliah</th>
            <th>Status</th>
            <th>Pilihan</th>
    </tr>
 </thead>
    <?php
    $no = 1;
    if ($data->num_rows() >0) {
        foreach ($data->result() as $row) {
         ?>
         <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row->nim; ?></td>
                <td><?php echo $row->nama; ?></td>
                <td><?php echo $row->lcd; ?></td>
                <td><?php echo $row->ruangan; ?></td>
                <td><?php echo $row->matakuliah; ?></td>
                
                <?php if ($row->status == "Dipakai"): ?>
                <td>
                    <span class="label label-success"><?php echo $row->status; ?>
               
                    </span>
                </td>
                
                <?php else: ?>
                <td>
                    <span class="label label-danger"><?php echo $row->status; ?>
                
                    </span>
                </td>

                <?php endif ?>

                <td>
                <a href="<?php echo base_url("c_home/EditMahasiswa/{$row->id}")?>" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit Mahasiswa"><i class="fa fa-edit"></i> Ubah</a>
                <a onclick="return confirm('Yakin data ingin di hapus?')" 
                    href="<?php echo base_url("c_home/DeleteMahasiswa/{$row->id}") ?>" 
                    data-toggle="tooltip" data-placement="bottom" title="Hapus Mahasiswa" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                </td>
         
         </tr>
         <?php   
          
        }
    }
    ?>
    </table>
    <hr><br><br>
    
    </div>

    <div id="AddModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<div class="modal-title">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 align="center">Tambah Data</h2>
                    </div>
                </div>
    
               
                <div class="modal-body">
                <form action="<?php echo base_url('c_home/insertMahasiswa') ?>" method="post" accept-charset="utf-8">
                
                    <div class="form-group">
                <label>NIM</label>
                <input type="text" class="form-control" name="nim" placeholder="Masukkan Nim" required="">
                     </div>

                 <div class="col-md-12">
                    <?php echo form_error('nim', '<span class="text-danger">', '</span>') ?>
                 </div>    
                
                    <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required="">
                    </div>

                <div class="col-md-12">
                    <?php echo form_error('nama', '<span class="text-danger">', '</span>') ?>
                 </div>


                     <div class="form-group">
                <label>Jenis LCD</label>
                <input type="text" class="form-control" name="lcd" placeholder="Masukkan Jenis LCD" required="">
                     </div>

                <div class="col-md-12">
                    <?php echo form_error('lcd', '<span class="text-danger">', '</span>') ?>
                 </div>  

                
                    <div class="form-group">
                <label>Ruangan</label>
                <input type="text" class="form-control" name="ruangan" placeholder="Masukkan Ruangan" required="">
                    </div>

                <div class="col-md-12">
                    <?php echo form_error('ruangan', '<span class="text-danger">', '</span>') ?>
                 </div>  

                    <div class="form-group">
                <label>Mata Kuliah</label>
                <textarea name="matakuliah" class="form-control" style="resize: none;" required=""></textarea>
                    </div>

                     <div class="col-md-12">
                    <?php echo form_error('matakuliah', '<span class="text-danger">', '</span>') ?>
                 </div>  

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                        <option value="Dipakai">Dipakai</option>
                        <option value="Kembali">Kembali</option> 
                        </select>
                    </div>

                    <div class="col-md-12">
                    <?php echo form_error('status', '<span class="text-danger">', '</span>') ?>
                 </div>  

                <div class="form-group">
                <input class="btn btn-default" type="button" value="Batal" data-dismiss="modal">
                <input class="btn btn-primary" type="submit" name="" value="Simpan">
                     </div>


                </form>

                </div>
            </div>
        </div>
    </div>  
       

</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
    $('#datatable').dataTable();
});

</script>