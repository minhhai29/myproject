<?php
require 'DataProvider.php';
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['diachi'])&& isset($_POST['dienthoai'])&& isset($_POST['email']))
{
	$username=mysqli_real_escape_string($conn,$_POST['username']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	$diachi=mysqli_real_escape_string($conn,$_POST['diachi']);
	$diachi=mysqli_real_escape_string($conn,$_POST['dienthoai']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=md5($password); // ma hoa password
    //echo $username;

        $sql="SELECT * FROM user WHERE UserName='".$username."'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0)
        {
        	echo "<script>alert('ten dang nhap da ton tai')</script>";
        	echo "<script>location.href='kt.php'</script>";
        }

        

        else
        {
        	$sql1   = "SELECT COUNT(*) AS numrows FROM user";
        	$result = mysqli_query($conn, $sql1);
        	$row     = mysqli_fetch_array($result,MYSQLI_ASSOC);
						// lấy số thứ tự
        	$numrows = $row['numrows'];

        	$sql = "INSERT INTO `user` (`MaKhachHang`, `UserName`, `Password`, `DiaChi`, `Email`,`SDT`,`Quyen`,`TrangThai`) VALUES(" .
        	"'KH" . ($numrows +1) . "'," .
        	"'" . $_POST['username'] . "'," . 
        	"'" . $_POST['password'] . "'," .  
        	"'" . $_POST['diachi'] . "'," . 
        	"'" . $_POST['email'] . "'," .
			"'" . $_POST['dienthoai'] . "'," .
 		   	"'" . 'customer'. "'," .
            "'" .'1'. "')";
        	echo $sql;
        	$result = mysqli_query($conn, $sql);
        	//$i++;
        	header("Location:dang-nhap.php");
        }
    }

    ?>