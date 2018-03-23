<?php
$to = "skylinelabs.tech@gmail.com, jaylohokare@gmail.com";
$noReply = "skylinelabs.tech@gmail.com";
$from = $_POST['email'];
$name = $_POST['name'];
$text = $_POST['message'];
$phone = $_POST['phone'];
$subject = "Skyline Labs Contact Form";
$subject2 = "Thank you for contacting Skyline Labs!";

if (!$name == "" && !$name == null)
	{
	if (filter_var($from, FILTER_VALIDATE_EMAIL))
		{
		$phone = preg_replace('/[^0-9]/', '', $_POST['phone']);
		if (!$text == "" && !$text == null)
			{
			$message = $name . " " . " contacted you." . "\n\n" . "Following is the message received : " . "\n" . $_POST['message'] . "\n\n" . "Phone number :" . $phone;
			$message2 = "Thank you for contacting Skyline Labs. Here is a copy of your message " . "\n\nName : " . $name . "\nMessage : " . $_POST['message'] . "\n" . "Contact number : " . $phone . "\n\n" . "We will get back to you soon!" . "\n\n - Team Skyline Labs";
			$headers = "From:" . $from;
			$headers2 = "From:" . $noReply;
			mail($to, $subject, $message, $headers);
			mail($from, $subject2, $message2, $headers2); ?>

<html lang="en">
<head>
<title>Contact | Skyline Labs</title>
<meta name="msapplication-TileColor" content="#4CAF50">
<meta name="msapplication-TileImage" content="logo/ms-icon-144x144.png">
<meta name="theme-color" content="#4CAF50">
<link rel="shortcut icon" type="image/x-icon" href="logo/ms-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" href="logo/ms-icon-144x144.png">
<link rel="icon" sizes="192x192" href="logo/android-icon-192x192.png">
<meta name="author" content="Vinit Varu">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=false" />
<meta name="viewport" content="user-scalable=no" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="apple-mobile-web-app-capable" content="yes" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
</head>
<body class="green lighten-2">
<div class="center flow-text white-text center-align" style="top:45vh;position:relative">
Message sent. Redirecting to home page...
</div>
<script>setTimeout(function(){window.location.href="http://www.skylinelabs.in/"},3000);</script>
</body>
</html>
<?php }else{?>
<html lang="en">
<head>
<title>Failed | Contact | Skyline Labs</title>
<meta name="msapplication-TileColor" content="#F44336">
<meta name="msapplication-TileImage" content="logo/ms-icon-144x144.png">
<meta name="theme-color" content="#F44336">
<link rel="shortcut icon" type="image/x-icon" href="logo/ms-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" href="logo/ms-icon-144x144.png">
<link rel="icon" sizes="192x192" href="logo/android-icon-192x192.png">
<meta name="author" content="Vinit Varu">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=false" />
<meta name="viewport" content="user-scalable=no" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="apple-mobile-web-app-capable" content="yes" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
</head>
<body class="red lighten-2">
<div class="center flow-text white-text center-align" style="top:45vh;position:relative">
Message cant be empty. Please try again.
</div>
</body>
</html>
<?php }}else{?>
<html lang="en">
<head>
<title>Failed | Contact | Skyline Labs</title>
<meta name="msapplication-TileColor" content="#F44336">
<meta name="msapplication-TileImage" content="logo/ms-icon-144x144.png">
<meta name="theme-color" content="#F44336">
<link rel="shortcut icon" type="image/x-icon" href="logo/ms-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" href="logo/ms-icon-144x144.png">
<link rel="icon" sizes="192x192" href="logo/android-icon-192x192.png">
<meta name="author" content="Nexar technologies Pvt Ltd">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=false" />
<meta name="viewport" content="user-scalable=no" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="apple-mobile-web-app-capable" content="yes" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
</head>
<body class="red lighten-2">
<div class="center flow-text white-text center-align" style="top:45vh;position:relative">
Invalid email ID. Please try again.
</div>
</body>
</html>
<?php }}else{?>
<html lang="en">
<head>
<title>Failed | Contact | Skyline Labs</title>
<meta name="msapplication-TileColor" content="#F44336">
<meta name="msapplication-TileImage" content="logo/ms-icon-144x144.png">
<meta name="theme-color" content="#F44336">
<link rel="shortcut icon" type="image/x-icon" href="logo/ms-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" href="logo/ms-icon-144x144.png">
<link rel="icon" sizes="192x192" href="logo/ms-icon-144x144.png">
<meta name="author" content="Vinit Varu">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=false" />
<meta name="viewport" content="user-scalable=no" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="apple-mobile-web-app-capable" content="yes" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
</head>
<body class="red lighten-2">
<div class="center flow-text white-text center-align" style="top:45vh;position:relative">
Name cant be empty. Please try again.
</div>
</body>
</html>
<?php }?>