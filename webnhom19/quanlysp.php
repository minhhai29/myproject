<script type="text/javascript">
	function ktxoa(masp)
{
	var yes = confirm('Bạn có chắc muốn xóa mẫu điện thoại này không?');
	if(yes)
	{
		location = 'xulysp.php?loai=2&masp=' + masp;
	}
}
</script>
	<?php
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
	<form  class="mx-4 form-inline my-2 my-lg-0" style = "float:left;" action='index.php?action=quanlysp' method='post'>
				<input class="form-control mr-sm-2" type="search" placeholder="Nhập sản phẩm muốn tìm" aria-label="Search" name="timsp">
				<input type="submit" class="btn btn-outline-success my-2 my-sm-0" value='Tìm kiếm'>
		</form>
		<h3><a href="themsp.php" class="btn btn-warning mr-sm-3" style = "float:right;"> Thêm sản phẩm </a></h3>
		<br/>
		<br/>
	<table class="table table-hover table-responsive-md">
			  <thead class="thead-dark">
				<tr>
				  <th class="text-center" scope="col">Hình ảnh</th>
				  <th class="text-center" scope="col">Mã SP</th>
				  <th class="text-center" scope="col">Tên sản phẩm</th>
				  <th class="text-center" scope="col">Thương hiệu</th>
				  <th class="text-center" scope="col">SL Tồn</th>
				  <th class="text-center" scope="col">Đơn giá</th>
				  <th class="text-center" scope="col">Thao tác</th>
				</tr>
			  </thead>
			<tbody>
			<?php
				//gọi sản phẩm
				if(isset($_POST['timsp']))
				{
					$sql="SELECT * FROM sanpham WHERE TenSP LIKE '%".$_POST['timsp']."%'";
				}
				else $sql="SELECT * FROM sanpham limit $offset,8";
				$result=mysqli_query($conn,$sql);
				while ($row = mysqli_fetch_array($result))
				{
					//gọi loại sản phẩm
					$sql1="SELECT * FROM loaisp WHERE MaLoaiSP='".$row['MaLoaiSP']."'";
					$result1=mysqli_query($conn,$sql1);
					$row1 = mysqli_fetch_array($result1);
					
					$image=$row['Image'];
					$masp=$row['MaSP'];
					$tensp=$row['TenSP'];
					$thuonghieu=$row1["TenLoaiSP"];
					$slton=$row['SLTon'];
					$dongia=$row['DonGia'];
					echo'<tr>
							<td class="text-center"><img class="img-thumbnail"  src="'.$image.'" style="width:80px;height:100px;"></td>
							<td class="text-center">'.$masp.'</td>
							<td class="text-center">'.$tensp.'</td>
							<td class="text-center">'.strtoupper($thuonghieu).'</td>
							<td class="text-center">'.$slton.'</td>
							<td class="text-center">'.number_format($dongia,'0','.','.').'đ</td>
							<td class="text-center">
								<button class="btn btn-success btn-sm">
									<i class="fa fa-edit">
										<a style="color: white" href="suasp.php?masp='.$row[1].'">Sửa</a>
									</i>
								</button>
								</button>
							</td> 
						</tr>';
				}
			?>
			<?php
					// dem so mau tin co trong CSDL
					$sql   = "SELECT COUNT(*) AS numrows FROM sanpham";
					// $result = DataProvider::executeQuery($sql);
					$result = mysqli_query($conn, $sql);
					$row     = mysqli_fetch_array($result,MYSQLI_ASSOC);
					$numrows = $row['numrows'];

					// tinh tong so trang se hien thi
					$maxPage = ceil($numrows/8);

					// hien thi lien ket den tung trang
					$self = "index.php?action=quanlysp";
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
		?>
		</tbody>
	</table>