<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>w3coderschool - Thank you for subscribing</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
</head>

<body style="margin: 0;">
	<div>
		<table width="100%" height="100%" style="margin: 0 auto; table-layout: fixed; background: #F2F4F5;" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td style="padding: 15px; box-sizing: border-box; vertical-align: top; padding-bottom: 50px;	">
						<table width="100%" style="width: 600px; margin: 0 auto;" cellpadding="0" cellspacing="0">
							<tr>
								<td style="padding: 35px 15px 55px 15px; box-sizing: border-box; vertical-align: top; background-color: #fff; border: 1px solid #D8D8D8; border-radius: 8px;">
									<div style="text-align: center; padding-bottom: 12px; padding-top:12px; background-color:aliceblue; border-radius:10px">
										<img src="{{ asset('email-assets/w3coderschool-logo-email.png') }}" style="max-width: 100px;" alt="w3coderschool subscriber">
									</div>
									<h3 style="font-family: 'Open Sans', sans-serif; font-weight: 400; font-size: 24px; color: #383838; text-align:center; margin-top: 5px;"> Thank You For <br><span style="font-weight: 600;">Subscribing</span></h3>
									<div style="padding: 10px 50px;">
										<h4 style="font-family: 'Open Sans', sans-serif; font-weight: 600; font-size: 18px; line-height: 25px; color: #616161; margin-top: 0; margin-bottom: 20px;text-align:center">Hey <span>{{ $msg['email'] }}</span>,</h4>
										<p style="font-family: 'Open Sans', sans-serif; font-weight: 400; font-size: 16px; line-height:  22px; margin-top: 0; color: #000;text-align:center">Thank you for subscribing to our newsletter of <a href="https://www.w3coderschool.com/">w3coderschool.com</a>!</p>
									</div>
									<div style="text-align: center; padding-top: 10px; max-width: 375px; margin: 0 auto; padding-bottom: 5px;">
										<div style="margin-bottom: 16px;">
                                                <img src="{{ asset('email-assets/thankyou.png') }}" style="max-width: 100%; border-radius: 8px;" alt="Post Image">
										</div>
										<p style="font-family: 'Open Sans', sans-serif; font-weight: 400; color: #616161; font-size: 15px; line-height: 21px;margin-bottom:15px">By subscribing to our newsletter, you will receive notifications about recent articles, tutorials, snippets, blogs, and much more.</p>
                                            <p style="font-family: 'Open Sans', sans-serif; font-weight: 400; color: #616161; font-size: 15px; line-height: 21px;">Thank you for choosing w3coderschool as your source for all things tech. We're excited to embark on this knowledge journey with you!</p>
									</div>
									<div style="text-align: center; margin-top: 20px;"> 
										<a target="_blank" href="https://www.facebook.com/w3coderschool/"><img src="{{ asset('email-assets/fb.png') }}" alt="fb"></a>&nbsp;&nbsp;
										<a target="_blank" href="https://www.instagram.com/w3coderschool/"><img src="{{ asset('email-assets/insta.png') }}" alt="insta"></a>&nbsp;&nbsp;
										<a target="_blank" href="https://in.pinterest.com/w3coderschool/"><img src="{{ asset('email-assets/pin.png') }}" alt="Pinterest"></a>&nbsp;&nbsp;
										{{-- <a target="_blank" href="https://www.apkfiles.com/apk-608925/w3coderschool"><img src="{{ asset('email-assets/store.png') }}" alt="App"></a>&nbsp;&nbsp; --}}
									</div>
									<div style="text-align: center; margin-top: 20px;">
										<a href="https://www.w3coderschool.com/" style="font-family: 'Open Sans', sans-serif; font-weight: 700; font-size: 16px; line-height:  22px; color: #fff; text-decoration: none; display:  inline-block; padding:  14px 50px; text-align:center; background: linear-gradient(110.01deg, #0004ff 1.85%, #00ff22 99.65%); box-sizing: border-box; border-radius: 5px;">Start Learning</a>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<p style="font-family: 'Open Sans', sans-serif; font-weight: 400; font-size: 13px; line-height: 18px; color: #7C96A4; padding:  15px; text-align:center; margin-top: 20px;">© <?php echo date("Y"); ?> w3coderschool</p>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>

</html>
