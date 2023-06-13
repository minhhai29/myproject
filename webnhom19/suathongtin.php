<?php
		if(isset($_POST['submit']))
		{
			header("location:index.php?action=tttk");
			$sql="UPDATE user SET `DiaChi` = '".$_POST['diachi']."', `Email` = '".$_POST['email']."', `SDT` = '".$_POST['sdt']."' WHERE UserName='".$_SESSION['member']."'";
			mysqli_query($conn,$sql);
		}	
?>
<script language="JavaScript">
     function checkinput(){
         diachi=document.myform.diachi;
         email=document.myform.email;
         dienthoai=document.myform.sdt;

         reg1=/^[0-9A-Za-z]+[0-9A-Za-z_]*@[\w\d.]+.\w{2,4}$/;
         testmail=reg1.test(email.value);
         if(diachi.value==""){
             alert("Chưa nhập địa chỉ");
             diachi.focus();
             return false;
         }
         else if(!testmail){
             alert("Địa chỉ email không hợp lệ");
             email.focus();
             return false;
         }
        else if(dienthoai.value=="")
         {
             alert("Chưa nhập số điện thoại");
             dienthoai.focus();
             return false;
         }
         else if(isNaN(dienthoai.value)){
             alert("Số điện thoại chưa chính xác");
             dienthoai.focus();
             return false;
         }
		 else
		 {
			 alert("Cập nhật thành công");
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
		echo'<h1>Cập nhật thông tin</h1>
	<form align="center" name="myform" class="" action="index.php?action=suatt" method="post">
		  <div class="form-group form-inline">
			<label style="width:100px;" for="diachi">Địa chỉ:</label>
			<input type="text" class="form-control" id="diachi" name="diachi" value="'.$row['DiaChi'].'">
		  </div>
		  <div class="form-group form-inline">
			<label style="width:100px;" for="email">Email:</label>
			<input type="email" class="form-control" id="email" name="email" value="'.$row['Email'].'">
		  </div>
		  <div class="form-group form-inline">
			<label style="width:100px;" for="sdt">Số điện thoại:</label>
			<input type="text" class="form-control" id="sdt" name="sdt" value="'.$row['SDT'].'">
		  </div>

		  <a class ="btn btn-warning" href="javascript: history.go(-1)">Trở lại</a>
		  <button type="submit" name="submit" class="btn btn-default" onclick="return checkinput()">Cập nhật</button>
	</form>';
	}
?>
	
</div>
</div>

