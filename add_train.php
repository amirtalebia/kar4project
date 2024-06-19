<html>
	<head>
		<meta charset="utf-8">
		<title>Ticket page</title>
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
		<div class="add_train">
			<div class="add_tr">
				<form method="post" action="" enctype="multipart/form-data">
					<input type="text" name="train_id" placeholder="شماره قطار" style="margin-top: 20px; margin-right: 100px; margin-left: 100px; width: 250px; height: 40px;" required>
					<input type="text" name="train_name" placeholder="نام قطار" required style="margin-top: 20px; margin-right: 100px; margin-left: 100px; width: 250px; height: 40px;">
					<input type="file" name="file1" class="custom-file-input" required >
					<input type="submit" name="sub" value="اضافه کردن" required style="margin-top: 20px; margin-right: 150px; margin-left: 150px; width: 150px; height: 40px;">
				</form>
				<?php
				if(isset($_POST['sub']))
				{
					$flag=true;
					$link=mysqli_connect("localhost","root","","lokomotive");
					if($link)
					{ 
						mysqli_query($link,"SET CHARACTER SET utf8");
						$query="CALL get_train_id()";
						if($result=mysqli_query($link,$query))
						{
							if(mysqli_num_rows($result)>0)
							{
								while($row=mysqli_fetch_assoc($result))
								{
									if($row['Lokomotive_id']==$_POST['train_id'])
									{
										echo('<p style="font-family: Calibri;font-size: 25px; color: #F10A0E" align="center">شماره قطار تکراری هست</p>');
										$flag=false;
										break;
									}
								}
							}
						}
						if($flag===true)
						{
							$check=getimagesize($_FILES['file1']['tmp_name']);
							if($check!==false)
							{
								$m="picture\\".$_POST['train_id'].".jpg";
								if(move_uploaded_file($_FILES['file1']['tmp_name'],$m))
								{
									$link1=mysqli_connect("localhost","root","","lokomotive");
									if($link1)
									{
										mysqli_query($link1,"SET CHARACTER SET utf8");
										$query1="CALL insert_train(".$_POST['train_id'].",'".$_POST['train_name']."')";
										if(mysqli_query($link1,$query1))
										{
											echo('<p style="font-family: Calibri;font-size: 25px; color: #F10A0E" align="center">قطار با موفقیت اضافه شد</p>');
										}
									}
								}
							}
							else
							{
								echo('<p style="font-family: Calibri;font-size: 25px; color: #F10A0E" align="center">فایل از نوع تصویری باشد</p>');
							}
						}
					}
					mysqli_close($link);
				}
				?>
			</div>
		</div>
	</body>
</html>