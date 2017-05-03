 <?php 
 
 $id = $_REQUEST['nilai'];
										
											$resi=$_POST['id'];
											$exec="delete from validasiresep where noResi='$resi'";
											$exec2="delete from resepdokter where noResi='$resi'";
											$query3=mysqli_query($kon,$exec);
											$query4=mysqli_query($kon,$exec2);
											if($query3 and $query4)
											{
												echo"<script type ='text/javascript'>alert('Pemesanan Dibatalkan');</script>";
												
											}
										
										
										?>