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
$key = $_GET['olex_key'];
//echo $key, $name, $url, $model, $class, $license_base;
//query delete in olex_license table
$delete_olex = "DELETE FROM olex_license WHERE olex_key ='$key' ";

$result_delete_olex = mysqli_query($con,$delete_olex);
//check query
 if(! $result_delete_olex) {
     echo
     "<form action='admin.php' method='post'>".
     "<input type='hidden' name='username' value ='admin'>".
     "<input type='hidden' name='password' value='password'>".
     "<input class='btn btn-danger' type='submit' value ='Back'></form>";
 		die("<div class='alert alert-danger'><strong>Error : </strong> Could not delete data into olex_license:</div>" . mysql_error());
  }
  else{
    echo
    "<form action='admin.php' method='post'>".
    "<input type='hidden' name='username' value ='admin'>".
    "<input type='hidden' name='password' value='password'>".
    "<input class='btn btn-success' type='submit' value ='Back'></form>".
    "<div class='alert alert-success'><strong>Success : </strong>".
    $key." already deleted into olex_license table."."</div>";
  }
 mysqli_close($con);
  ?>
</body>
</html>
