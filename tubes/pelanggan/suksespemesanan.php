<?php
include("./../koneksi.php");
 	session_start();
	if(isset($_POST['submit']))
 {
	 $isi=$_POST['isi'];
	 $dp=$isi/2;
$tanggal=date("y/m/d");
$user=$_SESSION['nama'];
$query="insert into tanparesep values('','$tanggal','$user')";
$result=mysqli_query($kon,$query);
$dataresi="select no_resi from tanparesep where no_resi = (select max(no_resi) from tanparesep) ";
$hasil=mysqli_query($kon,$dataresi);
while($resi=mysqli_fetch_array($hasil))
{
	$no=$resi['no_resi'];
}
$insert2="insert into validasiresep values('',null,'$no','belum upload','$dp','Belum di Bayar','tanpa resep')";
$hasil=mysqli_query($kon,$insert2);
$update="update listpemesanan set no_resi='$no'";
$hasilupdate=mysqli_query($kon,$update);
$query1="select * from listpemesanan";
$result1=mysqli_query($kon,$query1);
while($data = mysqli_fetch_array($result1)){

$id =$data['id_list'];
$jum=$data['jumlah'];
$total=$data['total'];
$resi=$data['no_resi'];
$kode=$data['kode_obat'];
$query2="insert into datalist values ('$id','$jum','$total','$resi','$kode')";
$result2=mysqli_query($kon,$query2);

}
$akhir="delete from listpemesanan";
$berakhir=mysqli_query($kon,$akhir);
if($berakhir)
{
	echo"<script type ='text/javascript'>alert('Pemesanan Berhasil dilakukan Silahkan Lakukan pembayaran DP ');</script>";
	echo "<a href='tanparesep.php'>Lanjutkan</a>";
}
 }
 ?>