
<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("788035535454-s9rv3a1hqvvhguscabilqsd2i9c682ra.apps.googleusercontent.com");
	$gClient->setClientSecret("62ZnkBJEooRHSe9mX4WUeDCd");
	$gClient->setApplicationName("CMRIT LOGIN");
	$gClient->setRedirectUri("http://localhost/cmritportal/login/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>

