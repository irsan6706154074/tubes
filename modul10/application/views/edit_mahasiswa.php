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
								<div class="module-head">
									<h3>Edit Data Mahasiswa</h3>
								</div>
								<div class="module-body">
									<div class="stream-composer media">
										<div class="media-body">
											<?php echo form_open("mahasiswa/action_edit_mhs/".$nama_obat); ?> 
												<h5>Nama Obat:</h5>
												<div class="row-fluid">
													<input type="text" name="namaObat" value="<?php echo $nama_obat; ?>" class="span12" style="height: 30px; resize: none;" disabled></input>
												</div>
												<h5>Jenis Obat :</h5>
												<div class="row-fluid">
													<input type="text" name="jenis" class="span12" style="height: 30px; resize: none;"></input>
												</div>
												<h5>Harga :</h5>
												<div class="row-fluid">
													<input type="text" name="harga" class="span12" style="height: 30px; resize: none;"></input>
												</div>
												<h5>Stock :</h5>
												<div class="row-fluid">
													<input type="text" name="stock" class="span12" style="height: 30px; resize: none;"></input>
												</div>
												<br></br>
												<div class="clearfix">
													<input type="submit" name="submit" value="Simpan Data" class="btn btn-primary pull-right">
													<p>&nbsp;</p>
												</div>
												<input type="hidden" name="MM_insert" value="form1">
											</form>
											<p>&nbsp;</p>										
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