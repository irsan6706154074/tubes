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
								<a href="index.php">
									<i class="menu-icon icon-folder-close"></i>
									Pemesanan Obat
								</a>
							</li>
							<li>
								<a href="">
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
								<h3>Daftar Pemesanan</h3>
							</div>
							<div class="module-body">
								<div class="stream-composer media">
									<div class="media-body">
							<div class="scroll">
							<h4><p align="center">Pemesanan Dengan Resep</p></h4>
							<table border=1>
							<tr>
							<th><p align="center" style="margin:8px">No.Resi</p></th>
							<th><p align="center" style="margin:8px">Status Pembayaran</p></th>
							<th><p align="center" style="margin:8px">Tanggal Pemesanan</p></th>
							<th><p align="center" style="margin:8px">DP</p></th>
							<th><p align="center" style="margin:8px">Gambar</th>
							<th><p align="center" style="margin:8px">Aksi</th>
							</tr>
							
								<?php
									include("./../koneksi.php");
									$user=$_SESSION['nama'];
									$query = mysqli_query($kon,"SELECT a.noResi,a.status,a.dpres,b.tgl_pesan,b.resGambar,b.username from validasiresep a,resepdokter b where b.username='$user' and a.noResi=b.noResi and a.jenisPem='resep' order by b.tgl_pesan DESC");
								if($query->num_rows >= 1)
			{
							while($data = mysqli_fetch_array($query)){
									
							?>
							
							<tr>
								<td><p align="center" name="coba" style="margin:8px"><?php echo $data['noResi'];?></p></td>
								<td><p align="center" style="margin:8px"><?php echo $data['status'];?></p></td>
								<td><p align="center" style="margin:8px"><?php echo $data['tgl_pesan']?></p></td>
								<td><p align="center" style="margin:8px"><?php echo $data['dpres']?></p></td>
								<td><img src="./../resep/<?php echo $data['resGambar'];?>" height="120" width="120" style="margin:5px;"/></td>
								<form method="post">
								<td>
								<input type="submit" name="submit" value="batalkan" style="margin:10px">
								<input type="hidden" name="id" value="<?php echo $data['noResi']; ?>" />,
								
								
								</form>
								<form method ="post" action="print.php">
								<input type="submit" name="print" value="print" style="margin:10px">
								<input type="hidden" name="isi" value="<?php echo $data['noResi']; ?>" />
								</form>
								</tr>
								<?php
									}
			}
										?>
										
										</table>
										<?php 
										if(isset($_POST['submit']))
										{
											$resi=$_POST['id'];
											$exec="delete from validasiresep where noResi='$resi'";
											$exec2="delete from resepdokter where noResi='$resi'";
											$query3=mysqli_query($kon,$exec);
											$query4=mysqli_query($kon,$exec2);
											if($query3 and $query4)
											{
													echo"<script type ='text/javascript'>alert('Pemesanan Dibatalkan silahkan refresh');</script>";
													
												
												
												
											}
											
										}
										
										?>
										<h4><p align="center">Pemesanan Tanpa Resep</p></h4>
							<table border=1>
							<tr>
							<th><p align="center" style="margin:8px">No.Resi</p></th>
							<th><p align="center" style="margin:8px">Status Pembayaran</p></th>
							<th><p align="center" style="margin:8px">Tanggal Pemesanan</p></th>
							<th><p align="center" style="margin:8px">DP</p></th>
							<th><p align="center" style="margin:8px">Obat Yang Dipesan</p></th>
							<th><p align="center" style="margin:8px">Aksi</th>
							</tr>
							
								<?php
									include("./../koneksi.php");
									$user=$_SESSION['nama'];
									$result=mysqli_query($kon,"select b.no_resi,a.status,b.tgl_pemesanan,a.dpres
									from validasiresep a,tanparesep b
									where b.username='$user' and b.no_resi = a.no_resi and a.jenisPem = 'tanpa resep'");
								if($result->num_rows >= 1)
			{
							while($baris = mysqli_fetch_array($result)){
									
							?>
							
							<tr>
								<td><p align="center" name="coba" style="margin:8px"><?php echo $baris['no_resi'];?></p></td>
								<td><p align="center" style="margin:8px"><?php echo $baris['status'];?></p></td>
								<td><p align="center" style="margin:8px"><?php echo $baris['tgl_pemesanan']?></p></td>
								<td><p align="center" style="margin:8px"><?php echo $baris['dpres']?></p></td>
								<td><p align="center" style="margin:8px">
								<?php 
								$isina = $baris['no_resi'];
								$lanjut = "select a.nama_obat from dataobat a,datalist b where b.no_resi='$isina' and b.kode_obat = a.kode_obat";
								$hasil = mysqli_query($kon,$lanjut);
								while($row = mysqli_fetch_array($hasil)){
							
								echo $row['nama_obat'].",";
								
								}
								
								?>
								</p></td>
								
								<form method="post">
								<td>
								<input type="submit" name="batal" value="batalkan" style="margin:10px">
								<input type="hidden" name="kode" value="<?php echo $baris['no_resi']; ?>" />,
								
								
								</form>
								<form method ="post" action="printdata.php">
								<input type="submit" name="print" value="print" style="margin:10px">
								<input type="hidden" name="kode" value="<?php echo $baris['no_resi']; ?>" />
								</form>
								</tr>
								<?php
									}
			}
										?>
										
										</table>
										<?php 
										if(isset($_POST['batal']))
										{
											$resi=$_POST['kode'];
											$exec="delete from datalist where no_resi='$resi'";
											$exec2="delete from tanparesep where no_resi='$resi'";
											$query3=mysqli_query($kon,$exec);
											$query4=mysqli_query($kon,$exec2);
											if($query3 and $query4)
											{
													echo"<script type ='text/javascript'>alert('Pemesanan Dibatalkan silahkan refresh');</script>";
													
												
												
												
											}
											
										}
										
										?>
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