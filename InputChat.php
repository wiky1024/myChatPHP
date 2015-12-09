<?php
require 'ConnMyChatMariaDB.php';
//读取表中纪录条数
$sql = sprintf("select count(*) from %s", DB_TABLENAME);
$result = mysql_query($sql, $conn);
if ($result)
{
	$count = mysql_fetch_row($result);
}
else
{
	die("query failed");
}
echo "表中有$count[0] 条记录<br />";

$sql = sprintf("select %s from %s", implode(",",$dbcolarray), DB_TABLENAME);
$result = mysql_query($sql, $conn);
//表格
echo '<table id="Table" border=1 cellpadding=10 cellspacing=2 bordercolor=#ffaaoo>'; 
//表头
$thstr = "<th>" . implode("</th><th>", $dbcolarray) . "</th>";
echo $thstr;
//表中的内容
while ($row=mysql_fetch_array($result, MYSQL_ASSOC))
//与$row=mysql_fetch_assoc($result)等价
{
	echo "<tr>";
	$tdstr = "";
	foreach ($dbcolarray as $td)
		$tdstr .= "<td>$row[$td]</td>";
	echo $tdstr;
	echo "</tr>";
}
echo "</table>";
mysql_free_result($result);
mysql_close($conn);
?>