<?php 
    $to = "skylinelabs.tech@gmail.com"; 
    $noReply = "noreply@skylinelabs.in"; 
	
        $from = $_GET['email']; 
	
        $fname = $_GET['first_name'];
	$lname = $_GET['last_name'];
	$name = $_GET['first_name']." ".$_GET['last_name'];


	
        $phone = $_GET['contact'];
	
	$year = $_GET['year'];
	$branch = $_GET['branch'];
	
	$skills = $_GET['Skills'];
	
	$experience = $_GET['experience'];
	$info = $_GET['self_info'];

        $subject = "Skyline Labs internship";
        $subject2 = "Skyline Labs internship";
	
	$message = $name . " " . " has applied for internship." . "\n\n" ."Following is the profile : \n\n"."\nYear : ". $year."\n". "Branch : ".$branch."\n"."Phone number :".$phone."\nEmail ID : ".$from."\n\n\nSkills :\n".$skills."\n\nExperience and courses :".$experience."\n\nMore about the applicant : ".$info;
	
	$message2 = "Hi ".$name . "!\n\n" . "We have received your application for internship at Skyline labs." . "\n\n" ."Following are the details we have received : "."\nYear : ". $year."\n". "Branch : ".$branch."\n"."Phone number :".$phone."\nEmail ID : ".$from."\nSkills :\n".$skills."\n\nExperience and courses :".$experience."\n\nMore about you : ".$info."\n\n\nWe will soon get back to you with the details of the task round. \nMore about the internship - The internship will start as soon as we check your submitted task (So submit it soon!), and will last for a span of around 6-8 weeks. You will be working on one of the many projects at skyline labs, as a part of our team. I assure you that you will find your journey with Skyline labs worth the time and efforts ! \n\nAs already mentioned, you may get an opportunity to continue to work with us beyond the internship, as a part of our team if your skills and work impress us!\n\nTo know more about Skyline labs, you can visit our website, browse through our projects, or visit our facebook page. \n\n\nThis is an auto-generated email. Please do not reply to this email. You can reach us at skylinelabs.tech@gmail.com\n\n\nWarm regards,\nJay Lohokare\nCEO, Chief Software architect,\nSkyline Labs\n+91 7710025773\njaylohokare@gmail.com\n\n";
	

	$headers = "From:" . $from;
	$headers2 = "From:" . $noReply;

if($from!=null && $from!="" && $from != " "){
					
	mail($to,$subject,$message,$headers);
	mail($from,$subject2,$message2,$headers2); 
      				
?>

<html lang="en">

						<head>
							<title>Skyline Labs</title>

							<meta name="msapplication-TileColor" content="#2196f3">
							<meta name="msapplication-TileImage" content="images/Logo/s_small.png">


							<meta name="theme-color" content="#2196f3">
							
							<link rel="shortcut icon" type="image/x-icon" href="images/Logo/s_small.png" />
							<link rel="apple-touch-icon-precomposed" href="images/Logo/s_small.png">

							<link rel="icon" sizes="192x192" href="images/Logo/s_small.png">

							<meta name="author" content="Jay Lohokare">
							
							<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
							<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=false" />
							<meta name="viewport" content="user-scalable=no" />
							<meta name="viewport" content="width=device-width, initial-scale=1.0"/>	
							<meta name="apple-mobile-web-app-capable" content="yes" />
							
							

							
							<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
							
							<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
							
						
							
						</head>

						<body  class="blue darken-3 ">

							<div class="center flow-text white-text center-align" style="top:45vh; position:relative;"	>
								We have received your application. We will contact you soon. Redirecting to website...
							</div>
							
							<script>
								setTimeout(function(){
									window.location.href="https://www.skylinelabs.in/home.html";
 
								}, 6000); 
							</script>
							
						</body>

					</html>


<?
}

else{
					
?>

<html lang="en">

						<head>
							<title>Skyline Labs</title>

							<meta name="msapplication-TileColor" content="#2196f3">
							<meta name="msapplication-TileImage" content="images/Logo/s_small.png">


							<meta name="theme-color" content="#2196f3">
							
							<link rel="shortcut icon" type="image/x-icon" href="images/Logo/s_small.png" />
							<link rel="apple-touch-icon-precomposed" href="images/Logo/s_small.png">

							<link rel="icon" sizes="192x192" href="images/Logo/s_small.png">

							<meta name="author" content="Jay Lohokare">
							
							<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
							<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=false" />
							<meta name="viewport" content="user-scalable=no" />
							<meta name="viewport" content="width=device-width, initial-scale=1.0"/>	
							<meta name="apple-mobile-web-app-capable" content="yes" />
							
							

							
							<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
							
							<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
							
						
							
						</head>

						<body  class="blue darken-3 ">

							<div class="center flow-text white-text center-align" style="top:45vh; position:relative;"	>
								Oops! something seems wrong :( <br>We weren't able to catch your details.<br>We apologize for the inconvenience<br>Redirecting to internship form
							</div>
							
							<script>
								setTimeout(function(){
									window.location.href="https://www.skylinelabs.in/internship.html";
 
								}, 6000); 
							</script>
							
						</body>

					</html>


<?
}
	?>