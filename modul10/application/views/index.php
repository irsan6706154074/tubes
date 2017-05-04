<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modul 10</title>
	<link type="text/css" href="<?php echo base_url('files/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url('files/bootstrap/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url('files/css/theme.css') ?>" rel="stylesheet">
	<link type="text/css" href="<?php echo base_url('files/images/icons/css/font-awesome.css') ?>" rel="stylesheet">
</head>
<body>

	<div class="navbar navbar-fixed-top" >
		<div class="navbar-inner">
			<div class="container">

			  	<a class="brand" style="float:right;" href="<?php echo base_url('index.php/mahasiswa') ?>">Logout </a>
				<a class="brand" style="float:right;" href="<?php echo base_url('index.php/mahasiswa') ?>">Namanya Gan </a>
				
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
								<a href="<?php echo base_url('index.php/mahasiswa') ?>">
									Input Data Obat
								</a>
							</li>
							<li>
								<a href="<?php echo base_url('index.php/mahasiswa/activity') ?>">
									Transaksi
								</a>
							</li>
							<li>
								<a href="<?php echo base_url('index.php/mahasiswa/viewRekap') ?>">
									Rekap Data
								</a>
							</li>
							<li>
								<a href="<?php echo base_url('index.php/mahasiswa/view_mhs') ?>">
									Validasi Pemesanan
								</a>
							</li>
							<li>
								<a href="<?php echo base_url('index.php/mahasiswa/view_mhs') ?>">
									Lihat Data Obat
								</a>
							</li>
						</ul><!--/.widget-nav-->
					</div><!--/.sidebar-->
				</div><!--/.span3-->


				<div class="span9">
					<div class="content">
						<div class="module">
							<div class="module-body">
								<div class="stream-composer media">
									<div class="media-body">
										<form method="post"> 
											<h5>Nama Obat :</h5>
											<div class="row-fluid">
												<input type="text" name="nObat" class="span12" style="height: 30px; resize: none;">
											</div>
											<h5>Kode Obat :</h5>
											<div class="row-fluid">
												<input type="number" name="kObat" class="span12" style="height: 30px; resize: none;">
											</div>
											<h5>Jenis Obat :</h5>
											<div class="row-fluid">
												<input type="text" name="jObat" class="span12" style="height: 30px; resize: none;">
											</div>
											<h5>Stock Obat :</h5>
											<div class="row-fluid">
												<input type="number" name="stock" class="span12" style="height: 30px; resize: none;">
											</div>
											<h5>Harga Obat :</h5>
											<div class="row-fluid">
												<input type="number" name="harga" class="span12" style="height: 30px; resize: none;">
											</div>
											<h5>Gambar :</h5>
											<div class="row-fluid">
												<input type="file" name="img" class="span12" style="height: 30px; resize: none;">
											</div>
											<br></br>
											<div class="clearfix">
												<button type="submit" name="submit" class="btn btn-primary pull-right">Tambah</button>
											</div>
										</form>
									</div>
								</div>
								<?php
									if (isset($_POST['submit'])){
										include('koneksi.php');
										echo $_FILES['img']['name'];
										if(!empty($_FILES['img']['name'])){
											$nama = $_POST['nObat'];
											$jenis = $_POST['jObat'];
											$kode = $_POST['kObat'];
											$stock = $_POST['stock'];
											$harga = $_POST['harga'];
											
											$img =rand(1000,100000)."-".$_FILES['img']['name'];
											$img_loc = $_FILES['img']['tmp_name'];
											$folder='./upload/';
											$query="insert into dataobat values ('$kode','$nama','$jenis','$img','$harga','$stock','')";
											$result=mysqli_query($kon,$query);
											if($result)
											{
												if(move_uploaded_file($img_loc,$folder.$img)){
													echo "<script>alert('Upload Sukses Silahkan Lakukan Pembayaran DP, Kode Resi dapat dilihat di list pemesanan !!!');</script>";
													
													$insert="select * from dataobat where resobat='$img'";
													$exec=mysqli_query($kon,$insert);
													while($baris=mysqli_fetch_array($exec))
												{
													$id=$baris['noResi'];
												}
												$insert2="insert into validasiresep values('','$id',null,'belum upload',50000,'Belum di Bayar','resep')";
												$hasil=mysqli_query($kon,$insert2);
												}
												
												else{
													echo "<script>alert('Upload Gagal');</script>";
												} 
											}
											else{
												echo "<script>alert('Terjadi Kesalahan');</script>";
											}
										}
										else{
											echo "<script>alert('Masukan Gambar terlebih dahulu');</script>";
										}
									}
								?>
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