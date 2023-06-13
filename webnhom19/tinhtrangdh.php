<?php 
	require('DataProvider.php');
	$query=mysqli_query($conn, "UPDATE donhang SET TinhTrangDonHang = '".$_POST['tinhtrang']."'WHERE 
		MaHoaDon ='".$_POST['mahd']."'");
	if($_POST['tinhtrang'] == "bihuy")
	{
		$sql="SELECT * FROM chitiethoadon where MaHoaDon='".$_POST['mahd']."'" ;
		$result=mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_array($result))
		{
			$sql1=mysqli_query($conn,"SELECT * from sanpham where MaSP='".$row['MaSp']."'");
            $row1= mysqli_fetch_array($sql1);
			$slton=$row1['SLTon']; 
			$slton+=$row['SoLuong'];
			$sql2="UPDATE sanpham SET SLTon = '".$slton."' WHERE MaSP='".$row['MaSp']."'";
			mysqli_query($conn,$sql2);	
		}
	}
?>