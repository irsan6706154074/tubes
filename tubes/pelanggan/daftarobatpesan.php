	<html>
<head><title></title></head>
<body>	

				

					<h4><p align="center">Pemesanan Tanpa Resep Dokter</p></h4>
					
					<table border=1>
					<tr>	
							<th><p align="center" style="margin:8px">No</p></th>
							<th><p align="center" style="margin:8px">Nama Obat</p></th>
							<th><p align="center" style="margin:8px">Gambar</p></th>
							<th><p align="center" style="margin:8px">Jumlah</p></th>
							<th><p align="center" style="margin:8px">Harga</p></th>
							<th><p align="center" style="margin:8px">Total</p></th>
					</tr>
					<?php
					include("./../koneksi.php");
					$no=1;
					$data="select a.resobat, a.nama_obat,a.harga,b.jumlah,b.total from listpemesanan b,dataobat a where b.kode_obat = a.kode_obat";
					$result =mysqli_query($kon,$data);
					if($result->num_rows >= 1){
						while($data = mysqli_fetch_array($result)){
									
							?>
						<tr>
								<td><p align="center"  style="margin:8px"><?php echo $no;?></p></td>
								<td><p align="center"  style="margin:8px"><?php echo $data['nama_obat'];?></p></td>
								<td><img src="./../obat/<?php echo $data['resobat'];?>"height="100" width="100" style="margin:5px;"/></td>
								<td><p align="center" style="margin:8px"><?php echo $data['jumlah'];?></p></td>
								<td><p align="center" style="margin:8px"><?php echo $data['harga']?></p></td>
								
								<td><p align="center" style="margin:8px"><?php echo $data['total'] ?></p></td>
						</tr>
						<?php
						$no++;
					}?>
					<?php 
					$query="select sum(total) as jumlah from listpemesanan";
					$hasil=mysqli_query($kon,$query);
					$isi=mysqli_fetch_array($hasil);
					?>
					<tr></tr>
					<tr></tr>
					<tr>
					<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td><p align="center" style="margin:8px"><?php echo $isi['jumlah'] ?></p></td>
					</tr>
					</table>
						<br>	<br>
								<form method ="post" action="suksespemesanan.php">
								<input  type="submit" name="submit" value="Pesan" style="margin-left:430px">
								<input type="hidden" name="isi" value="<?php echo $isi['jumlah']; ?>" />
								</form>
			
					<?php
					}else
					{
						echo"Belum Melakukan Pemesanan";
					}
					?>	
					
						
								
</body>				
</html>