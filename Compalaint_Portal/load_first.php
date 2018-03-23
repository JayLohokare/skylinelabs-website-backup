<?php
include('db_config.php');
$sql=mysql_query("SELECT * FROM Complaint_Portal ORDER BY ID DESC LIMIT 10");
while($row=mysql_fetch_array($sql))
{
$msgID= $row['ID'];
$msg= $row['Description'];
?>
<div id="<?php echo $msgID; ?>" class="message_box" > 
<?php echo $msg; ?>
</div> 
<?php
} 
?>