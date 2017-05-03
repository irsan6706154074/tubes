									<html>
									<head><title></title></head>
									<body>
									<h3><p align="center">Pesanan Obat</p></h3>
									<table border=1>
									<th><p align="center" style="margin:8px">No.Resi</p></th>
							<th><p align="center" style="margin:8px">Status Pembayaran</p></th>
							<th><p align="center" style="margin:8px">Tanggal Pemesanan</p></th>
							<th><p align="center" style="margin:8px">Gambar</th>
									<?php
									session_start();
									include("./../koneksi.php");
									$user=$_SESSION['nama'];
									$resi=$_POST['isi'];
									$query = mysqli_query($kon,"SELECT a.noResi,a.status,b.tgl_pesan,b.resGambar,b.username from validasiresep a,resepdokter b where b.username='$user' and a.noResi='$resi' and a.jenisPem='resep' order by b.tgl_pesan DESC");
								if($query->num_rows >= 1)
			{
							while($data = mysqli_fetch_array($query)){
									
							?>
							
							<tr>
								<td><p align="center" name="coba" style="margin:8px"><?php echo $data['noResi'];?></p></td>
								<td><p align="center" style="margin:8px"><?php echo $data['status'];?></p></td>
								<td><p align="center" style="margin:8px"><?php echo $data['tgl_pesan']?></p></td>
								<td><img src="./../resep/<?php echo $data['resGambar'];?>" height="220" width="220" style="margin:5px;"/></td>
								</tr>
								
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