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

  <link rel="stylesheet" type="text/css" href="css/thong-tin-san-pham.css">

  <link rel="stylesheet" type="text/css" href="css/them-vao-gio-hang.css">

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

  <link rel="stylesheet" type="text/css" href="css/dang-nhap.css">

  <link rel="stylesheet" type="text/css" href="fontawesome-free-5.5.0-web/css/all.css">

  <script type="text/javascript" src="js/index.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
  <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body style="font-family: Helvetica Neue, Arial, sans-serif">

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
						Tài khoản
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
			<form class="form-inline my-2 my-lg-0" action='index.php' method='get'>
				<input class="form-control mr-sm-2" type="search" placeholder="Nhập điện thoại bạn cần" aria-label="Search" name="search">
				<input type="submit" class="btn btn-outline-success my-2 my-sm-0" value='Tìm kiếm'>
			</form>
		</div>
	</nav>

  <div class="chi-tiet">

    <div class="container-fluid"> 

      <div class="row">

        <div class="col-5">

         
		
		<?php
			require('DataProvider.php');
			$ma = $_GET["id"];
			$sql = "SELECT * FROM sanpham WHERE MaSP = '".$ma."'";
			$result = mysqli_query($conn,$sql);
			while ($row = mysqli_fetch_array($result) )
			{
				echo'
			<div class="phone-page" style="padding-top: 40px">
            <h3 id="ten-sp">'.$row["TenSP"].'</h3>
            <div class="phone-page">
              <div id="image">
                <img src="'.$row["Image"].'">
              </div>
            </div>
          </div>

        </div>
        
        <div class="col-7">
          <div class="thong-so" style="padding-top: 70px">';
		  include("thongsokythuat.php");
			echo'
			<h3 id="spnb" style="text-align: center">'.number_format($row["DonGia"]).'₫</h3>
            <center><button style="button" class="buy_now" id="'.$row['MaSP'].'">
			
            <b>Thêm vào giỏ hàng </b>
            <span>Giao trong 1 giờ hoặc nhận tại siêu thị</span>
            </button></center>
            </div>
        </div>';
		?>
		<script type="text/javascript">

                $(document).ready(function(){
                        $("#<?php echo $row['MaSP']; ?>").click(function(){
                            var id=$("#<?php echo $row['MaSP'];?>").attr("id");
                            $.ajax({
                                type:"POST",
                                url:"addcard.php",
                                data:{id : id},
                                cache:false,
                                success:function(result){
                                    alert("Sản phẩm đa được thêm vào giỏ hàng");
                                    window.location.reload();
                                }
                            });
                        });
                    });
                </script>
		<?php
			}
		?>

      </div>
    </div>
  </div>
  
</body>
</html>