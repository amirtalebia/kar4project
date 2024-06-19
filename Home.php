<!DOCTYPE>
<html dir="rtl">
	<head>
		<meta charset="utf-8">
		<title>Login Page</title>
		<link rel="stylesheet" href="style_sheet.css">
		<style>

		</style>
	</head>
	<body> 
		<div class="div1">
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
					<input type="button" class="btn_e" value="ورود کارمند" onClick="Add_ticket()">
				</form>
			</div>
			<div class="div_ticekt">
				<form method="post" action="Ticket.php" enctype="multipart/form-data">
					<input class="op_1" type="text" name="txt1" placeholder="مبدا" required>
					<input class="op_2" type="text" name="txt2" placeholder="مقصد" required>
					<input class="op_3" type="date" name="date_1" required placeholder="تاریخ سفر" onfocus="(this.type='date')" onblur="this.type = 'تاریخ سفر'" >
					<input class="op_4" type="number" name="num_1" min="1" value="" placeholder="مسافر" required>
					<input type="submit" value="جستجو" name="search" class="btn_s">
				</form>
			</div>
			<div class="div_history">
				<img src="picture/history.jpg" class="div_h_p1">
				<img src="picture/passenger.jpg" class="div_h_p2">
				<img src="picture/employ.jpg" class="div_h_p3">
			</div>
			<div class="div_t" dir="rtl">
			    <p><h1>   &nbsp; &nbsp; &nbsp; شرکت شهید رجایی </h1></p>
				<p>&nbsp;&nbsp;این شرکت در مرداد ماه سال 1400 توسط گروهی بنیان گذاشته شد .
			این شرکت در راستای سهولت در رفت آمد ها و خرید بلیط
			از فروش بلیط اینترنتی هست استفاده میکند. 
			مشتریان با مراجعه به سایت های مربوط می توانند این بلیط ها را
			تهید کنند.</p>
				<p>&nbsp;&nbsp;در صورت مشکل در خرید آنلاین می توانید با شماره های مربوط تماس بگیرید
			یا به مسولین مربوط خبر دهید . همچنین می توانید با نصب اپلیکشن های مربوط این خرید را انجام دهید 		.</p>
				<p>&nbsp;&nbsp;این شرکت در تمام شهر های ایران شعبه دارد و میتوانید با مراجعه حضوری هم 
				بلیط های خوب را دریافت نمایید . 
				مبلغ بلیط ها کاملا مناسب همچنین این شرکت دارای قطار های بسیار با کیفیت
				 و تمیز می باشد . اعتماد شما سرمایه ماست . با تشکر از شما</p>
			</div>
		</div>
	
		
		<div class="div_footer">
			<div class="footer">
				
			<div class="row">
			<div class="footer-col">
  	 			<h4>شرکت رجا</h4>
  	 			<ul>
                    <li><a href="#">درباره ما</a></li>
                    <li><a href="#">چارت سازمانی</a></li>
                    <li><a href="#">جوایز</a></li>
                    <li><a href="#">سالنامه های رجا</a></li>
                    <li><a href="#">آگهی و فراخوان ها</a></li>
                    <li><a href="#">مناقضات و مزایدات</a></li>
  	 			</ul>
  	 		</div>
  	 		
			   <div class="footer-col">
  	 			<h4>پشتیبانی مشتریان</h4>
  	 			<ul>
                    <li><a href="#">ارتباط با ما</a></li>
                    <li><a href="#">سوالات متدوال</a></li>
                    <li><a href="#">سیاست حفظ حریم شخصی</a></li>
  	 			</ul>
  	 		</div>
			   <div class="footer-col">
  	 			<h4>سرویس و برنامه ها</h4>
  	 			<ul>
                    <li><a href="#">خرید بلیت</a></li>
                    <li><a href="#">حمل خودرو</a></li>
                    <li><a href="#">قطا گردشگری</a></li>
                    <li><a href="#">بلیت گروهی</a></li>
  	 			</ul>
  	 		</div>
			   <div class="footer-col">
  	 			<h4>باشگاه مسافران رجا</h4>
  	 			<ul>
                    <li><a href="#">ورود به باشگاه</a></li>
                    <li><a href="#">ثبت نام</a></li>
                    <li><a href="#">صفحه اصلی</a></li>
                    <li><a href="#">کسب امتیاز</a></li>
                    <li><a href="#">خرج امتیاز</a></li>
  	 			</ul>
  	 		</div>
			   <div class="footer-col">
  	 			<h4>ارتباط با ما</h4>
  	 			<ul>
					<li><a href="#"> شماره پیامک : 50001539 </a></li>
					<li><a href="#"> شماره تماس :02188310880 </a></li>
					<li><a href="#"> تهران-خیابان کریم خان زند- نبش خیابان سنایی </a></li>
					<li><a href="#"> پست الکترونیکی : info@raja.ir  </a></li>
					<li><a href="#">  تلفن مرکز ارتباط با مشتری : 1539 </a></li>
  	 			</ul>
  	 		</div>
			</div>
		</div>
	<script src="project.js"></script>
	</body>
	
</html>










