
<!DOCTYPE>
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
		<div class="login">
			<div class="info">
				<form method="post" action="">
					<input type="text" name="txt1" style="margin-left: 100px;margin-right: 100px;width: 250px; height: 40px; margin-top: 50px;" placeholder="نام" required>
					<input type="text" name="txt2" style="margin-left: 100px;margin-right: 100px;width: 250px; height: 40px; margin-top: 30px;" placeholder="شماره ملی" maxlength="10" required>
					<input type="submit" name="sub" style="margin-left: 150px;margin-right: 150px;width: 150px; height: 40px; margin-top: 30px;" value="ورود">
				</form>
				<?php
				session_start();
				if(isset($_POST['sub']))
				{
					$flag=false;
					$link=mysqli_connect("localhost","root","","lokomotive");
					if($link)
					{
						mysqli_query($link,"SET CHARACTER SET utf8");
						$query="CALL get_passenger()";
						if($result=mysqli_query($link,$query))
						{
							if(mysqli_num_rows($result)>0)
							{
								while($row=mysqli_fetch_assoc($result))
								{
									if($_POST['txt1']==$row['Name'] && $_POST['txt2']==$row['national_code'])
									{
										
										$flag=true;
										$_SESSION['name']=$row['Name'];
										$_SESSION['L_name']=$row['L_name'];
										$_SESSION['n_code']=$_POST['txt2'];
										break;
									}
								}
							}
						}
						if($flag===true)
						{
						?>
						<script>
							location.replace("passenger.php");
						</script>
						<?php
						}
						else if($flag===false)
						{
							echo('<p style="font-family: Calibri; font-size: 28px; color: #F80307;" align="center">نام یا کد ملی شما اشتباه است </p>');
						}
					}
				}
				?>
			</div>
	    </div>
	</body>
</html>