<?php
$name = $_POST['content'];
?>

<form action = "form.php" method = "post">
	<input type = "text" name = "content">
	<button type = "submit">Submit</button>	
</form>
<br><br>
<p><?php echo "the name you have entered is $name"?><p>