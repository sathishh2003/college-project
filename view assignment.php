<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Assignment Details</title>
</head>

<body bgcolor="#66FFCC">
<?php
$link=mysql_connect("localhost","root");
$db=mysql_select_db('assignment',$link);
$query="SELECT * FROM billing";
$rt=mysql_query($query);
?>
<center>
<h1>ASSIGNMENT REPORT</h1>
<table border=3>
<tr><td>REGISTER NO</td><td>NAME</td><td>SEMESTER</td><td>CLASS</td><td>TITLE</td><td>FILE NAME</td><td>FILE TYPE</td><td>FILE SIZE</td><td>UPLOADED DATE</td></tr>
<?php
while($row=mysql_fetch_array($rt))
{
echo"<tr>";
echo"<td>".$row['regno'];
echo"</td>";
echo"<td>".$row['name'];
echo"</td>";
echo"<td>".$row['sem'];
echo"</td>";
echo"<td>".$row['class'];
echo"</td>";
echo"<td>".$row['title'];
echo"</td>";
echo"<td>".$row['appname'];
echo"</td>";
echo"<td>".$row['appmime'];
echo"</td>";
echo"<td>".$row['appsize'];
echo"</td>";
echo"<td>".$row['appcreated'];
echo"</td></tr>";
}
?>
</body>
</html>
