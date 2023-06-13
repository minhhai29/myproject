<?php
	require 'DataProvider.php';
	$tl=0;
	if(!isset($_GET["theloai"]))  $table = "";
	else $tl = $_GET["theloai"];

	if(!isset($_GET["page"])) $page=1;
    else $page = $_GET["page"];
    
	include("formtknc.php");
	 if($tl == 1){
		echo'<h2 style="text-align: center; padding-top: 50px">Sản phẩm SAMSUNG</h2>';
        $table = "ss";
    }
    else if($tl == 2){
		echo'<h2 style="text-align: center; padding-top: 50px">Sản phẩm NOKIA</h2>';
        $table = "no";
    }
    else if($tl == 3){
		echo'<h2 style="text-align: center; padding-top: 50px">Sản phẩm IPHONE</h2>';
        $table = "ip";
    }
    else if($tl == 4){
		echo'<h2 style="text-align: center; padding-top: 50px">Sản phẩm SONY</h2>';
        $table = "so";
    }
	else if($tl == 5){
		echo'<h2 style="text-align: center; padding-top: 50px">Sản phẩm OPPO</h2>';
        $table = "op";
    }

	else{
		echo'<h2 style="text-align: center; padding-top: 50px">Sản Phẩm Nổi Bật</h2>';
		$table= "";
	}
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
	$sql = "SELECT * FROM sanpham WHERE MaLoaiSP LIKE '%".$table."%' ORDER BY DonGia DESC limit $offset,8";
	//$result = DataProvider::executeQuery($sql);
	$result= mysqli_query($conn, $sql);
	$i = 1;
	echo'
	<div class="container-fluid" style="padding-top: 50px">
	<div class="row" style="padding-left: 120px">
	';
	while ($row = mysqli_fetch_array($result) )
	{
						echo'<div class="product-box" id="sp'.$i.'">';
						  echo'<a href="detail-of-product" class="box">';
							echo'<div class="hinh-sp">';
							  echo'<a href="thong-tin-san-pham.php?id='.$row["MaSP"].'">';
							  echo'<img class="hinh" src="'.$row['Image'].'">';
							echo'</div>';
							  echo'<p class="ten-sp">'.$row['TenSP'].'</p>';
							  echo'<p class="gia-tien">'.number_format($row['DonGia']).'₫</p>'; 
							  echo'</a>';
							 echo'<div class="them-vao-gio-hang">';
							  echo'<button style="button" class="them" id="'.$row['MaSP'].'">';
								echo'Thêm'; 
								echo'<i class="fa fa-cart-plus"></i>';
							  echo'</button>';
							echo'</div>';
						echo'</div>';
						$i++;
						
					?>
					<script type="text/javascript">

                $(document).ready(function(){
                        $("#<?php echo $row['MaSP']; ?>").click(function(){
                            var id=$("#<?php echo $row['MaSP'];?>").attr("id");
                            $.ajax({
                                type:"POST",
                                url:"addcard.php",
                                data:{id : id},
                                cache:false,
                                success:function(result){
                                    alert("Sản phẩm đa được thêm vào giỏ hàng");
                                    window.location.reload();
                                }
                            });
                        });
                    });
                </script>
					<?php
				   }	
   // dem so mau tin co trong CSDL
					$sql   = "SELECT COUNT(*) AS numrows FROM sanpham WHERE MaLoaiSP LIKE '%".$table."%'";
					// $result = DataProvider::executeQuery($sql);
					$result = mysqli_query($conn, $sql);
					$row     = mysqli_fetch_array($result,MYSQLI_ASSOC);
					$numrows = $row['numrows'];

					// tinh tong so trang se hien thi
					$maxPage = ceil($numrows/8);

					// hien thi lien ket den tung trang
					
					$self = "index.php";
					
					$nav  = '';

					for($page = 1; $page <= $maxPage; $page++)
					{
					   if ($page == $pageNum)
					   {
						  if($page == 1)
						  {
							$nav .= " $page "; // khong can tao link cho trang hien hanh
							$page = $page +1;
							$nav .= " <a href=\"$self?theloai=".$tl."&page=".$page."\" class='so-trang'>$page</a> ";
						  }
						  else if($page == $maxPage)
						  {
							$page = $page -1;
							$nav .= " <a href=\"$self?theloai=".$tl."&page=".$page."\" class='so-trang'>$page</a> ";
							$page = $page +1;
							$nav .= " $page ";
						  }
						  else
						  {
							  $page = $page -1;
							$nav .= " <a href=\"$self?theloai=".$tl."&page=".$page."\" class='so-trang'>$page</a> ";
							$page = $page +1;
							$nav .= " $page "; // khong can tao link cho trang hien hanh
							$page = $page +1;
							$nav .= " <a href=\"$self?theloai=".$tl."&page=".$page."\" class='so-trang'>$page</a> ";
						  }
					   }
					  
					}

					// tao lien ket den trang truoc & trang sau, trang dau, trang cuoi
					if ($pageNum > 1)
					{
					   $page  = $pageNum - 1;
					   $prev  = " <a href=\"$self?theloai=".$tl."&page=".$page."\" class='so-trang'>&lt</a> ";

					   $first = " <a href=\"$self?theloai=".$tl."&page=1\" class='so-trang'>Trang đầu</a> ";
					}
					else
					{
					   $prev  = '&nbsp;'; // dang o trang 1, khong can in lien ket trang truoc
					   $first = '&nbsp;'; // va lien ket trang dau
					}

					if ($pageNum < $maxPage)
					{
					   $page = $pageNum + 1;
					   $next = " <a href=\"$self?theloai=".$tl."&page=".$page."\" class='so-trang'>&gt</a> ";

					   $last = " <a href=\"$self?theloai=".$tl."&page=".$maxPage."\" class='so-trang'>Trang cuối</a> ";
					}
					else
					{
					   $next = '&nbsp;'; // dang o trang cuoi, khong can in lien ket trang ke
					   $last = '&nbsp;'; // va lien ket trang cuoi
					}				   
?>