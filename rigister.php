<?php
session_start();
?>
<!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8">
		<title>reserv page</title>
		<link rel="stylesheet" href="style_sheet.css">
		<style>
			
		</style>
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
			<form method="post" action="">
				<input type="text" name="txt_name" class="txt_name" placeholder="نام" required>
				<input type="text" name="txt_lastname" class="txt_name" placeholder="نام خانوادگی" required>
				<input type="text" name="nation_num" class="txt_name" placeholder="شماره ملی" required maxlength="10" >
				<input type="text" name="Age" class="txt_name" placeholder="سن" required>
				<input type="submit" name="sub" class="txt_name" value="ثبت نام " style="width: 200px; margin-left: 100px; margin-right: 100px;">
			</form>
			<br>
			<?php
				if(isset($_POST["sub"]))
				{
					$link=mysqli_connect("localhost","root","","lokomotive");
					if($link)
					{
						mysqli_query($link,"SET CHARACTER SET utf8");
						$query="CALL INSERT_passenger(".$_POST['Age'].",'".$_POST['txt_name']."','".$_POST['txt_lastname']."','".$_POST['nation_num']."')";
						$query3="CALL national_code()";
						$flag=true;
						$link1=mysqli_connect("localhost","root","","lokomotive");
						if($result=mysqli_query($link1,$query3))
						{
							if(mysqli_num_rows($result)>0)
							{
								while($row=mysqli_fetch_assoc($result))
								{
									if($row['national_code']==$_POST['nation_num'])
									{
										$flag=false;
									}
								}
							}
						}
						if($flag===true)
						{
							if(mysqli_query($link,$query))
							{
								echo('<p align="center" style="font-family: Calibri;font-size: 30px;">'.$_POST['txt_name'].' '.$_POST['txt_lastname'].' ثبت نام شما با موفقیت انجام شد</p>');
							}
						}
						else
						{
							echo('<p align="center" style="font-family: Calibri;font-size: 30px;">'.$_POST['txt_name'].' '.$_POST['txt_lastname'].' شما قبلا ثبت نام کردی</p>');
						}
						mysqli_close($link1);
					}
					mysqli_close($link);
				}
			?>
	</body>
</html>
