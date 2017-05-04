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
									<h3>DataTables</h3>
								</div>
								<div class="module-body table">
									<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
										<thead>
											<tr>
												<th><center>No</center></th>
												<th><center>Nama Obat</center></th>
												<th><center>Jenis</center></th>
												<th><center>Harga</center></th>
												<th><center>Stock</center></th>
											</tr>
										</thead>
										<tbody>
												<?php 
													$no = $this->uri->segment('3') + 1;
													foreach($user as $u){ 
												?>
												<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $u->nama_obat ?></td>
													<td><?php echo $u->jenis_obat ?></td>
													<td><?php echo $u->harga ?></td>
													<td><?php echo $u->stok ?></td>
													<td>
														<center> 
															<a href="<?php echo base_url('index.php/mahasiswa/edit_mahasiswa/'.$u->nama_obat)?>">edit</a> | 
															<a href="<?php echo base_url('index.php/mahasiswa/delete_mahasiswa/'.$u->nama_obat)?> ">hapus</a>
														</center>
													</td>
												</tr>
												<?php } ?>
										</tbody>
										<tfoot>
												
										</tfoot>
									</table>
									<?php 
										echo $this->pagination->create_links();
									?>
								</div>
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