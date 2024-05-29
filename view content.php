<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>App View</title>
</head>

<body bgcolor="#66FFCC">

 <div align="center">
 
  <td width="1250"><table width="1200" border="1">
        <tr>
          
          <td width="973"><h1 align="center"><strong>High Secure Image Based Authentication System for Educational Institution</strong></h1></td>
        </tr>
      </table>
      <p></p></td></div>
  <div align="center">
    <center>
    <table border="0" cellpadding="0" cellspacing="0" width="1100"
bgcolor="">

<tr><td align="right">
<p align="right">&nbsp;&nbsp;</p>
<p align="center">
<b>View All</b>
</p></td>
</tr>
</table>
</center>
</div>
 <?php
 // Connect to the database
 $dbLink = new mysqli('localhost', 'root', '', 'secure');
 if(mysqli_connect_errno()) {
 die("MySQL connection failed: ". mysqli_connect_error())
;
 }

 // Query for a list of all existing files
 $sql = 'SELECT  `appname`, `appmime`, `appsize`, `appdata`, `appcreated` FROM `file`';
 $result = $dbLink->query($sql);

 // Check if it was successfull
 if($result) {
 // Make sure there are some files in there
 if($result->num_rows == 0) {
 echo '<p>There are no files in the database</p>';
 }
 else {
 // Print the top of a table
 echo '<table width="100%" border="1">
 <tr>
 <td><b>Title</b></td>
 <td><b>File Type</b></td>
 <td><b>File Size</b></td>
 </tr>';

 // Print each file
 while($row = $result->fetch_assoc()) {
 echo "
 <tr>
 <td>{$row['appname']}</td>
 <td>{$row['appmime']}</td>
 <td>{$row['appsize']}</td>
 </tr>";
 }

 // Close table
 echo '</table>';
 }

 // Free the result
 $result->free();
}
 else
 {
 echo 'Error! SQL query failed:';
 echo "<pre>{$dbLink->error}</pre>";
 }

 // Close the mysql connection
 $dbLink->close();
 ?>
</body>
</html>