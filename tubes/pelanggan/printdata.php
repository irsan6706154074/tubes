 <html>
									<head><title></title></head>
									<body>
									<h3><p align="center">Pesanan Obat</p></h3>
									<table border=1>
							<th><p align="center" style="margin:8px">No.Resi</p></th>
							<th><p align="center" style="margin:8px">Status Pembayaran</p></th>
							<th><p align="center" style="margin:8px">Tanggal Pemesanan</p></th>
							<th><p align="center" style="margin:8px">Obat Yang Dipesan</p></th>
							<th><p align="center" style="margin:8px">DP</p></th>
									<?php
									session_start();
									include("./../koneksi.php");
									$user=$_SESSION['nama'];
									$resi=$_POST['kode'];
									$result=mysqli_query($kon,"select b.no_resi,a.status,b.tgl_pemesanan,a.dpres
									from validasiresep a,tanparesep b
									where b.username='$user' and b.no_resi = '$resi' and a.no_resi='$resi'");
							if($result->num_rows >= 1)
			{
							while($baris = mysqli_fetch_array($result)){
									
							?>
							
							<tr>
								<td><p align="center" name="coba" style="margin:8px"><?php echo $baris['no_resi'];?></p></td>
								<td><p align="center" style="margin:8px"><?php echo $baris['status'];?></p></td>
								<td><p align="center" style="margin:8px"><?php echo $baris['tgl_pemesanan']?></p></td>
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
								<td><p align="center" style="margin:8px"><?php echo $baris['dpres']?></p></td>
								<?php
									}
			}
										?>
										
										</table>
										</body>
										</html>
										<script>
										window.print();
										</script>