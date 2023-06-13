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

	$query = "SELECT * FROM user WHERE UserName = '" . $_REQUEST['username'] . "'";


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
		echo 'Không thể thêm được vì lý do gì đó. Vui lòng nhập lại.';
	}
	?>

	<div class="container">
  <h2 style="text-align: center;">Sửa account</h2>
  <form action="xulyuser.php" method="get" class="was-validated">
    <div class="form-group">
      <!-- <label for="uname">Username:</label> -->
      <input type="hidden" class="form-control" id="uname" value="<?php echo $row[1]?>" name="txtUser" required>
    </div>

    <!-- <div class="form-group">
      <label for="uname">Password:</label>
      <input type="text" class="form-control" id="uname" value="<?php echo $row[2];?>" name="txtPass" required> 
    </div> -->

    <div class="form-group">
      <label for="uname">Address:</label>
      <input type="text" class="form-control" id="uname" value="<?php echo $row[3];?>" name="txtDiachi" required> 
    </div>

    <div class="form-group">
      <label for="pwd">Email:</label>
      <input type="text" class="form-control" id="pwd" value="<?php echo $row[4];?>" name="txtEmail" required>
    </div>
    <button type="submit" class="btn btn-primary">Sửa</button>
    <input name="loai" type="hidden" value="1" />
  </form>
</div>

</body>
</html>
<?php } ?>