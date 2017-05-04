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
		<div class="navbar navbar-fixed-top">
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
								<li>
									<a href="<?php echo base_url('index.php/mahasiswa') ?>">
										Input Data Obat
									</a>
								</li>
								<li class="active">
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
									<?php echo form_open("mahasiswa/proses_input"); ?> 
										<h5>Nomor Resi :</h5>
										<div class="row-fluid">
											<input type="number" name="noR" class="span12" style="height: 30px; resize: none;">
										</div>
										<h5>Tanggal Transaksi</h5>
										<div class="row-fluid">
											<input type="date" name="tgl" class="span12" style="height: 30px; resize: none;"></input>
										</div>
										<h5>Jenis Pemesanan</h5>
										<div class="row-fluid">
											<textarea type="text" name="jenis" class="span12" style="height: 30px; resize: none;"></textarea>
										</div>
										<h5>Total Harga</h5>
										<div class="row-fluid">
											<input type="number" name="total" class="span12" style="height: 30px; resize: none;">
										</div>
										<br></br>
										<div class="clearfix">
											<input type="submit" name="submit" value="Tambah" class="btn btn-primary pull-right">
										</div>
									</form>
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
