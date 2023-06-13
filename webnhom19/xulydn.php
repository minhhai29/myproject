<?php
//Khai báo sử dụng session
session_start();

//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');

//Xử lý đăng nhập
if (isset($_POST['dangnhap'])) 
{
    
require 'DataProvider.php';
    
    //Lấy dữ liệu nhập vào
    $username = $_POST['tk'];
    $password = $_POST['mk'];
    
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    
    //mã hóa pasword
    //$password = md5($password);
    
    //Kiểm tra tên đăng nhập có tồn tại không
    $sql = "SELECT * FROM user WHERE UserName='".$username."'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)==0) 
    {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    if(mysqli_num_rows($result)==1)
    {
        $row = mysqli_fetch_array($result);
        if($password != $row['Password'])
        {
            echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }
        else
        {
            
            //echo('Logined');
            if($row['TrangThai']==1)
            {
                $_SESSION['member'] = $username;
                mysqli_close($conn);
            
                header("Location:index.php?action=tttk");
                die();
            }
            else
            {?>
                <script type="text/javascript">
                    var yes = confirm('Tài khoản đã bị khóa, bạn có muốn đăng nhập bằng tài khoản khác?');
                    if(yes)
                    {
                        location = 'dang-nhap.php';
                    }
                </script>
            <?php }
            
        }
    }
    
    // //Lấy mật khẩu trong database ra
    // $row = mysqli_fetch_array($result);
    
    // //So sánh 2 mật khẩu có trùng khớp hay không
    // if ($password != $row['Password']) {
    //     echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
    //     exit;
    // }
    
    // //Lưu tên đăng nhập
    // $_SESSION["member"]= $username;
    // $_SESSION["idmem"]= $row['MaKhachHang'];
    // $_SESSION["pass"]=$password;
    // $_SESSION["address"]=$result["DiaChi"];
    
    // header("Location:index.php");
    // die();
    
}
?>
