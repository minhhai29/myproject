<?php 
  session_start();
    if(!isset($_SESSION["member"])){
      //header("Location:dang-nhap.php");
      header("location:index.php?dnloi");
  }
  else{
?>
<?php 
	require('common.php');
	require('DataProvider.php');

	$query = "SELECT * FROM sanpham WHERE MaSP = '" . $_REQUEST['masp'] . "'";


	$result = mysqli_query($conn, $query);

	$row = mysqli_fetch_array($result);

	mysqli_close($conn);
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Sua user</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

<body>
	<?php
	if (isset($_REQUEST['loi']))
	{
		echo 'Không thể thêm sản phẩm được vì lý do gì đó. Vui lòng nhập lại.';
	}
	?>

	<div class="container">
  <h2 style="text-align: center;">Sửa sản phẩm</h2>
  <form action="xulysp.php" method="get" class="was-validated">
    <div class="form-group">
      <!-- <label for="uname">MaSP:</label> -->
      <input type="hidden" class="form-control" id="uname" value="<?php echo $row[1]?>" name="txtMasp" required>
    </div>

    <div class="form-group">
      <!-- <label for="uname">MaLoaiSP:</label> -->
      <input type="hidden" class="form-control" id="uname" value="<?php echo $row[0]?>" name="txtMalsp" required>
    </div>

    <div class="form-group">
      <label for="uname">Số lượng tồn:</label>
      <input type="text" class="form-control" id="uname" value="<?php echo $row[3];?>" name="txtSlt" required> 
    </div>

    <div class="form-group">
      <label for="pwd">Đơn giá:</label>
      <input type="text" class="form-control" id="pwd" value="<?php echo $row[4];?>" name="txtDg" required>
    </div>

    <button type="submit" class="btn btn-success btn-secondary">Sửa</button>
    <input name="loai" type="hidden" value="1" />
    <a class ="btn btn-success btn-secondary" href="javascript: history.go(-1)">Trở lại</a>
    <!-- Lấy biến loại để qua xử lý sản phẩm để thêm -->
  </form>
</div>

</body>
</html>
<?php } ?>