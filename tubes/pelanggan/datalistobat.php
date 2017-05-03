 <html>
 <head><title>Pesan Obat</title></head>
 <body>
 
 <p style="margin:10px;"><h3>Pemesanan Obat</h3></p>
 								<table border=2>
					<tr>
 <?php
 	include("./../koneksi.php");
	$resi=$_POST['isi'];
	$query="select * from dataobat where kode_obat = '$resi'";
	$result=mysqli_query($kon,$query);
	
	if($result)
	{
		while($data = mysqli_fetch_array($result)){
		?>
		<h5><td><p align="center"><?php echo $data['nama_obat']; ?><br>
		<img src="./../resep/<?php echo $data['resobat'];?>" height="160" width="160" style="margin:5px;"/><br>
				Harga : <?php echo $data['harga']; ?><br>
				
				</h5></p></td>
				</tr>
 </table>
				<form method="post" action="sukses.php">
				<br><br>
				<input type="text" name="jumlah" >
				<p style="margin:10px;"><input type="submit" name="coba" value="Pesan Obat"></p>
				 <input type="hidden" name="data" value="<?php echo $data['kode_obat']; ?>" />,
				 </form>
		<?php
		
		}
	}

 ?>

 </body>
 </html>