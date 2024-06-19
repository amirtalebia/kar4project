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
			<?php
			session_start();
			echo('<p style="margin-top: 0px;font-family: Calibri;font-size: 28px;" dir="rtl" align="center">'.$_SESSION['name'].' '.$_SESSION['L_name'].'</p>');
			?>
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
			$link1=mysqli_connect("localhost","root","","lokomotive");
			mysqli_query($link,"SET CHARACTER SET utf8");
			//$query="CALL ticket_pas('3325465433')";
			$query="CALL ticket_pas('".$_SESSION['n_code']."')";
			if($result=mysqli_query($link,$query))
			{
				if(mysqli_num_rows($result)>0)
				{
					$i=0;
					while(($row=mysqli_fetch_assoc($result)))
					{
						mysqli_query($link1,"SET CHARACTER SET utf8");
						$query1="CALL get_name_lokomotive(".$row['Lokomotive_id'].");";
						if($result1=mysqli_query($link1,$query1))
						{
							$row_1=mysqli_fetch_array($result1);
							mysqli_query($link1,"SET CHARACTER SET utf8");
							$k=205+($i*280);
							$k1=305+($i*280);
							echo '<div style="height: 250px;
							margin-left: 30px;
							margin-right: 30px;
							background: #F9F4F4;
							border-radius: 18px;
							margin-top: 30px;">
							<img src="picture/'.$row['Lokomotive_id'].'.jpg" style="width: 200px;
							margin-top: 25px;
							margin-bottom: 25px;
							margin-left: 30px;
							height: 200px;">
							<form method="post" action="reserv_page.php">
							<input type="text" name="txt_orgin" value="'.$row['ticket_orgin'].'" style="position: absolute; top:'.$k .'px; 	right: '. 60 .'px;text-align: center;">
							<input type="text" name="txt_des" value="'.$row['ticket_destination'].'" style="position: absolute; top:'. $k.'px; right:'. 260 .'px;">
							<input type="text" name="txt_date" value="'.$row['ticket_Date'].'" style="position: absolute; top:'. $k .'px; right:'. 460 .'px;text-align: center;">
							<input type="text" name="txt_price" value="'.$row['ticket_price'].'" style="position: absolute; top:'. $k .'px; right:'. 660 .'px;text-align: center;">
							<input type="text" name="txt_orgin" value="'.$row_1['lokomotive_name'].'" style="position: absolute; top:'. $k .'px; right:'. 860 .'px;">
							</form>
							</div>';
							$i++;
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