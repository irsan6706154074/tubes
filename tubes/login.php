<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title> 
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/coba.css" rel="stylesheet">
  </head>
  <body>
  <div>
  	 <div align="right">
	<img src="gambar/medex.png" width="150" height="150" border="5" style="margin:20px;" />
  </div>
  <div align="center">
   <h2>Selamat Datang</h2>
  </div>
  </div>
    <div class="col-md-4 col-md-offset-4 form-login">
    
    <?php
    if (isset($_GET['error'])) : ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Warning!</strong> <?=base64_decode($_GET['error']);?>
        </div>
    <?php endif;?>
 
        <div class="outter-form-login">
        <div class="logo-login">
            <em class="glyphicon glyphicon-user"></em>
        </div>
            <form action="" class="inner-login" method="post">
            <h3 class="text-center title-login">FORM LOGIN</h3>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
 
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                
                <input type="submit" class="btn btn-block btn-custom-green" name="submit" value="LOGIN" />
            </form>
			<?php
			include("koneksi.php");
			session_start();
			if(isset($_POST['submit']))
			{
				$user=$_POST['username'];
				$pass=$_POST['password'];
			if (!empty($user and $pass)) {
			
			$query="select * from user where username = '$user' and password='$pass' ";
			$result=mysqli_query($kon,$query);
			if($result->num_rows == 1)
			{
				while($baris=mysqli_fetch_array($result))
				{
						$_SESSION['status'] = $baris['status'];
						$_SESSION['nama']    = $baris['username'];
						header("location:$baris[status]");
				}
				
			}
			else
				{
					echo"<script type ='text/javascript'>alert('Data Tidak Tersedia');</script>";
				}
			
			}else{
				echo"<script type ='text/javascript'>alert('Isi data Terlebih Dahulu');</script>";
			}
			}
			
			?>
			<div class="text-center forget">
                  <h4> <a href="">Lupa Password?</a><br><br>
				   <a href="daftar.php">Daftar</a></h4>
                </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
