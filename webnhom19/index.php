 
<!DOCTYPE html>
<html>
<head>
  <title>Thế giới di động</title>
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
  
  <link type="text/css" rel="stylesheet" href="css/tttk.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
  <script type="text/javascript" src="js/index.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/ajax.js"></script>
  <script type="text/javascript">
    function ktraTK()
    {
      var add= document.getElementById('timkiem');
      var kiemtra = /^[!@#$%^&*()]/;
      var kiemtra1 = /^[']+[A-Za-z0-9]+[']/;
      if(kiemtra.test(add.value) || (kiemtra1.test(add.value)))
      {
          document.getElementById("timkiem").value="";
          document.getElementById("timkiem").placeholder="Không hợp lệ";
          add.focus();
          return false;
      }
      else
        return true;
    }

    function ktttnc()
    {
      var giatu= document.getElementById('giatu');
      var giaden= document.getElementById('giaden');
      var kiemtra = /^[!@#$%^&*()]/;
      var kiemtra1 = /^['A-Za-z0-9']/;
      if(kiemtra.test(giatu.value) || kiemtra1.test(giatu.value))
      {
          document.getElementById("giatu").value="";
          document.getElementById("giatu").placeholder="Không hợp lệ";
          giatu.focus();
          return false;
      }
      else if(kiemtra.test(giaden.value) || kiemtra1.test(giaden.value))
      {
          document.getElementById("giaden").value="";
          document.getElementById("giaden").placeholder="Không hợp lệ";
          giaden.focus();
          return false;
      }
      else
        return true;
    }
  </script>
  <style type="text/css">

    @media only screen and (max-width:1365px )
    {
      .product-box
      {
        margin: 25px;
      }
    }

    @media only screen and (max-width: 600px) 
    {
      .product-box
      {
        width: 240px;
        height: 329px;
        margin-left: 150px;
        margin-top: 15px;
        float: left;
        box-shadow: 1px 1px 5px gray;
        transition: 0.2s;
        -webkit-border-radius: 6px;
      }
    }
  </style>
</head>
<body style="font-family: Helvetica Neue, Arial, sans-serif">
    <?php
      include("header.php");
    ?>
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
              if(isset($_GET['action']) &&($_GET['action']== "giohang" || $_GET['action']== "chitiethd"))
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