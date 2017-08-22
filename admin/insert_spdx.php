<html>
<head>
  <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" rel="stylesheet"></link>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script crossorigin="anonymous" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
  <h3>Insert SPDX license</h3><hr>
<?php
include 'sql_connect.php';
$con = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//echo "Connected successfully <br>";
$SPDX_key =  $_POST['SPDX_key'];
echo "<strong>SPDX_key = </strong>".$SPDX_key."<br>";
$SPDX_fullname =  $_POST['SPDX_fullname'];
echo "<strong>SPDX fullname = </strong>".$SPDX_fullname."<br>";
$SPDX_source_url =  $_POST['SPDX_source_url'];
echo "<strong>SPDX source url = </strong>".$SPDX_source_url."<br>";
$SPDX_notes =  $_POST['SPDX_notes'];
echo "<strong>Notes = </strong>".$SPDX_notes."<br>";
$license_header =  $_POST['license_header'];
echo "<strong>license header = </strong>".$license_header."<hr>";
// insert SPDX_license query
$insert_SPDX = "INSERT INTO spdx_license(SPDX_key,SPDX_fullname,SPDX_source_url,SPDX_notes,license_header)
VALUES('$SPDX_key','$SPDX_fullname','$SPDX_source_url','$SPDX_notes','$license_header')";
if($SPDX_key == ""){
 echo "* No license key";
}
$result_insert_SPDX=mysqli_query($con,$insert_SPDX);
//check query
if(! $result_insert_SPDX ) {
    echo
    "<form action='admin.php' method='post'>".
    "<input type='hidden' name='username' value ='admin'>".
    "<input type='hidden' name='password' value='password'>".
    "<input class='btn btn-danger' type='submit' value ='Back'></form>";
		die("<div class='alert alert-danger'><strong>Error : </strong> Could not insert data into SPDX_license:</div>" . mysql_error());
 }
 else{
   echo
   "<form action='admin.php' method='post'>".
   "<input type='hidden' name='username' value ='admin'>".
   "<input type='hidden' name='password' value='password'>".
   "<input class='btn btn-success' type='submit' value ='Back'></form>".
   "<div class='alert alert-success'><strong>Success : </strong>".
   $SPDX_key." already inserted into SPDX_license table."."</div>";
 }
mysqli_close($con);
 ?>
 </body>
 </html>
