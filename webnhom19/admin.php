<!DOCTYPE html>
<html>
<head>
	<title>TTT Phone</title>
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" type="text/css" href="css/head.css">

  <link rel="stylesheet" type="text/css" href="css/main.css">

  <link rel="stylesheet" type="text/css" href="css/footer.css">

  <link rel="stylesheet" type="text/css" href="css/nut-chuyen-trang.css">

  <link rel="stylesheet" type="text/css" href="css/them-vao-gio-hang.css">

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

  <link rel="stylesheet" type="text/css" href="css/dang-nhap.css">
  

  <link rel="stylesheet" type="text/css" href="fontawesome-free-5.5.0-web/css/all.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
  <script type="text/javascript" src="js/index.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body style="font-family: Helvetica Neue, Arial, sans-serif">
<?php session_start(); ?>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#"><img src="images/logo.png" style="height: 70px"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
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
						<?php
						if(isset($_SESSION['member']))
							echo 'Chào '.$_SESSION['member'];
						else
							echo 'Tài khoản'
						?>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php
						if(isset($_SESSION['member']))
							echo '
							<a class="dropdown-item" href="logout.php">Đăng xuất</a>
						';
						else
							echo '
							<a class="dropdown-item" href="dang-nhap.php">Đăng nhập</a>
							<a class="dropdown-item" href="kt.php">Đăng kí</a>
						';
						?>
					</div>
				</li>

				<li class="nav-item active">
					<a class="nav-link" href="index.php?action=giohang">Giỏ hàng</a>
				</li>

        <!-- <li class="nav-item active">
          <a class="nav-link" href="#">Quản lý account</a>
        </li> -->

			</ul>
			<form class="form-inline my-2 my-lg-0" action='index.php' method='get'>
				<input class="form-control mr-sm-2" type="search" placeholder="Nhập điện thoại bạn cần" aria-label="Search" name="search">
				<input type="submit" class="btn btn-outline-success my-2 my-sm-0" value='Tìm kiếm'>
			</form>
		</div>
	</nav>

	<!--<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/panner1.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/panner1.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/panner3.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->

	<?php
		include("center.php");	
	?>
		</div>
</div>
	
<div class="nut-chuyen-trang">
  <div class="container-fluid">
    <div class="row">
      <div id="col-12" style="text-align: center;">
	  <?php
					
					if(isset($_GET['action'])=="giohang")
						echo "&nbsp";
					else
					// hien thi cac link lien ket trang
						echo "<center>". $first . $prev . $nav . $next . $last . "</center>";	
					
			?>
    </div>
    </div>
  </div>
</div>

			


<footer class="page-footer font-small unique-color-dark"  style="background-color: #ffffb3">

    <div class="container text-center text-md-left mt-5">
 
      <div class="row mt-3">
  
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">         
          <h6 class="text-uppercase font-weight-bold">Thế giới di động</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>Chúng tôi luôn cung cấp cho khách hàng những sản phẩm mới nhất, chất lượng nhất và giá cả phải chăng nhất :)))</p>
        </div>
        
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase font-weight-bold">CHĂM SÓC KHÁCH HÀNG</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>Hostlite:1800 0081</p>
          <p>Email: PTTKHDT@phone.com</p>
          <p>Giờ mở cửa: 8h-20h</p>
          <p>Liên hệ bán hàng: 1800 6518</p>
        </div>
        
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase font-weight-bold">HƯỚNG DẪN MUA HÀNG</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>Chính sách bảo mật</p>
          <p>Quy chế hoạt động</p>
          <p>Đổi hàng trong 7 ngày</p>
          <p>Tài khoản giao dịch</p>
        </div>
        
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <h6 class="text-uppercase font-weight-bold">Liên hệ</h6>
          <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p><i class="fa fa-home mr-3"></i>Địa chỉ: 99 An Dương Vương Phường 16 Quận 8 HCM</p>
          <p><i class="fa fa-envelope mr-3"></i>PTTKHDT@phone.com</p>
          <p><i class="fa fa-phone mr-3"></i> + 01 234 567 88  </p>
          <p><i class="fa fa-print mr-3"></i> + 01 234 567 89</p>
        </div>

      </div>
      
    </div>
      
    <div class="footer-copyright text-center py-3"  style="background-color: #ffff4d ">© 2021 Copyright:
      Thegioididong.com
    </div>
    

  </footer>


</body>
	
</html>