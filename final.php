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
				<input type="button" class="btn_g" name="btn_Login" value="ورود" onclick="login()">
			</form>
		</div>
		<script src="project.js"></script>
		<?php
		$link=mysqli_connect("localhost","root","","lokomotive");
		if($link)
		{
			mysqli_query($link,"SET CHARACTER SET utf8");
			$link1=mysqli_connect("localhost","root","","lokomotive");
			$link2=mysqli_connect("localhost","root","","lokomotive");
			$query="CALL INSERT_passenger(".$_POST['Age'].",'".$_POST['txt_name']."','".$_POST['txt_lastname']."','".$_POST['nation_num']."')";
			$query1="CALL UPDATE_quantity(".$_SESSION['quantity'].",".$_SESSION['ticket_id'].")";
			$query3="CALL national_code()";
			$flag=true;
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
			$id=0;
			if(mysqli_query($link,$query1))
			{
				if($flag===true)
				{
					mysqli_query($link,$query);
				}
				$query4="CALL get_id_passenger('".$_POST['nation_num']."')";
				if($result2=mysqli_query($link2,$query4))
				{
					$row1=mysqli_fetch_assoc($result2);
					$id=$row1['passenger_id'];
				}
				$query2="CALL INSERT_order(".$_SESSION['ticket_id'].",".$id.")";
				if(mysqli_query($link,$query2))
				{
					echo('<br><BR><br><br><br>
		<p style="font-family: Calibri; font-size: 32px; text-align: center;">خرید شما تکمیل شد. با تشکر</p>');
				}
			}
			mysqli_close($link);
			mysqli_close($link1);
		}
		?>
	</body>
</html>