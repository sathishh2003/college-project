<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ACKNOWLEDGEMENT</title>
</head>

<body bgcolor="#66FFCC">






    <?php
    // Check if a file has been uploaded
    if(isset($_FILES['uploaded_file'])) {
        // Make sure the file was sent without errors
        if($_FILES['uploaded_file']['error'] == 0) {
            // Connect to the database
            $dbLink = new mysqli('localhost', 'root', '', 'secure');
            if(mysqli_connect_errno()) {
                die("MySQL connection failed: ". mysqli_connect_error());
            }
     
            // Gather all required data
         
			$appname = $dbLink->real_escape_string($_FILES['uploaded_file']['name']);
            $appmime = $dbLink->real_escape_string($_FILES['uploaded_file']['type']);
            $appdata = $dbLink->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
            $appsize = intval($_FILES['uploaded_file']['size']);
     
     
            // Create the SQL query
            $query = "
                INSERT INTO `file` (
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
               . 'Error code: '. intval($_FILES['uploaded_file']['error']);
        }
     
        // Close the mysql connection
        $dbLink->close();
    }
    else {
        echo 'Error! A file was not sent!';
    }
     
    
  echo "<script type='text/javascript'>\n";
echo "window.location.href='content upload.html'\n";
echo "</script>"  ?>
     
     


</body>
</html>