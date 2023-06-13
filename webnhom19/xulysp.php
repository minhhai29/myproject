<?php 
  session_start();
    if(!isset($_SESSION["member"])){
      header("Location:dang-nhap.php");
	}
	else{
?>
<?php
$loai = $_GET['loai'];
if(isset($loai))
{
	switch($loai)
	{
		case 0: // insert
			if(insert())
				header('Location:index.php?action=quanlysp');
			else
				header('Location:themsp.php?loi=1');
			break;
			//insert();
			
		case 1: // UPDATE
			if(update())
				header('Location:index.php?action=quanlysp');
			else
				header('Location:suasp.php?loi=1');
			break;
		
			
		case 2: // DELETE
			if(delete())
				header('Location:index.php?action=quanlysp');
			else
				header('Location:index.php?action=quanlysp');
			break;
		//delete();
		
					
		// default: // do nothing
		// 	header('Location:quanlyaccount.php');			
		// 	break;
	}
}

function update()
{
	$sluong = $_REQUEST['txtSlt'];
	$dongia = $_REQUEST['txtDg'];
	$masp = $_REQUEST['txtMasp'];
	$maloai = $_REQUEST['txtMalsp'];
	// giả sử dữ liệu đúng
	require('DataProvider.php');

	$query = sprintf("UPDATE sanpham SET SLTon='%s', DonGia='%s'
		where MaSP='%s'", $sluong, $dongia, $masp);
	 $query1 = "UPDATE sanpham SET SLTon = '".$sluong."', DiaChi = '".$dongia."', Image='images/".$maloai."/".$hinh."' WHERE MaSP = '".$masp."'";
	echo $query;

	$sQuery = sprintf("UPDATE users SET password='%s', avatar='%s' where username='%s'", mysqli_real_escape_string($password), mysqli_real_escape_string($avat), mysqli_real_escape_string($username));
	echo($sQuery);
	
	$result = mysqli_query($conn, $query);
			
	mysqli_close($conn);
		
	// lỗi	
	return $result;
}

function insert()
{
	// giả sử dữ liệu đúng	
	require('DataProvider.php');

	$sql  = "SELECT COUNT(*) AS numrows FROM sanpham";
	$result = mysqli_query($conn, $sql);
	$row     = mysqli_fetch_array($result,MYSQLI_ASSOC);
				// lấy số thứ tự
	$numrows = $row['numrows'];

	$ten = $_REQUEST['txtTen'];
	$SLTon = $_REQUEST['txtSl'];
	$DonGia = $_REQUEST['txtDongia'];
	$hinh = $_REQUEST['txtHinh'];
	$maloai = $_REQUEST['maloai'];

	if($maloai=="ip")
		$tenloaisp="iphone";
	else
		if($maloai=="ss")
			$tenloaisp="samsung";
		else
			if($maloai == "op")
				$tenloaisp = "oppo";
			else
				if($maloai == "so")
					$tenloaisp="sony";
				else
					if($maloai == "no")
	 					$tenloaisp = "nokia";
	
	$sQuery ="INSERT INTO `sanpham` (`MaLoaiSP`, `MaSP`, `TenSP`, `SLTon`, `DonGia`,`Image`) 
	VALUES('". $maloai . "'," .
        		"'" .$maloai."".($numrows + 1)."'," . 
	        	"'" . $ten . "'," .  
	        	"'" . $SLTon . "'," . 
	        	"'" . $DonGia . "','images/".$tenloaisp."/".$hinh."')";
	echo($sQuery);
	
	$result = mysqli_query($conn, $sQuery);
			
	mysqli_close($conn);		
	// lỗi	
	return $result;
}

//trả về true || false
function delete()
{
	//Lấy makhachhang từ trong function ktxoa()
	$masp = $_REQUEST['masp'];	
	//echo $ma;
	
	// giả sử dữ liệu đúng	
	require('DataProvider.php');
	
	$sQuery = "DELETE FROM sanpham WHERE MaSP= '$masp'";
	echo($sQuery);
	
	$result = mysqli_query($conn, $sQuery);
			
	mysqli_close($conn);
		
	// lỗi	
	return $result;

}
?>
<?php } ?>