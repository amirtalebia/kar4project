<html>
	<head>
		<meta charset="utf-8">
		<title>Ticket page</title>
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
				<input type="button" class="btn_e" value="اضافه کردن قطار" onClick="Add_trian()">
			</form>
		</div>
		<script src="project.js"></script>
		<div class="Add">
			<div class="add_t">
				<form method="post" action="">
					<input type="text" name="txt_org" placeholder="مبدا" style="margin-top: 20px; margin-right: 100px; margin-left: 100px; width: 250px; height: 40px;" required>
					<input type="text" name="txt_des" placeholder="مقصد" required style="margin-top: 20px; margin-right: 100px; margin-left: 100px; width: 250px; height: 40px;">
					<input type="Date" name="date_1" required style="margin-top: 20px; margin-right: 100px; margin-left: 100px; width: 250px; height: 40px;"placeholder="تاریخ سفر" onfocus="(this.type='date')" onblur="this.type = 'تاریخ سفر'">
					<input type="number" name="txt_num" placeholder="تعداد" required style="margin-top: 20px; margin-right: 100px; margin-left: 100px; width: 250px; height: 40px;">
					<input type="text" name="txt_prc" placeholder="قیمت (به تومان)" required style="margin-top: 20px; margin-right: 100px; margin-left: 100px; width: 250px; height: 40px;">
					<input type="text" name="txt_lid" placeholder="آیدی قطار" required style="margin-top: 20px; margin-right: 100px; margin-left: 100px; width: 250px; height: 40px;">
					<input type="submit" name="sub" value="اضافه کردن" required style="margin-top: 20px; margin-right: 150px; margin-left: 150px; width: 150px; height: 40px;">
				</form>
				<?php
				if(isset($_POST['sub']))
				{
					$link=mysqli_connect("localhost","root","","lokomotive");
					if($link)
					{
						mysqli_query($link,"SET CHARACTER SET utf8");
						$query="CALL INSERT_ticket(".$_POST['txt_prc'].", '".$_POST['date_1']."', '".$_POST['txt_org']."', '".$_POST['txt_des']."', '".$_POST['txt_lid']."', '".$_POST['txt_num']."')";
						if(mysqli_query($link,$query))
						{
							echo('<p style="margin-top: 5px; font-family: Calibri;font-size: 25px;color: #000000" align="center">بلیط با موفقیت اضافه شد</p>');
						}
					}
				}
				
				?>
			</div>
		</div>
	</body>
</html>