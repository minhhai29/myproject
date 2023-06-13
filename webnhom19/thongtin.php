
<div class="border1" style="border:#000000 solid 2px;">
<div class="border3">

<?php
		$first="";
		$prev="";
		$nav="";
		$next="";
		$last="";
		require 'DataProvider.php';
		if(isset($_SESSION['member']))
			$sql = "SELECT * FROM user where UserName='".$_SESSION['member']."'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		echo"<h1>Thông tin cá nhân</h1>
		<p><span>Tài khoản:</span>".$row['UserName']."</p>
		<p><span>Mật khẩu:</span> ***  <a href='index.php?action=doimk'><i class='fa fa-edit'></i></a></p>	
		<p><span>Địa chỉ: </span>".$row['DiaChi']."</p>
		<p><span>Email: </span>".$row['Email']."</p>
		<p><span>Số điện thoại: </span>".$row['SDT']."</p>
		<h3><a class='btn btn-warning' href='index.php?action=suatt' style='color: red;'>Cập nhật tài khoản</a></h3>";

?>
</div>
</div>