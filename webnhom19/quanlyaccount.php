
<script>
	function active_inactive_user(val, makhachhang){
			//alert(val);
			//alert("ẹhfdnk");
			$.ajax({
				type: 'post',
				url: 'change.php',
				data: {val:val, makhachhang:makhachhang},
				success:function(result)
				{
					//Hiển thị kết quả ra màn hình console
					//console.log(result); 
					if(result==1)
					{
						$('#sts'+makhachhang).html('Kích hoạt');
					}
					else
					{
						$('#sts'+makhachhang).html('Bị khóa');
					}
				}
			})
		}
	
</script>
<?php 
  //session_start();
    if(!isset($_SESSION["member"])){
      //header("Location:dang-nhap.php");
      header("location:index.php?dnloi");
  }
  else{
?>
<?php 
	// if (!isset($_SESSION['member'])) 
	// {
	// 	require 'ChanKhiChuaDangNhap.php';
	// }
	// require 'DataProvider.php';
	
	// if(!isset($_SESSION['member']) || ($quyen != "admin" && $quyen != "master"))
	// 	{
	// 		header("location:index.php?dnloi");
	//	}
	if(!isset($_GET["page"])) $page=1;
		else $page = $_GET["page"];

	if($page == "" || $page == "1")
    {
        $offset = 0;
    }
    else
    {
        $offset = ($page*6)-6;
    }
	$pageNum = 1;
	if(isset($_GET['page']))
	{
		$pageNum = $_GET['page'];
	}

	$sql = "SELECT * FROM user limit $offset,6";
	//$result = DataProvider::executeQuery($sql);
	$result= mysqli_query($conn, $sql);

	//Biến lấy QUyền để kiểm tra
    $sql1 = "SELECT Quyen FROM user WHERE UserName = '".$_SESSION['member']."' ";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($result1);
    ?>

		<h3><a href="themuser.php" style = "float:right;"> Thêm tài khoản </a></h3>
		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">Mã KH</th>
		      <th scope="col">Tên user</th>
		      <th scope="col">Email</th>
		      <th scope="col">Địa chỉ</th>
		      <th scope="col">Trạng thái</th>';
<?php
		      if($row1['Quyen'] == 'master')
		      {
		      	echo'<th scope="col">Quyền</th>';
		      }?>
		     <th scope="col">Xử lý</th>
		     <th scope="col">Lựa chọn</th>
			</tr>
	  	  </thead>
	    <tbody>
<?php
	while ($row = mysqli_fetch_assoc($result) )
	{
		echo '
			
				<tr>';
				//echo '<td scope="row">'.$i.'</td>';
				echo '<td>'.$row['MaKhachHang'].'</td>';
				echo '<td>'.$row['UserName'].'</td>';
				echo '<td>'.$row['Email'].'</td>';
				echo '<td>'.$row['DiaChi'].'</td>';
				echo '<td>';?>

					<?php 
						if($row['TrangThai'] == 1)
						{
							echo '<p id=sts'.$row['MaKhachHang'].'>Kích hoạt</p>';
						}
						else
							echo '<p id=sts'.$row['MaKhachHang'].'>Bị khóa</p>';
					?>

				<?php
				if($row1['Quyen'] == 'master')
			      {
			      	echo '<td>'.$row['Quyen'].'</td>';
			      }?>
				<td> 
					<?php
					//echo '<a href="xulyuser.php?loai=2&username='.$row['UserName'].'">Delete</a>
				echo '<a href="suauser.php?username=' . $row['UserName'] . '">Sửa</a> 
				' ?>
				</td>

				<td>
					
						<select onchange="active_inactive_user(this.value,'<?php echo $row['MaKhachHang']; ?>')">
							<option value="">Lựa chọn</option>
							<option value="1">Kích hoạt</option>
							<option value="0">Khóa</option>
						</select>
				</tr>
<?php	} ?>
			</tbody>
		</table>
						
	
	
	<?php	

   // dem so mau tin co trong CSDL
	$sql   = "SELECT COUNT(*) AS numrows FROM user";
					// $result = DataProvider::executeQuery($sql);
					$result = mysqli_query($conn, $sql);
					$row     = mysqli_fetch_array($result,MYSQLI_ASSOC);
					$numrows = $row['numrows'];

					// tinh tong so trang se hien thi
					$maxPage = ceil($numrows/6);

					// hien thi lien ket den tung trang
					
					$self = "index.php?action=quanlyaccount";
					
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
<?php }?>