<?php session_start()?> 
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="index.php"><img src="images/logo.png" style="height: 70px"></a>
	
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">

<?php
$quyen="";
if (isset($_SESSION['member'])) 
{
    require 'DataProvider.php';
    $sql = "SELECT Quyen FROM user WHERE UserName = '".$_SESSION['member']."' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)==0)
    {
        exit();
    }
    else
	{
		$row = mysqli_fetch_array($result);
		$quyen=$row['Quyen'];
		switch($quyen)
		{
			case "master":
			{
				echo'<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown">
					<a style="color: black;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Chào '.$_SESSION['member'].'
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="logout.php">Đăng xuất</a>
					</div>
				</li>
				<li class="nav-item dropdown" >
					<a style="color: black" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Quản lý
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="index.php?action=quanlyaccount">Quản lý ACCOUNT</a>
						<a class="dropdown-item" href="index.php?action=quanlyhd">Quản lý HD</a>
						<a class="dropdown-item" href="index.php?action=quanlysp">Quản lý SP</a>
					</div>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0" action="index.php" method="get">
				<input class="form-control mr-sm-2" type="search" placeholder="Nhập điện thoại bạn cần" aria-label="Search" name="search" id="timkiem">
				<input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="Tìm kiếm" onClick="return ktraTK();">
			</form>';
			}
			break;
			case "admin":
			{
				echo '
				<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown">
					<a style="color: black;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Chào '.$_SESSION['member'].'
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="logout.php">Đăng xuất</a>
					</div>
				</li>
				<li class="nav-item dropdown" >
					<a style="color: black" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Quản lý
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="index.php?action=quanlyaccount">Quản lý ACCOUNT</a>
					</div>
				</li>
			</ul>
				';
			}
			break;
			case "manager":
			{
				echo '
				<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown">
					<a style="color: black;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Chào '.$_SESSION['member'].'
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="logout.php">Đăng xuất</a>
					</div>
				</li>
				<li class="nav-item dropdown" >
					<a style="color: black" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Quản lý
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="index.php?action=quanlyhd">Quản lý HD</a>
						<a class="dropdown-item" href="index.php?action=quanlysp">Quản lý SP</a>
					</div>
				</li>
			</ul>
				';
			}
			break;
			case "customer":
			{
				echo'
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Trang chủ <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item dropdown" >
					<a style="color: black" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Sản phẩm
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="index.php?theloai=1&page=1">SAMSUNG</a>
						<a class="dropdown-item" href="index.php?theloai=2&page=1">NOKIA</a>
						<a class="dropdown-item" href="index.php?theloai=3&page=1">IPHONE</a>
						<a class="dropdown-item" href="index.php?theloai=4&page=1">SONY</a>
						<a class="dropdown-item" href="index.php?theloai=5&page=1">OPPO</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a style="color: black;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Chào '.$_SESSION['member'].'
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="logout.php">Đăng xuất</a>
					</div>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="index.php?action=giohang">Giỏ hàng</a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0" action="index.php" method="get">
				<input class="form-control mr-sm-2" type="search" placeholder="Nhập điện thoại bạn cần" aria-label="Search" name="search" id="timkiem">
				<input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="Tìm kiếm" onClick="return ktraTK();">
			</form>';
			}
			break;
		}
	}
}
else 
{
	if(isset($_GET['action']) && $_GET['action']=="quanlyhd")
	{
		echo "";
	}
	else
	echo'
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Trang chủ <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item dropdown" >
					<a style="color: black" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Sản phẩm
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="index.php?theloai=1&page=1">SAMSUNG</a>
						<a class="dropdown-item" href="index.php?theloai=2&page=1">NOKIA</a>
						<a class="dropdown-item" href="index.php?theloai=3&page=1">IPHONE</a>
						<a class="dropdown-item" href="index.php?theloai=4&page=1">SONY</a>
						<a class="dropdown-item" href="index.php?theloai=5&page=1">OPPO</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a style="color: black;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Tài khoản
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="dang-nhap.php">Đăng nhập</a>
						<a class="dropdown-item" href="kt.php">Đăng kí</a>
					</div>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="index.php?action=giohang">Giỏ hàng</a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0" action="index.php" method="get">
				<input class="form-control mr-sm-2" type="search" placeholder="Nhập điện thoại bạn cần" aria-label="Search" name="search" id="timkiem">
				<input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="Tìm kiếm" onClick="return ktraTK();">
			</form>';
}
?>
</div>
</nav>