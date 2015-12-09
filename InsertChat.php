<?php
require 'ConnMyChatMariaDB.php';
$sql="INSERT INTO T_MyChat (userName, msgTime, msgText)VALUES('$_POST[userName]',now(),'$_POST[msgText]')";
if (!mysql_query($sql,$conn))
  {
  die('Error: ' . mysql_error());
  }
echo "success";
mysql_close($con)
?>