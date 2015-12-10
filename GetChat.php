<?php
require 'ConnMyChatMariaDB.php';
//读取表中纪录条数
$sql = sprintf("select count(*) from %s", DB_TABLENAME);
$result = mysql_query($sql, $conn);
if ($result) {
    $count = mysql_fetch_row($result);
} else {
    die('{"status":"error"}: ');
}
echo '{;';
echo "\"count\":\"$count[0]\"";

$sql = sprintf("select %s from %s", implode(",", $dbcolarray), DB_TABLENAME);
$result = mysql_query($sql, $conn);
echo '"msgs":[';
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
    $str = "";
//与$row=mysql_fetch_assoc($result)等价
{
    $str .= "{\"userName\":\".$row[userName].\",\"msgText\":\".$row[msgText].\",\"msgTime\":\".$row[msgTime].\"},";
}
echo substr($str, 0, -1);
echo "]}";
mysql_free_result($result);
mysql_close($conn);
?>