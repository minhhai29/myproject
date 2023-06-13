<?php
	if(isset($_GET["search"]))
	{
		include("timkiem.php");
	}
	else if(isset($_GET["dnloi"]))
	{
		include("thongbaoloi.php");
	}
	else if(isset($_GET["tu"]) && isset($_GET["den"]))
	{
		include("tknc.php");
	}
	else 
		if(isset($_GET["action"])) 
		{
			if($_GET["action"]== "giohang")
				include("gio-hang.php");
			if($_GET["action"]== "quanlyhd")
				include("quanlyhoadon.php");
			if($_GET["action"]== "chitiethd")
				include("dbchitiet.php");
			if($_GET["action"]== "quanlysp")
				include("quanlysp.php");
			if($_GET["action"]== "quanlyaccount")
				include("quanlyaccount.php");
			if($_GET["action"]== "tttk")
				include("thongtin.php");
			if($_GET["action"]== "suatt")
				include("suathongtin.php");
			if($_GET["action"]== "doimk")
				include("doipass.php");
		}
		else
		{
			include("main.php");
		}
	
?>