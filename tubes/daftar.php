 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar</title> 
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/coba.css" rel="stylesheet">
  </head>
  <body>
  <div>
  	 <div align="right">
	<img src="gambar/medex.png" width="100" height="100" border="5" style="margin:20px;"/>
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
            <h3 class="text-center title-login">FORM PENDAFTARAN</h3>
                <div class="form-group">
                    Username : <input type="text" class="form-control" name="username">
                </div>
				<div class="form-group">
                    Password : <input type="password" class="form-control" name="pass">
                </div>
				<div class="form-group">
                    Nama : <input type="text" class="form-control" name="nama">
                </div>
				<div class="form-group">
                    Alamat : <input type="text" class="form-control" name="alamat">
                </div>
				<div class="form-group">
                    no_telp : <input type="text" class="form-control" name="telp">
                </div>
                <input type="submit" class="btn btn-block btn-custom-green" name="submit" value="Submit" />
            </form>
			<?php
			include("koneksi.php");
			session_start();
			if(isset($_POST['submit']))
			{
				$user=$_POST['username'];
				$pass=$_POST['pass'];
				$nama=$_POST['nama'];
				$alamat=$_POST['alamat'];
				$telp=$_POST['telp'];
			if (!empty($user and $pass and $nama and $alamat and $telp)) {
			
			$query="insert into user values('$user','$pass','$nama','$alamat','$telp','pelanggan')";
			$result=mysqli_query($kon,$query);
			if($result)
			{
				echo"<script type ='text/javascript'>alert('Data Masuk');</script>";
				echo"<div class='text-center forget'>";
                 echo"<h4> <a href='login.php'>Login</a><br><br>";
                echo"</div>";
			}
			else
				{
					echo"<script type ='text/javascript'>alert('Mengalami Kesalahan');</script>";
				}
			
			}else{
				echo"<script type ='text/javascript'>alert('Isi data Terlebih Dahulu');</script>";
			}
			}
			
			?>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  <footer> <div></div></footer>
  </body>
</html>