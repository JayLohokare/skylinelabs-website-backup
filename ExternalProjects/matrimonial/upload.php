<?php
include("header.html");
?>
<div class="container center">
<?php
session_start();

$sagar = $_SESSION['no'];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        echo "File is not an image.<br>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.<br>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.<br>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	$con = new mysqli('mysql.hostinger.in','u523142629_vinit','avaBev','u523142629_matri');
        $last_id = $con->insert_id;
        echo "New record created successfully.<br>";	

	$q = "update users set image='$target_file' where uid='$sagar'";
	mysqli_query($con,$q);
	
        echo 'The file '. basename( $_FILES["fileToUpload"]["name"]). ' has been uploaded.<br><a href="index.php">Click here to login</a>';
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}?>
</div>
<?php
include("footer.html");
?>