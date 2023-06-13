<?php
    require 'DataProvider.php';
    session_start();
    $id=$_POST["id"];
    if(isset($_SESSION["card"][$id]))
    {
        $ty=$_SESSION["card"][$id] + 1;
    }
    else{
        $ty=1;
    }
    $_SESSION["card"][$id]=$ty;
    
?>
<?php 
//so luong
    if(isset($_POST["submit"]))
    {
        foreach($_POST["qty"] as $key => $val)
        {
            if(($val == 0) && (is_numeric($val)))
            {
                unset($_SESSION["card"][$key]);
                unset($_SESSION["card"][$id]);
            }
            else if(($val >0) && (is_numeric($val)))
            { 
                $_SESSION["card"][$key]=$val;
                unset($_SESSION["card"][$id]);
            }
        }
        header("location:index.php?action=giohang");
    }
?>
<?php
    // lưu hóa đơn, chi tiết hóa đơn
    if(isset($_POST["addbuy"]))
    {   
        //lưu hóa đơn
        $date=getdate();
        $time=$date['year'].'-'.$date['mon'].'-'.$date['mday'];
        $ad = $_POST["diachi"];
        $method=$_POST["phuongthuc"];
        $user = $_SESSION["member"];
        $ac = "ok";
        $tongtien = $_SESSION["thanhtien"];
        if($method == "loai2")
            $phiship = 50000;
        else $phiship = 0;

        $sql=mysqli_query($conn,"SELECT * from hoadon");
        $i=mysqli_num_rows($sql);
        $sql1 = "INSERT INTO hoadon (`MaHoaDon`, `NgayDatHang`, `PhuongThucThanhToan`, `UserName`, `TongTien`, `PhiVanChuyen`) VALUES('HD".($i+1)."','$time','$method','$user','$tongtien','$phiship')";
        mysqli_query($conn,$sql1);
        $i+=1;
        
        
        //Lưu đơn hàng
        $sql2="SELECT * FROM user WHERE UserName='".$_SESSION['member']."'";
        $result=mysqli_query($conn,$sql2);
        $row = mysqli_fetch_array($result);
        $sql=mysqli_query($conn,"SELECT * from donhang`");
        $i1=mysqli_num_rows($sql);
        $sql1="INSERT INTO donhang (`MaDonHang`, `MaHoaDon`, `TenKhachHang`, `SDTNguoiNhan`, `DiaChiGiaoHang`, `TenNguoiGiaoHang`, `TinhTrangDonHang`) VALUES ('DH".($i1+1)."', 'HD".$i."', '$user', '".$row['SDT']."', '$ad', 'Nguyễn Văn A', 'chuagiao');";
        mysqli_query($conn,$sql1);
        
        //giảm sl tồn
        foreach($_POST["qty"] as $key => $val)
        {
            $sql3=mysqli_query($conn,"SELECT * from sanpham where MaSP='".$key."'");
            $row3= mysqli_fetch_array($sql3);
            $slton=$row3['SLTon']; 
            $slton-=$val;
            $sql4="UPDATE sanpham SET SLTon = '".$slton."' WHERE MaSP='".$key."'";
            mysqli_query($conn,$sql4);
        }
        
        //Lưu chi tiết hóa đơn
        $dem =1;
        foreach($_POST["qty"] as $key => $val)
        {
            $sql=mysqli_query($conn,"SELECT * from chitiethoadon`");
            $a=mysqli_num_rows($sql);
            $sql1="SELECT * FROM sanpham WHERE MaSP='".$key."'";
            $result=mysqli_query($conn,$sql1);
            $row = mysqli_fetch_array($result);
            $thanhtien=$row['DonGia']*$val;
            $sql2="INSERT INTO chitiethoadon (`MaChiTietHoaDon`,`MaHoaDon`,`MaSp`, `SoLuong`, `DonGia`, `DonViTinh`, `ThanhTien`) VALUES ('CT".($a+1)."','HD".$i."', '$key', '$val', '".$row['DonGia']."', 'VND','".$thanhtien."');";
            $result2=mysqli_query($conn,$sql2);
            unset($_SESSION["card"][$key]);
            unset($_SESSION["card"][$id]);
            $_SESSION["ac"]=$ac;
            header("location:hoadon.php?mahd=HD".$i);
        }
        
    }

?>