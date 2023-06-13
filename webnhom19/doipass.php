<?php
		if(isset($_POST['submit']))
		{
			$sql1 = "SELECT * FROM user WHERE UserName='".$_SESSION['member']."'";
			$result1 = mysqli_query($conn, $sql1);
			$row1=mysqli_fetch_array($result1);
			if($row1['Password'] != $_POST['passwordcu'])
			{
				echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
				exit;
			}
			$sql="UPDATE user SET Password='".$_POST['password']."' WHERE UserName='".$_SESSION['member']."'";
			mysqli_query($conn,$sql);
			header("location:index.php?action=tttk");
			
		}
	
?>
<script language="JavaScript">
     function checkinput(){
		 passwordcu=document.myform.passwordcu;
         password=document.myform.password;
         password1=document.myform.password1;

         dkmatkhau = /^[A-Za-z0-9!@#$%^&*()]{8,32}$/;
         testmk=dkmatkhau.test(password.value)
		 testmk1=dkmatkhau.test(password1.value)
		if(passwordcu.value==""){
             alert("Chưa nhập mật khẩu cũ");
             passwordcu.focus();
            return false;
         }
         else if(password.value==""){
             alert("Chưa nhập mật khẩu");
             password.focus();
            return false;
         }
		 else if(password.value == passwordcu.value){
             alert("Mật khẩu mới trùng với mật khẩu cũ");
             password.focus();
            return false;
         }
        else if(password1.value==""||password1.value!=password.value){
             alert("Mật khẩu lần 2 chưa khớp");
             password1.focus();
             return false;
         }

         else if(!testmk)
         {
           alert('Mật khẩu phải có từ 8 đến 32 kí tự và có thể chứa kí tự đặc biệt');
           password.focus();
           return false;
         }
		 else if(!testmk1)
         {
           alert('Mật khẩu phải có từ 8 đến 32 kí tự và có thể chứa kí tự đặc biệt');
           password1.focus();
           return false;
         }
		 else
		 {
			alert('Đổi thành công');
           return true;
		 }

     }
</script>
<div class="border1" style="border:#000000 solid 2px;">
<div class="border3">
<?php
		$first="";
		$prev="";
		$nav="";
		$next="";
		$last="";
	require "DataProvider.php";
	if(isset($_SESSION['member']))
	{
		$sql = "SELECT * FROM user where UserName='".$_SESSION['member']."'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		echo'<h1>Đổi mật khẩu</h1>
	<form align="center" name="myform" class="" action="index.php?action=doimk" method="post">
		<div class="form-group form-inline">
			<label style="width:130px;" for="passwordcu">Mật khẩu cũ:</label>
			<input placeholder="Mời nhập mật khẩu cũ" type="password" class="form-control" id="passwordcu" name="passwordcu" value="">
		  </div>
		  <div class="form-group form-inline">
			<label style="width:130px;" for="password">Mật khẩu mới:</label>
			<input placeholder="Mời nhập mật khẩu mới" type="password" class="form-control" id="password" name="password" value="">
		  </div>
		  <div class="form-group form-inline">
			<label style="width:130px;" for="password1">Nhập lại mật khẩu:</label>
			<input placeholder="Mời nhập lại mật khẩu" type="password" class="form-control" id="password1" name="password1" value="">
		  </div>
		  <a class ="btn btn-warning" href="javascript: history.go(-1)">Trở lại</a>
		  <button type="submit" name="submit" class="btn btn-default" onclick="return checkinput()">Xác nhận</button>
	</form>';
	}
?>
	
</div>
</div>

