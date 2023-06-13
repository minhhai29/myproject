<?php
echo'
<center><form class="form-inline mx-5 my-lg-0" action ="index.php" method="get">
		<div>Giá từ: <input class="form-control mr-sm-2" type="text" placeholder="Nhập giá..." name="tu" id="giatu"></div>
		<div>Giá đến: <input class="form-control mr-sm-2" type="text" placeholder="Nhập giá..." name="den" id="giaden"></div>
		<div>&nbsp <input type="radio" name ="gia" value="giam">&nbsp Từ cao đến thấp</div>
		<div>&nbsp <input type="radio" name ="gia" value="tang">&nbsp Từ thấp đến cao </center></div>
		<center><label class="btn_link">Thương hiệu:</label> &nbsp <input type="radio" name ="theloai" value="samsung">&nbsp Samsung
		&nbsp <input type="radio" name ="theloai" value="nokia">&nbsp Nokia
		&nbsp <input type="radio" name ="theloai" value="iphone">&nbsp Iphone
		&nbsp <input type="radio" name ="theloai" value="sony">&nbsp Sony
		&nbsp <input type="radio" name ="theloai" value="oppo">&nbsp Oppo
		&nbsp <input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="Duyệt" onClick="return ktttkc();">
	</form></center>;'
?>