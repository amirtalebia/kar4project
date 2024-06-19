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
			</form>
		</div>
		<script src="project.js"></script>
		
		<?php
		$link=mysqli_connect("localhost","root","","lokomotive");
		if($link)
		{
			mysqli_query($link,"SET CHARACTER SET utf8");
			$query="CALL ticket_select('".$_POST['txt1']."','".$_POST['txt2']."','".$_POST['date_1']."')";
			if($result=mysqli_query($link,$query))
			{
				if(mysqli_num_rows($result)>0)
				{
					$i=0;
					while(($row=mysqli_fetch_assoc($result)))
					{
						if($_POST['num_1']<=$row['quantity'])
						{
							$price=$_POST['num_1']*$row['ticket_price'];
							$link1=mysqli_connect("localhost","root","","lokomotive");
							mysqli_query($link1,"SET CHARACTER SET utf8");
							$query1="CALL get_name_lokomotive(".$row['lokomotive_id'].");";
							if($result1=mysqli_query($link1,$query1))
							{
								$row_1=mysqli_fetch_array($result1);
								$k=205+($i*280);
								$k1=305+($i*280);
								echo '<div style="height: 250px;
								margin-left: 30px;
								margin-right: 30px;
								background: #F9F4F4;
								border-radius: 18px;
								margin-top: 30px;">
								<img src="picture/'.$row['lokomotive_id'].'.jpg" style="width: 200px;
								margin-top: 25px;
								margin-bottom: 25px;
								margin-left: 30px;
								height: 200px;">
								<form method="post" action="reserv_page.php">
								<input type="text" name="txt_orgin" value="'.$_POST['txt1'].'" style="position: absolute; top:'.$k .'px; 	right: '. 60 .'px;text-align: center;">
								<input type="text" name="txt_des" value="'.$_POST['txt2'].'" style="position: absolute; top:'. $k.'px; right:'. 260 .'px;">
								<input type="text" name="txt_date" value="'.$_POST['date_1'].'" style="position: absolute; top:'. $k .'px; right:'. 460 .'px;text-align: center;">
								<input type="text" name="txt_price" value="'.$price.'" style="position: absolute; top:'. $k .'px; right:'. 660 .'px;text-align: center;">
								<input type="text" name="txt_orgin" value="'.$row_1['lokomotive_name'].'" style="position: absolute; top:'. $k .'px; right:'. 860 .'px;">
								<input type="submit" name="btn_buy" value="رزور بلیت" style="position: absolute; top:'. 	$k1 .'px; right: 880px; height: 50px; width: 170px;" class="btn_rese">
								<input type="text" name="h_id" value="'.$row['ticket_id'].'" style="position: absolute; top: '.$k1.';right: 200px; height: 40px; width: 40px;">
								</form>
								</div>';
								$i++;
								mysqli_close($link1);
							}
						}
					}
				}
				else
				{
					echo('<p style="font-family: Calibri ; font-size: 32px;" align="center">هیچ بلیطی موجود نیست</p>');
				}
			}
		}
		mysqli_close($link);
		?>
	</body>
	
</html>