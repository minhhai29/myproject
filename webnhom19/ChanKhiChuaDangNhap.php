<?php
	if (!isset($_SESSION['member'])) 
	{
		?>
		<script type="text/javascript">
			var yes = confirm('Bạn ko thể vào trang này vì chưa đăng nhập admin? Bạn có muốn đăng nhập ko?');	
			if(yes)
			{
				location = 'dang-nhap.php';
			}
			else
			{
				location = 'index.php';
			}
		</script>
		<?php
	}
?>