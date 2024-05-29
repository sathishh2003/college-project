<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Assignment Uploader</title>
</head>

<body>
<?php
    // Check if a file has been uploaded
    if(isset($_FILES['con'])) {
        // Make sure the file was sent without errors
        if($_FILES['con']['error'] == 0) {
            // Connect to the database
            $dbLink = new mysqli('localhost', 'root', '', 'assignment');
            if(mysqli_connect_errno()) {
                die("MySQL connection failed: ". mysqli_connect_error());
            }
     
            // Gather all required data
         
			$appname = $dbLink->real_escape_string($_FILES['con']['name']);
            $appmime = $dbLink->real_escape_string($_FILES['con']['type']);
            $appdata = $dbLink->real_escape_string(file_get_contents($_FILES  ['con']['tmp_name']));
            $appsize = intval($_FILES['con']['size']);
     
     
            // Create the SQL query
            $query = "
                INSERT INTO `billing` (
                    `appname`, `appmime`, `appsize`, `appdata`, `appcreated`
                )
                VALUES (
                    '{$appname}', '{$appmime}', {$appsize}, '{$appdata}', NOW()
                )";
     
            // Execute the query
            $result = $dbLink->query($query);
     
            // Check if it was successfull
            if($result) {
                echo 'Success! Your file was successfully added!';
            }
            else {
                echo 'Error! Failed to insert the file'
                   . "<pre>{$dbLink->error}</pre>";
            }
        }
        else {
            echo 'An error accured while the file was being uploaded. '
               . 'Error code: '. intval($_FILES['con']['error']);
        }
     
        // Close the mysql connection
        $dbLink->close();
    }
    else {
        echo 'Error! A file was not sent!';
    }
     
    
  echo "<script type='text/javascript'>\n";
echo "window.location.href='progress.php'\n";
echo "</script>"  ?>
<?php





    // Check if a file has been uploaded
    if(isset($_FILES['con'])) {
        // Make sure the file was sent without errors
        if($_FILES['con']['error'] == 0) {
            // Connect to the database
            $dbLink = new mysqli('localhost', 'root', '', 'assignment');
            if(mysqli_connect_errno()) {
                die("MySQL connection failed: ". mysqli_connect_error());
            }
     
            // Gather all required data
         $regno=$_POST['regno'];
$name=$_POST['name'];
$sem=$_POST['sem'];
$class=$_POST['class'];
$title=$_POST['title'];
			$appname = $dbLink->real_escape_string($_FILES['con']['name']);
            $appmime = $dbLink->real_escape_string($_FILES['con']['type']);
            $appdata = $dbLink->real_escape_string(file_get_contents($_FILES  ['con']['tmp_name']));
            $appsize = intval($_FILES['con']['size']);
     
     
            // Create the SQL query
            $query = "
                INSERT INTO `billing` (
                  `regno`, `name`, `sem`, `class`, `title`  `appname`, `appmime`, `appsize`, `appdata`, `appcreated`
                )
                VALUES (
                   '{$regno}', '{$name}',  '{$sem}','{$class}', '{$title}', {$appname}, '{$appmime}', '{$appsize}', '{$appdata}', NOW() )";
     
            // Execute the query
            $result = $dbLink->query($query);
     
            // Check if it was successfull
            if($result) {
                echo 'Success! Your file was successfully added!';
            }
            else {
                echo 'Error! Failed to insert the file'
                   . "<pre>{$dbLink->error}</pre>";
            }
        }
        else {
            echo 'An error accured while the file was being uploaded. '
               . 'Error code: '. intval($_FILES['con']['error']);
        }
     
        
    }
    else {
        echo 'Error! A file was not sent!';
    }
     
    
  echo "<script type='text/javascript'>\n";
echo "window.location.href='progress.php'\n";
echo "</script>"  ?>
     
</body>
</html>
