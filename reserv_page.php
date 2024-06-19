<?php
session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>reserv page</title>
		<link rel="stylesheet" href="style_sheet.css">
	</head>
	<body>
		<div class="div2">
			<p dir="rtl" id="font">
				<b>شرکت حمل و نقل ریلی</b>
			</p>
			<div id="div_img">
			</div>
			<form>
				<input type="button" class="btn_h" name="btn_home" value="خانه" onClick="Home()">
				<input type="button" class="btn_r" name="btn_rgs" value="ثبت نام" onClick="rigister()">
				<input type="button" class="btn_A" name="btn_About" value="درباره ما" onClick="btn_about()">
				<input type="button" class="btn_g" name="btn_Login" value="ورود" onClick="login()">
			</form>
		</div>
		<script src="project.js"></script>
		<div class="reserv">
			<form method="post" action="final.php">
				<input type="text" name="txt_name" class="txt_name" placeholder="نام" required>
				<input type="text" name="txt_lastname" class="txt_name" placeholder="نام خانوادگی" required>
				<input type="text" name="nation_num" class="txt_name" placeholder="شماره ملی" required maxlength="10">
				<input type="text" name="Age" class="txt_name" placeholder="سن" required>
				<input type="submit" name="sub" class="txt_name" value="تکمیل خرید" style="width: 200px; margin-left: 100px; margin-right: 100px;">
			</form>
			<?php
			$_SESSION['ticket_id']=$_POST['h_id'];
			$num=0;
			$link=mysqli_connect("localhost","root","","lokomotive");
			if($link)
			{
				$query="CALL get_price(".$_POST['h_id'].")";
				if($result=mysqli_query($link,$query))
				{
					$row=mysqli_fetch_assoc($result);
					$num=$_POST['txt_price']/$row['ticket_price'];
				}
			}
			$_SESSION['quantity']=$num;
			?>
		</div>
	</body>
	
</html>