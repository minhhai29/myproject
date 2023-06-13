<?php 
  session_start();
    if(!isset($_SESSION["member"])){
      //header("Location:dang-nhap.php");
      header("location:index.php?dnloi");
  }
  else{
?>
<?php 
	include('common.php');
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Thêm user</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

<body>
	<?php
	if (isset($_REQUEST['loi']))
	{
		echo 'Không thể insert được vì lý do gì đó. Vui lòng nhập lại.';
	}
	?>

	<!-- <form action="xulyuser.php" method="get">
		<table width="60%" border="0">
			<tr>
				<td width="11%">Username</td>
				<td width="89%"><input type="text" name="txtUser" id="textfield" /></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="txtPass" id="textfield" /></td>
			</tr>
			<tr>
				<td width="11%">Địa chỉ</td>
				<td width="89%"><input type="text" name="txtDiachi" id="textfield" /></td>
			</tr>
			<tr>
				<td width="11%">Email</td>
				<td width="89%"><input type="text" name="txtEmail" id="textfield" /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="button" id="button" value="OK" /></td>
			</tr>
		</table>
		<input name="loai" type="hidden" value="0" />
	</form> -->

	<div class="container">
  <h2 style="text-align: center;">Thêm tài khoản</h2>
  <form action="xulyuser.php" method="get" class="was-validated">
    <div class="form-group">
      <label for="uname">Tên đăng nhập:</label>
      <input type="text" class="form-control" id="uname" placeholder="Mời điền tên đăng nhập" name="txtUser" required>
      <div class="valid-feedback">Hợp lệ.</div>
      <div class="invalid-feedback">Vui lòng điền vào trường này!</div>
    </div>
    <div class="form-group">
      <label for="pwd">Mật khẩu:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Mời nhập mật khẩu" name="txtPass" required>
      <div class="valid-feedback">Hợp lệ.</div>
      <div class="invalid-feedback">Vui lòng điền vào trường này!</div>
    </div>
    <div class="form-group">
      <label for="uname">Địa chỉ:</label>
      <input type="text" class="form-control" id="uname" placeholder="Mời nhập địa chỉ" name="txtDiachi" required>
      <div class="valid-feedback">Hợp lệ.</div>
      <div class="invalid-feedback">Vui lòng điền vào trường này!</div>
    </div>
    <div class="form-group">
      <label for="pwd">Email:</label>
      <input type="text" class="form-control" id="pwd" placeholder="Mời nhập địa chỉ email" name="txtEmail" required>
      <div class="valid-feedback">Hợp lệ.</div>
      <div class="invalid-feedback">Vui lòng điền vào trường này!</div>
    </div>
    <!-- <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember" required> I agree on blabla.
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Check this checkbox to continue.</div>
      </label>
    </div> -->
    <button type="submit" class="btn btn-primary">Thêm</button>
    <input name="loai" type="hidden" value="0" />
	<a class ="btn btn-primary" href="javascript: history.go(-1)">Trở lại</a>
  </form>
</div>

</body>
</html>
<?php } ?>