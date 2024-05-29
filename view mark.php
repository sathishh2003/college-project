<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Mark Details</title>
</head>

<body bgcolor="#66FFCC">
<?php
$link=mysql_connect("localhost","root");
$db=mysql_select_db('assignment',$link);
$query="SELECT * FROM miappbox";
$rt=mysql_query($query);
?>
<center>
<h1>MARK DETAILS</h1>
<table border=3>
<tr><td>REGISTER NO</td><td>STUDENT NAME</td><td>ASSIGNMENT MARK</td><td>EXTERNAL PARTICIPATION MARK</td></tr>
<?php
while($row=mysql_fetch_array($rt))
{
echo"<tr>";


echo"<td>".$row['q1'];
echo"</td>";
echo"<td>".$row['p1'];
echo"</td>";
echo"<td>".$row['r1'];
echo"</td>";
echo"<td>".$row['a1'];
echo"</td></tr>";
}
?>
</body>
</html>
