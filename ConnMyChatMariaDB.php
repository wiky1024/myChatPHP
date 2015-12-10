<?php
//define const
define("DB_HOST", 'localhost');
//define("DB_HOST", 'wiky.xyz');
define("DB_USER", 'root');
define("DB_PASS", '');
define("DB_DATABASENAME", 'MyChat');
define("DB_TABLENAME", 'T_MyChat');
//mysql_connect

$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("connect failed" . mysql_error());
mysql_select_db(DB_DATABASENAME, $conn);
//My table Coloum
$dbcolarray = array('id', 'userName', 'msgTime','msgText');

?>