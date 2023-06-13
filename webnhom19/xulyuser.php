<?php
session_start();

$loai = $_GET['loai'];
if(isset($loai))
{
	switch($loai)
	{
		case 0: // insert
			if(insert())
				header('Location:index.php?action=quanlyaccount');
			else
				//echo $sQuery;
				header('Location:themuser.php?loi=1');
			break;
			
		case 1: // UPDATE
			if(update())
				header('Location:index.php?action=quanlyaccount');
				// echo $query;
			else
				header('Location:suauser.php?loi=1');
			break;
			
		case 2: // DELETE
			if(delete())
				header('Location:index.php?action=quanlyaccount');
			else
				header('Location:index.php');
			break;
		// delete();
		// break;
					
		default: // do nothing
			header('Location:index.php?action=quanlyaccount');			
			break;
	}
}

// trả về true || false
function insert()
{
	
	// giả sử dữ liệu đúng
	
	require('DataProvider.php');

	$sql  = "SELECT COUNT(*) AS numrows FROM user";
	$result = mysqli_query($conn, $sql);
	$row     = mysqli_fetch_array($result,MYSQLI_ASSOC);
				// lấy số thứ tự
	$numrows = $row['numrows'];

	$username = $_REQUEST['txtUser'];
	$password = $_REQUEST['txtPass'];
	$Diachi = $_REQUEST['txtDiachi'];
	$Email = $_REQUEST['txtEmail'];
	
	$sQuery ="INSERT INTO `user` (`MaKhachHang`, `UserName`, `Password`, `DiaChi`, `Email`,`Quyen`,`TrangThai`) 
	VALUES(".	"'KH" . ($numrows +1) . "'," .
        		"'" . $username . "'," . 
	        	"'" . $password . "'," .  
	        	"'" . $Diachi . "'," . 
	        	"'" . $Email . "'," .
	 		   	"'" . 'customer'. "',".
	 		   	"'" .'1'. "')";
	//echo($sQuery);
	
	$result = mysqli_query($conn, $sQuery);
			
	mysqli_close($conn);
		
	// lỗi	
	return $result;
}


//trả về true || false
function delete()
{
	//Lấy makhachhang từ trong function ktxoa()
	$us = $_REQUEST['username'];	
	//echo $ma;
	
	// giả sử dữ liệu đúng
	
	require('DataProvider.php');
	
	$sQuery = "DELETE FROM user WHERE UserName= '$us'";
	//echo($sQuery);
	
	$result = mysqli_query($conn, $sQuery);
			
	mysqli_close($conn);
		
	// lỗi	
	return $result;
}

function update()
{
	$username = $_REQUEST['txtUser'];
	// $password = $_REQUEST['txtPass'];
	$Diachi = $_REQUEST['txtDiachi'];
	$Email = $_REQUEST['txtEmail'];
	
	// giả sử dữ liệu đúng
	
	require('DataProvider.php');

	// $query = "UPDATE `user` SET `Password` = '$password', `DiaChi` = '$Diachi', `Email` = '$Email' 
	// 			WHERE UserName = '$username'";
	
	$query = sprintf("UPDATE user SET DiaChi='%s', Email = '%s'
		where UserName='%s'", $Diachi, $Email, $username);

	//$sQuery = sprintf("UPDATE users SET password='%s', avatar='%s' where username='%s'", mysqli_real_escape_string($password), mysqli_real_escape_string($avat), mysqli_real_escape_string($username));
	//echo($sQuery);
	
	$result = mysqli_query($conn, $query);
			
	mysqli_close($conn);
		
	// lỗi	
	return $result;
}


?>