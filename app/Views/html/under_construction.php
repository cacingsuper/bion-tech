
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Coming Soon 8</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="https://colorlib.com/etc/cs/comingsoon_08/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/cs/comingsoon_08/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/cs/comingsoon_08/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/cs/comingsoon_08/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/cs/comingsoon_08/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/cs/comingsoon_08/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/cs/comingsoon_08/css/util.css">
	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/cs/comingsoon_08/css/main.css">
<!--===============================================================================================-->
<meta name="robots" content="noindex, follow">
</head>
<body>
	
	
	<div class="bg-img1 overlay1 size1 flex-w flex-c-m p-t-55 p-b-55 p-l-15 p-r-15" style="background-image: url('images/bg01.jpg');">
		<div class="wsize1">
			<p class="txt-center p-b-23">
				<i class="zmdi zmdi-card-giftcard cl0 fs-60"></i>
			</p>

			<h3 class="l1-txt1 txt-center p-b-22">
				Coming Soon
			</h3>

			<p class="txt-center m2-txt1 p-b-67">
				Our website is under construction, follow us for update now!
			</p>

			<div class="flex-w flex-sa-m cd100 bor1 p-t-42 p-b-22 p-l-50 p-r-50 respon1">
				<div class="flex-col-c-m wsize2 m-b-20">
					<span class="l1-txt2 p-b-4 days">35</span>
					<span class="m2-txt2">Days</span>
				</div>

				<span class="l1-txt2 p-b-22">:</span>
				
				<div class="flex-col-c-m wsize2 m-b-20">
					<span class="l1-txt2 p-b-4 hours">17</span>
					<span class="m2-txt2">Hours</span>
				</div>

				<span class="l1-txt2 p-b-22 respon2">:</span>

				<div class="flex-col-c-m wsize2 m-b-20">
					<span class="l1-txt2 p-b-4 minutes">50</span>
					<span class="m2-txt2">Minutes</span>
				</div>

				<span class="l1-txt2 p-b-22">:</span>

				<div class="flex-col-c-m wsize2 m-b-20">
					<span class="l1-txt2 p-b-4 seconds">39</span>
					<span class="m2-txt2">Seconds</span>
				</div>
			</div>

			<form class="flex-w flex-c-m contact100-form validate-form p-t-70">
				<div class="wrap-input100 validate-input where1" data-validate = "Email is required: ex@abc.xyz">
					<input class="s1-txt1 placeholder0 input100" type="text" name="email" placeholder="Email Address">
					<span class="focus-input100"></span>
				</div>

				<button class="flex-c-m s1-txt1 size2 how-btn trans-04 where1">
					Notify Me
				</button>
			</form>			
		</div>
	</div>



	

<!--===============================================================================================-->	
	<script src="https://colorlib.com/etc/cs/comingsoon_08/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="https://colorlib.com/etc/cs/comingsoon_08/vendor/bootstrap/js/popper.js"></script>
	<script src="https://colorlib.com/etc/cs/comingsoon_08/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="https://colorlib.com/etc/cs/comingsoon_08/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="https://colorlib.com/etc/cs/comingsoon_08/vendor/countdowntime/moment.min.js"></script>
	<script src="https://colorlib.com/etc/cs/comingsoon_08/vendor/countdowntime/moment-timezone.min.js"></script>
	<script src="https://colorlib.com/etc/cs/comingsoon_08/vendor/countdowntime/moment-timezone-with-data.min.js"></script>
	<script src="https://colorlib.com/etc/cs/comingsoon_08/vendor/countdowntime/countdowntime.js"></script>
	<?php
	    $datetime1 = date_create(date("Y-m-d"));
		$datetime2 = date_create('2021-06-20');
	
		$interval = date_diff($datetime1, $datetime2);
	
		$total = $interval->format('%a');
	?>
	<script>
		$('.cd100').countdown100({
			/*Set Endtime here*/
			/*Endtime must be > current time*/
			endtimeYear: 0,
			endtimeMonth: 0,
			endtimeDate: <?= $total ?>,
			endtimeHours: 0,
			endtimeMinutes: 0,
			endtimeSeconds: 0,
			timeZone: "" 
			// ex:  timeZone: "America/New_York"
			//go to " http://momentjs.com/timezone/ " to get timezone
		});
	</script>
<!--===============================================================================================-->
	<script src="https://colorlib.com/etc/cs/comingsoon_08/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="https://colorlib.com/etc/cs/comingsoon_08js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"6612f2679ef117b3","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.5.2","si":10}'></script>
</body>
</html>