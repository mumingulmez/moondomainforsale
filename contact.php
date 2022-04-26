<?php
/*
Script Name: Moon Domain For Sale Script
Script URI: https://github.com/mumingulmez/moondomainforsale
Description: A ready-to-use script on all your sites with just a few key settings.
Version: 1.0.13
Author: Mümin Gülmez
Author URI: http://mumin.us
License: Creative Commons Zero v1.0 Universal
License URI: https://creativecommons.org/publicdomain/zero/1.0/
Please check the settings.php file for the installation.
*/

require('settings.php');

if(isset($_POST['g-recaptcha-response'])){
  $captcha=$_POST['g-recaptcha-response'];
}
if(!$captcha){
  echo '<h2>Hata!</h2>';
  exit;
}
$ip = $_SERVER['REMOTE_ADDR'];
$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
$responseKeys = json_decode($response,true);
if(intval($responseKeys["success"]) !== 1) {
  echo '<h2>Spam? ! Tekrar kontrol etmelisin.</h2>';
} else {

$domain = $_SERVER['SERVER_NAME'];
$domain = str_replace("www.", "", $domain );
	if (isset($_POST['email'])) {

		// EDIT THE 2 LINES BELOW AS REQUIRED
		$email_subject = "Domain Fiyat Teklifi - ".$domain;


		$name = $_POST['name']; // required
		$email_from = $_POST['email']; // required
		$telephone = $_POST['phone']; // not required
		$price = $_POST['price']; // not required
		$comments = $_POST['comments']; // required


		$email_message = "Teklif gelen domain: ".$domain."\n\n";

		function clean_string($string) {
				$bad = array("content-type", "bcc:", "to:", "cc:", "href");
				return str_replace($bad, "", $string);
		}

		$email_message .= "İsim: " . clean_string($name) . "\n";
		$email_message .= "E-posta: " . clean_string($email_from) . "\n";
		$email_message .= "Telefon: " . clean_string($telephone) . "\n";
		$email_message .= "Teklif (".$currency."): " . clean_string($price) . "\n";
		$email_message .= "Mesaj: " . clean_string($comments) . "\n";

		// create email headers
		$headers = 'From: ' . $email_from . "\r\n" .
						'Reply-To: ' . $email_from . "\r\n" .
						'X-Mailer: PHP/' . phpversion();
		@mail($email_to, $email_subject, $email_message, $headers);

?>
<!DOCTYPE html>
<html lang="en">
		<head>
				<meta charset="utf-8">
				<title><?php echo $domain; ?> Teklif Gönderildi | Offer Send</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
				<link href="https://fonts.googleapis.com/css?family=Mukta+Mahee:300,700" rel="stylesheet">
				<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
				<link rel="stylesheet" href="css/style.css" />
				<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
		</head>
		<body>
			<section class="bg-alt hero p-0">
				<div class="container-fluid">
					<div class="row">
							<div class="bg-faded col-sm-6 text-center col-fixed">
									<div class="vMiddle">
										<h1 class="pt-4 h2">
											<span>Teklifiniz için teşekkürler, en kısa sürede size geri döneceğiz.<br><i>Thank you for the offer, we will contact you as soon as possible.</i></span>
										</h1>
										<div class="row d-md-flex text-center justify-content-center text-primary action-icons">
											<div class="col-sm-4" style="display:none;">
												<p><em class="ion-ios-telephone-outline icon-md"></em></p>
												<p class="lead"><a href="tel:+[Your Phone]">+[Your Phone]</a></p>
											</div>
											<div class="col-sm-4">
												<p><em class="ion-ios-chatbubble-outline icon-md"></em></p>
												<p class="lead"><a href="mailto:info@<?php echo $domain; ?>">info@<?php echo $domain; ?></a></p>
											</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 offset-sm-6 px-0">
									<section class="bg-alt">
											<div class="row height-100">
													<div class="col-sm-8 offset-sm-2 mt-2">
														<h1 class="pt-4 h2"><span class="text-green"><?php echo $domain; ?></span></h1>
														<span class="text-muted">Teklif Gönderildi | Offer Send</span>
														<br/>
														<a target="_blank" rel="nofollow" href="https://<?php echo $domain; ?>"><?php echo $domain; ?></a>
													</div>
											</div>
									</section>
							</div>
					</div>
				</div>
			</section>
		</body>
</html>
<?php } 

}
?>