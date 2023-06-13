<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/dang-nhap.css">
	<META name="Author" content="Scorpion">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>
<body>
  	
		<div id="id01" class="modal">
			<form class="modal-content" method="post" action="xulydn.php">
			    <div class="login-dang-nhap">
			     	<label for="uname"><b>Tài khoản</b></label>
					<input type="text" placeholder="Tên đăng nhập của bạn" id="tk" name="tk">

					<label for="psw"><b>Mật khẩu</b></label>
					<input type="password" placeholder="Mật khẩu của bạn" id="mk" name="mk">
						        
	        		<input name ="dangnhap" type="submit" class="button" value="Đăng nhập" onClick="return kiemtradieukiennhap()">
	        		
					<label><a href="kt.php" style="color: black">Chưa có tài khoản</a></label>
				</div>
				<div class="container" style="background-color:#f1f1f1">
					<input type="button" value="Hủy" class="button" id="cancel">
					<span class="psw">
						<label><a href="index.php" style="color: black">Về lại trang chủ</a></label>
					</span>
				</div>
			</form>
		</div>
		
		<script>
			function kiemtradieukiennhap()
			{
				var tk = document.getElementById('tk').value;
				var mk = document.getElementById('mk').value;
				var kieukien = /^[A-Za-z0-9_\.]{6,32}$/;
				// if(tk =="")
				// {
				// 	alert('Bạn chưa nhập tài khoản');
				// 	tk.focus[0];
				// 	return false;
				// }
				// else if(mk =="")
				// {
				// 	alert('Bạn chưa nhập mật khẩu');
				// 	mk.focus[0];
				// 	return false;
				// }
				// else 
				if(!kieukien.test(tk))
				{
					alert('Tên đăng nhập phải từ 6 đến 32 kí tự và không có kí tự đặc biệt và không được bỏ trống');
					return false;
				}
				else
					return true;
				
			}
		</script>
</body>
</html>