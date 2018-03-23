<form action="" method="post" enctype="multipart/form-data">
<centre>Title: <input type="text" name="title"><br> </centre>
<centre>Description: </centre> 
<centre>	<input type="text" name="description"><br> </centre>
<centre>Name: <input type="text" name="username"><br></centre>
<input type="file" name="image" id="image" size="40">
<input name="" type="submit" value="upload" />
 
</form>

<?php 
$con = new mysqli('mysql.hostinger.in', 'u268998878_vinit', 'avaBev','u268998878_matri'); //Update hostname
//Update database name
$name = $_POST["username"];
$description = $_POST["description"];
$title = $_POST["title"];
define ("MAX_SIZE","1000"); 
function getExtension($str)
{
	 $i = strrpos($str,".");
	 if (!$i) { return ""; }
	 $l = strlen($str) - $i;
	 $ext = substr($str,$i+1,$l);
	 return $ext;
}
 
$errors=0;
$image=$_FILES['image']['name'];
if ($image) 
{
	$filename = stripslashes($_FILES['image']['name']);
	$extension = getExtension($filename);
	$extension = strtolower($extension);
	if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") 
		&& ($extension != "gif")&& ($extension != "JPG") && ($extension != "JPEG") 
		&& ($extension != "PNG") && ($extension != "GIF")) 
	{
		echo '<h3>Unknown extension!</h3>';
		$errors=1;
	}
	else
	{
		$size=filesize($_FILES['image']['tmp_name']);
 
		if ($size > MAX_SIZE*1024)
		{
			echo '<h4>You have exceeded the size limit!</h4>';
			$errors=1;
		}
 
		$image_name=time().'.'.$extension;
		$newname="uploads/".$image_name;
 
		$copied = copy($_FILES['image']['tmp_name'], $newname);
		if (!$copied) 
		{
			echo '<h3>Copy unsuccessfull!</h3>';
			$errors=1;
		}
		else echo '<h3>uploaded successfull!</h3>';
		$imageurl = "uploads/".$newname; 
		$sql = "INSERT INTO users (image,uname,fullname,email) VALUES ('".$imageurl."','".$name."','".$title."','".$description."')";
	}

}
?>