 <?php
session_start();
//pemilik login
if ( !isset($_SESSION['nama']) || ($_SESSION['status'] != 'pemilik' ) ) {
 
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
								<a href="index.php">
									<i class="menu-icon icon-folder-close"></i>
									Lihat Rekap
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
							<div class="scroll">
								<div class="stream-composer media">
									<div class="media-body">
									<table border=1>
							<tr>
							<th><p align="center" style="margin:8px">Tanggal</th>
							<th><p align="center" style="margin:8px">Obat Masuk</p></th>
							<th><p align="center" style="margin:8px">Obat Keluar</p></th>
							</tr>
													<?php
													include("./../koneksi.php");
													$awal = $_POST['awal'];
													$akhir = $_POST['akhir'];
										
													$query="select * from rekapdata where tanggalrekap BETWEEN $awal AND $akhir";
													$result = mysqli_query($kon,$query);
													while($baris = mysqli_fetch_array($result))
													{
														?>
														<tr>
														<td> <?php echo$baris['tanggalrekap']?></td>
														<td> <?php echo$baris['obatmasuk']?></td>
														<td> <?php echo$baris['obatkeluar']?></td>
														</tr>
														
														<?php
													}
													
													
													$query2="select sum(totalharga) as total from transaksi where tgl_transaksi BETWEEN $awal AND $akhir";
													$result2=mysqli_query($kon,$query2);
													
													while($rows=mysqli_fetch_array($result2))
													{
														?>
														<tr>
														<td>Total Pendapatan</td>
														<td></td>
														<td> <?php echo$baris['total']?></td>
														</tr>
														<?php
													}
												
															
													?>
													
													
												
									</div>
								</div>
								</table>
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
