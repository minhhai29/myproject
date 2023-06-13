<?php 
  //session_start();
    if(!isset($_SESSION["member"])){
      //header("Location:dang-nhap.php");
      header("location:index.php?dnloi");
  }
  else{
?>
<?php
		// if(!isset($_SESSION['member']) || ($quyen != "manager" && $quyen != "master"))
		// {
		// 	header("location:index.php?dnloi");
		// }
			require 'DataProvider.php';
			if(!isset($_GET["page"])) $page=1;
			else $page = $_GET["page"];
			if($page == "" || $page == "1")
			{
				$offset = 0;
			}
			else
			{
				$offset = ($page*8)-8;
			}
			$pageNum = 1;

			// neu co tham so $_GET['page'] thi su dung no la trang hien thi
			if(isset($_GET['page']))
			{
				$pageNum = $_GET['page'];
			}
		?>
		<h2 style="text-align: center; padding-top: 50px">QUẢN LÝ ĐƠN HÀNG</h2>
		<form  class="mx-4 form-inline my-2 my-lg-0" action='index.php?action=quanlyhd' method='post'>
				<input class="form-control mr-sm-2" type="search" placeholder="Nhập hóa đơn muốn tìm" aria-label="Search" name="timhd">
				<input type="submit" class="btn btn-outline-success my-2 my-sm-0" value='Tìm kiếm'>
		</form>
		<br/>
		<table class="table table-hover table-responsive-md">
		  <thead class="thead-dark">
		    <tr>
		      <th class="text-center" scope="col">STT</th>
		      <th class="text-center" scope="col">Mã Hóa Đơn</th>
		      <th class="text-center" scope="col">Ngày đăt hàng</th>
		      <th class="text-center" scope="col">Nhân viên</th>
		      <th class="text-center" scope="col">Tổng tiền</th>
			  <th class="text-center" scope="col">Chi tiết hóa đơn</th>
		      <th class="text-center" scope="col">Tình trạng</th>
			</tr>
	  	  </thead>
	    <tbody>
		
		<script type="text/javascript">
		function active_inactive_user(tinhtrang, mahd){
			
			$.ajax({
				type: 'post',
				url: 'tinhtrangdh.php',
				data: {tinhtrang:tinhtrang, mahd:mahd},
				success:function(result)
				{
					//Hiển thị kết quả ra màn hình console
					//console.log(result); 
					alert("Thay đổi thành công");
                    window.location.reload();
				}
			})
		}
		</script>
		<?php
			
			//gọi hóa đơn
			if(isset($_POST['timhd']))
			{
				$sql="SELECT * FROM hoadon WHERE MaHoaDon='".$_POST['timhd']."'";
			}
			else $sql="SELECT * FROM hoadon limit $offset,8";
			$result=mysqli_query($conn,$sql);
			$i=1;
			while ($row = mysqli_fetch_array($result))
			{
				//gọi đơn hàng
				$sql1="SELECT * FROM donhang WHERE MaHoaDon='".$row['MaHoaDon']."'";
				$result1=mysqli_query($conn,$sql1);
				$row1 = mysqli_fetch_array($result1);
				
				$mahd=$row['MaHoaDon'];
				$ngaydat=$row['NgayDatHang'];
				$nhanvien=$row1['TenNguoiGiaoHang'];
				$tongtien=$row['TongTien']+$row['PhiVanChuyen'];
				$tinhtrang=$row1['TinhTrangDonHang'];
				echo'<tr>
						<td class="text-center">'.$i.'</td>
						<td class="text-center">'.$mahd.'</td>
						<td class="text-center">'.$ngaydat.'</td>
						<td class="text-center">'.$nhanvien.'</td>
						<td class="text-center">'.number_format($tongtien,'0','.','.').'đ</td>
						<td class="text-center"><a class="btn btn-outline-primary" href="index.php?action=chitiethd&mahd='.$row['MaHoaDon'].'">Xem</a></td>
						<td class="text-center">
						<select style="width:80px;" onchange="active_inactive_user(this.value,\''.$row["MaHoaDon"].'\')">';
							if($tinhtrang=="chuagiao"){
							echo'<option value="chuagiao" selected>Chưa giao</option>
								<option value="dagiao">Đã giao</option>
								<option value="bihuy">Bị huỷ</option>';}
							else if($tinhtrang=="dagiao"){
							echo'<option value="dagiao" selected>Đã giao</option>';}
							else{
							echo'<option value="bihuy" selected>Bị huỷ</option>';}
						echo'</select>
						</td>
					</tr>';
					$i++;
			}
			
		
		?>
		<?php	
				if(isset($_POST['timhd']))
				{
					$prev  = '&nbsp;';
					$first = '&nbsp;'; 
					$nav=" $page ";
					$next = '&nbsp;'; 
					$last = '&nbsp;'; 
				}
				else
				{
				   // dem so mau tin co trong CSDL
					$sql   = "SELECT COUNT(*) AS numrows FROM hoadon";
					// $result = DataProvider::executeQuery($sql);
					$result = mysqli_query($conn, $sql);
					$row     = mysqli_fetch_array($result,MYSQLI_ASSOC);
					$numrows = $row['numrows'];

					// tinh tong so trang se hien thi
					$maxPage = ceil($numrows/8);

					// hien thi lien ket den tung trang
					
					$self = "index.php?action=quanlyhd";
					
					$nav  = '';

					for($page = 1; $page <= $maxPage; $page++)
					{
					   if ($page == $pageNum)
					   {
						  if($page == 1)
						  {
							$nav .= " $page "; // khong can tao link cho trang hien hanh
							$page = $page +1;
							$nav .= " <a href=\"$self&page=".$page."\" class='so-trang'>$page</a> ";
						  }
						  else if($page == $maxPage)
						  {
							$page = $page -1;
							$nav .= " <a href=\"$self&page=".$page."\" class='so-trang'>$page</a> ";
							$page = $page +1;
							$nav .= " $page ";
						  }
						  else
						  {
							  $page = $page -1;
							$nav .= " <a href=\"$self&page=".$page."\" class='so-trang'>$page</a> ";
							$page = $page +1;
							$nav .= " $page "; // khong can tao link cho trang hien hanh
							$page = $page +1;
							$nav .= " <a href=\"$self&page=".$page."\" class='so-trang'>$page</a> ";
						  }
					   }
					  
					}

					// tao lien ket den trang truoc & trang sau, trang dau, trang cuoi
					if ($pageNum > 1)
					{
					   $page  = $pageNum - 1;
					   $prev  = " <a href=\"$self&page=".$page."\" class='so-trang'>&lt</a> ";

					   $first = " <a href=\"$self&page=1\" class='so-trang'>Trang đầu</a> ";
					}
					else
					{
					   $prev  = '&nbsp;'; // dang o trang 1, khong can in lien ket trang truoc
					   $first = '&nbsp;'; // va lien ket trang dau
					}

					if ($pageNum < $maxPage)
					{
					   $page = $pageNum + 1;
					   $next = " <a href=\"$self&page=".$page."\" class='so-trang'>&gt</a> ";

					   $last = " <a href=\"$self&page=".$maxPage."\" class='so-trang'>Trang cuối</a> ";
					}
					else
					{
					   $next = '&nbsp;'; // dang o trang cuoi, khong can in lien ket trang ke
					   $last = '&nbsp;'; // va lien ket trang cuoi
					}
				}
		?>
			</tbody>
		</table>
		<div class ="px-5">
		<?php
			$sql2="SELECT * FROM hoadon";
			$result2=mysqli_query($conn,$sql2);
			$sohoadon=0;
			$hoadonhuy=0;
			$doanhthu=0;
			
			while ($row2 = mysqli_fetch_array($result2))
			{
				$sql3="SELECT * FROM donhang WHERE MaHoaDon='".$row2['MaHoaDon']."'";
				$result3=mysqli_query($conn,$sql3);
				$row3 = mysqli_fetch_array($result3);
				if($row3['TinhTrangDonHang'] != "bihuy")
				{
					$tongcong=$row2['TongTien']+$row2['PhiVanChuyen'];
					$doanhthu+=$tongcong;
					$sohoadon++;
				}
				else $hoadonhuy++;
			}
		?>
			<p>Tổng hóa đơn: <?php echo $sohoadon ?></P>
			<p>Số hóa đơn bị hủy: <?php echo $hoadonhuy ?></P>
			<p>Tổng doanh thu dự tính: <?php echo number_format($doanhthu,'0','.','.').'đ' ?></p>
			
		</div>
<?php }?>