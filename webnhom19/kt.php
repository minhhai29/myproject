    <html>
<head>
<title>Đăng kí</title>
  <link rel="stylesheet" type="text/css" href="css/dangki.css">
<META name="Author" content="Scorpion">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language="JavaScript">
    function checkinput()
    {
        username=document.myform.username;
        password=document.myform.password;
        password1=document.myform.password1;
        hoten=document.myform.hoten;
        diachi=document.myform.diachi;
        email=document.myform.email;
        dienthoai=document.myform.dienthoai;


        reg1=/^[0-9A-Za-z]+[0-9A-Za-z_]*@[\w\d.]+.\w{2,4}$/;
        testmail=reg1.test(email.value);

        dieukientk = /^[A-Za-z0-9_\.]{6,32}$/;
        testtk=dieukientk.test(username.value);

        dkmatkhau = /^[A-Za-z0-9!@#$%^&*()]{8,32}$/;
        testmk=dkmatkhau.test(password.value);

        dkdienthoai=/^[0]+[1-9]{9}$/;
        testdienthoai = dkdienthoai.test(dienthoai.value);

        if(username.value==""){
            alert("Hãy nhập tên đăng nhập");
            username.focus();
            return false;
        }
        else if(!testtk)
        {
          alert('Tên đăng nhập phải từ 6 đến 32 kí tự và không có kí tự đặc biệt');
          username.focus();
          return false;
        }
        else if(password.value==""){
            alert("Chưa nhập mật khẩu");
            password.focus();
            return false;
        }
        else if(password1.value==""||password1.value!==password.value){
            alert("Mật khẩu lần 2 chưa khớp");
            password1.focus();
            return false;
        }

        else if(!testmk)
        {
          alert('Mật khẩu phải có từ 8 đến 32 kí tự và có thể chứa kí tự đặc biệt');
          username.focus();
          return false;
        }

        else if(hoten.value==""){
            alert("Hãy nhập vào họ tên của bạn");
            hoten.focus();
            return false;
        }
        else if(diachi.value==""){
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
        else if(!testdienthoai){
            alert("Số điện thoại chưa chính xác");
            dienthoai.focus();
            return false;
        }
        else
            return true;
    }
</script>
</head>

<body>
  <div id="id01" class="modal">
      <form class="modal-content" name="myform" method="post" action="xulydk.php" >
        <div class="login-dang-ki">
          <h2 style="color:#66a3ff">ĐĂNG KÍ THÀNH VIÊN THẾ GIỚI DI ĐỘNG</h2>
          <tr>
            <td><b>Tên đăng nhập:</b></td>
            <td><input type="text" name="username" /></td>
          </tr>
          <tr>
            <td><b>Mật khẩu:</b></td>
            <td><input type="password" name="password" /></td>
          </tr>
          <tr>
            <td><b>Nhập lại Mật khẩu:</b></td>
            <td><input type="password" name="password1" /></td>
          </tr>
          <tr>
            <td><b>Họ tên:</b></td>
            <td><input type="text" size="30" name="hoten" /></td>
          </tr>
          <tr>
            <td><b>Địa chỉ:</b></td>
            <td><input type="text" size="30" name="diachi" /></td>
          </tr>
          <tr>
            <td><b>Email:</b></td>
            <td><input type="text" size="30" name="email" /></td>
          </tr>
          <tr>
            <td><b>Số điện thoại:</b></td>
            <td><input type="text" size="20" name="dienthoai" /></td>
          </tr>
          <input type="submit" class="button" value="Đăng kí" name="" onClick="return checkinput();">

          
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <input type="reset" value="Làm lại" class="button" id="cancel" style="padding-left: 16px">
            <span class="psw">
                <a href="index.php" style="color: black">Về lại trang chủ</a>
            </span>
        </div>

      </form>
    </div>
</body>
</html>
