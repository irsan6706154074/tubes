<?php
include("./../koneksi.php");
 	if(isset($_POST['coba']))
 {
 $jumlah=$_POST['jumlah'];
 $kode=$_POST['data'];
 $total="select harga from dataobat where kode_obat=$kode";
 $result=mysqli_query($kon,$total);
 while($baris=mysqli_fetch_array($result))
{
	$no=$baris['harga'];
}
$harga=$jumlah*$no;
 $query2="insert into listpemesanan values('','$jumlah','$harga','','$kode')";
 $result2=mysqli_query($kon,$query2);
 if($result2)
 {
	 echo"<script type ='text/javascript'>alert('Pesanan Sudah Masuk');</script>";
	 echo "<a href='tanparesep.php'>Lanjutkan</a>";
	 	
 }else
 {
	 echo"<script type ='text/javascript'>alert('Obat gagal Masuk');</script>";
 }
 }
 ?>
