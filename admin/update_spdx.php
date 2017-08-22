<html>
<head>
  <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" rel="stylesheet"></link>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script crossorigin="anonymous" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<?php
  include 'sql_connect.php';
  // Create connection
  $con = mysqli_connect($servername, $username, $password,$dbname);
  // Check connection
  if (mysqli_connect_errno())
  {
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$key = $_POST['SPDX_key'];
$name = $_POST['name'];
$url = $_POST['url'];
$notes = $_POST['notes'];
$license_header = $_POST['license_header'];
//echo $key, $name, $url, $notes, $license_header;
//query update in SPDX_license table
$update_SPDX = "UPDATE spdx_license SET SPDX_fullname='$name',SPDX_source_url='$url',SPDX_notes='$notes',license_header='$license_header' WHERE SPDX_key ='$key' ";

$result_update_SPDX = mysqli_query($con,$update_SPDX);
//check query
 if(! $result_update_SPDX) {
     echo
     "<form action='admin.php' method='post'>".
     "<input type='hidden' name='username' value ='admin'>".
     "<input type='hidden' name='password' value='password'>".
     "<input class='btn btn-danger' type='submit' value ='Back'></form>";
 		die("<div class='alert alert-danger'><strong>Error : </strong> Could not update data into SPDX_license:</div>" . mysql_error());
  }
  else{
    echo
    "<form action='admin.php' method='post'>".
    "<input type='hidden' name='username' value ='admin'>".
    "<input type='hidden' name='password' value='password'>".
    "<input class='btn btn-success' type='submit' value ='Back'></form>".
    "<div class='alert alert-success'><strong>Success : </strong>".
    $key." already updated into SPDX_license table."."</div>";
  }
 mysqli_close($con);
  ?>
</body>
</html>
