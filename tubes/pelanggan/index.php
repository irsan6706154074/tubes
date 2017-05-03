 <?php
session_start();
if ( !isset($_SESSION['nama']) || ($_SESSION['status'] != 'pelanggan' ) ) {
 
	header('location:./../login.php');
	exit();
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MED-EX</title>
<link type="text/css" href="files/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="files/bootstrap/css/bootstrap-responsive.min.css)" rel="stylesheet">
	<link type="text/css" href="files/css/latihan.css" rel="stylesheet">
	<link type="text/css" href="files/images/icons/css/font-awesome.css)" rel="stylesheet">

</head>
<body>
<u><h2 style="margin:10px;">Hallo <?=$_SESSION['nama'];?> Selamat Datang <img class="kanan" src="./../gambar/medex.png" style="margin:20px;"  /> </h2></u>

<a style="margin:10px;"  class="tombol" href="./../logout.php">Logout</a> 


	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<h4><center>Selamat Datang Di Website Apotek Med-Ex</center></h4>

			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="span3">
					<div class="sidebar">

						<ul class="widget widget-menu unstyled">
							<li class="active">
								<a href="">
									<i class="menu-icon icon-folder-close"></i>
									Pemesanan Obat
								</a>
							</li>
							<li>
								<a href="listpemesanan.php">
									<i class="menu-icon icon-circle-arrow-up"></i>
									Daftar Pemesanan Obat
								</a>
							</li>
							<li>
								<a href="uploadfile.php">
									<i class="menu-icon icon-circle-arrow-up"></i>
									Upload File
								</a>
							</li>
						</ul><!--/.widget-nav-->
					</div><!--/.sidebar-->
				</div><!--/.span3-->


				<div class="span9">
					<div class="content">
						<div class="module">
							<div class="module-head">
								<h3>Pemesanan Obat</h3>
							</div>
							<div class="module-body">
								<div class="stream-composer media">
									<div class="media-body">
										
													<div class="container">
													<div class="button-container">
													<a href="resep.php"><button type="submit"  class="button"><span>Pemesanan Dengan Resep Dokter</span></button></a>
													<a href="tanparesep.php"><button type="submit" class="button"><span>Pemesanan Tanpa Resep Dokter</span></button></a>
													</div> 
													</div>														
									</div>
								</div>
								
                            </div><!--/.module-body-->
						</div><!--/.module-->
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			
		</div>
	</div>
</body>
</html>
