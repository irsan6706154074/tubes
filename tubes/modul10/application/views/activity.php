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
									Hapus Obat
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
									<h3>Upload File</h3>
								</div>
								<div class="module-body">
									<div class="stream-composer media">
										<div class="media-body">
											<form action="<?=base_url()?>index.php/mahasiswa/upload_file/" method='post' enctype='multipart/form-data'">
												<h5>Judul :</h5>
												<div class="row-fluid">
													<input name="judul" class="span12" style="height: 30px; resize: none;"></input>
												</div>
												
												<h5>Upload Gambar</h5>
													<input type="file" name="filefoto">
												<div class="clearfix">
													<input type="submit" name="submit" value="Upload File" class="btn btn-primary pull-right">
													<p>&nbsp;</p>
												</div>
											</form>
										</div>
									</div>
									<div class="stream-list">
										<?php if(empty($file)){ ?>
										<div class="media stream new-update">
											<a href="#">
											<i class="icon-refresh shaded"></i>
											Data Kosong 
										</a>
										</div>
										<?php }else{
										foreach($file as $value){ ?>
										<div class="media stream">
											<div class="media-body">
												<div class="stream-headline">
													<h5 class="stream-author">
														<small> <?php echo $value->judul ?></small>
													</h5>
													
													<div class="stream-attachment photo">
														<div class="responsive-photo">
															<img src="<?php echo base_url("upload/".$value->nama_file)?>"/>
														</div>
													</div>
												</div><!--/.stream-headline-->
											</div>
										</div><!--/.media .stream-->
										<?php }}?>
									<div class="media stream load-more">
									</div>
								</div><!--/.stream-list-->
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
