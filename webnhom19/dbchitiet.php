<?php
	if(!isset($_SESSION['member']) || ($quyen != "manager" && $quyen != "master"))
	{
		header("location:index.php?dnloi");
	}
	//session_start();
    // if(!isset($_SESSION["member"])){
    //   header("Location:dang-nhap.php");

  else{
?>
<h2 style="text-align: center; padding-top: 50px">CHI TIẾT HÓA ĐƠN</h2>
<table class="table table-hover table-responsive-md">
		  <thead class="thead-dark">
		    <tr>
		      <th class="text-center" scope="col">STT</th>
		      <th class="text-center" scope="col">Mã SP</th>
		      <th class="text-center" scope="col">Tên sản phẩm</th>
		      <th class="text-center" scope="col">Đơn giá</th>
		      <th class="text-center" scope="col">Số lượng</th>
			  <th class="text-center" scope="col">Thành tiền</th>
			</tr>
	  	  </thead>
	    <tbody>
		
		
		<?php
			require 'DataProvider.php';
			if(isset($_GET['mahd']))
			{
				//gọi hóa đơn
				$sql="SELECT * FROM chitiethoadon where MaHoaDon='".$_GET['mahd']."'" ;
				$result=mysqli_query($conn,$sql);
				$i=1;
				$tongcong=0;
				while ($row = mysqli_fetch_array($result))
				{
					//gọi đơn hàng
					$sql1="SELECT * FROM sanpham WHERE MaSP='".$row['MaSp']."'";
					$result1=mysqli_query($conn,$sql1);
					$row1 = mysqli_fetch_array($result1);
					
					$masp=$row['MaSp'];
					$tensp=$row1['TenSP'];
					$dongia=$row['DonGia'];
					$soluong=$row['SoLuong'];
					$thanhtien=$row['ThanhTien'];
					echo'<tr>
							<td class="text-center">'.$i.'</td>
							<td class="text-center">'.$masp.'</td>
							<td class="text-center">'.$tensp.'</td>
							<td class="text-center">'.number_format($dongia,'0','.','.').'đ</td>
							<td class="text-center">'.$soluong.'</td>
							<td class="text-center">'.number_format($thanhtien,'0','.','.').'đ</td>
							
						</tr>';
						$i++;
						$tongcong+=$thanhtien;
				}
				$sql1="select * from hoadon where MaHoaDon='".$_GET['mahd']."'" ;
				$result1=mysqli_query($conn,$sql1);
				$row1 = mysqli_fetch_array($result1);
				$phiship=$row1['PhiVanChuyen'];
				$thanhtoan=$tongcong+$phiship;
				
			}
		?>
		
			</tbody>
		</table>
		<div class ="px-5">
			<p>Tổng cộng: <?php echo number_format($tongcong,'0','.','.').'đ' ?></P>
			<p>Phí vận chuyển: <?php echo number_format($phiship,'0','.','.').'đ' ?></p>
			<p>Phải thanh toán: <?php echo number_format($thanhtoan,'0','.','.').'đ' ?></p>
			<a href="javascript:history.go(-1)" class="btn btn-warning"><i class="fa fa-angle-left"></i> Quay lại</a>
		</div>
<?php  } ?>	
		