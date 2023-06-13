<?php 
  session_start();
    if(!isset($_SESSION["member"])){
      header("Location:dang-nhap.php");
  }
  else{
?>
<?php 
	include('common.php');
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Thêm sản phẩm</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

<body>
	<?php
	if (isset($_REQUEST['loi']))
	{
		echo 'Không thể insert được vì lý do gì đó. Vui lòng nhập lại.';
	}
	?>

	<div class="container">
  <h2 style="text-align: center;">Thêm sản phẩm</h2>
  <form action="xulysp.php" method="get" class="was-validated">

    <div class="form-group">
      <label for="uname">Tên sản phẩm:</label>
      <input type="text" class="form-control" id="uname" placeholder="" name="txtTen" required>
    </div>

    <label for="uname">Loại sản phẩm:</label>
    <div class="form-check">
      <label class="form-check-label" for="radio1">
        <input type="radio" class="form-check-input" id="radio1" name="maloai" value="ip" checked>Iphone
      </label>
    </div>
    <div class="form-check">
      <label class="form-check-label" for="radio2">
        <input type="radio" class="form-check-input" id="radio2" name="maloai" value="ss">SamSung
      </label>
    </div>
    <div class="form-check">
      <label class="form-check-label" for="radio1">
        <input type="radio" class="form-check-input" id="radio1" name="maloai" value="op" checked>Oppo
      </label>
    </div>
    <div class="form-check">
      <label class="form-check-label" for="radio2">
        <input type="radio" class="form-check-input" id="radio2" name="maloai" value="no">Nokia
      </label>
    </div>
    <div class="form-check">
      <label class="form-check-label" for="radio2">
        <input type="radio" class="form-check-input" id="radio2" name="maloai" value="so">Sony
      </label>
    </div>

    <div class="form-group">
      <label for="pwd">Số lượng tồn:</label>
      <input type="text" class="form-control" id="pwd" placeholder="" name="txtSl" required>
    </div>

    <div class="form-group">
      <label for="uname">Đơn giá:</label>
      <input type="text" class="form-control" id="uname" placeholder="" name="txtDongia" required>
    </div>

    <div class="form-group">
      <label for="pwd">Hình ảnh:</label>
      <!-- <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="txtHinh" required> -->
      <br>
      <input type="file" name="txtHinh">
    </div>
   
    <input name="loai" type="hidden" value="0" />
    <button type="submit" class="btn btn-warning">Thêm</button>
    <a class ="btn btn-warning" href="javascript: history.go(-1)">Trở lại</a>
  </form>
</div>

</body>
</html>
<?php }?>