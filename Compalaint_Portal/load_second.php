<?php
$last_msg_id=$_GET['last_msg_id'];
$sql=mysql_query("SELECT * FROM Complaint_Portal WHERE ID < '$last_msg_id' ORDER BY ID DESC LIMIT 5");
$last_msg_id="";
while($row=mysql_fetch_array($sql))
{
$msgID= $row['ID'];
$msg= $row['description']; 
?>
<div id="<?php echo $msgID; ?>" class="message_box" > 
<?php echo $msg; 
?>
</div>
<?php
} 
?>