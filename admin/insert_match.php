<html>
<head>
  <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" rel="stylesheet"></link>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script crossorigin="anonymous" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
  <h3>Insert Olex license</h3><hr>
<?php
include 'sql_connect.php';
$con = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//echo "Connected successfully <br>";
$olex_key =  $_POST['olex_key'];
echo "<strong>Olex_key = </strong>".$olex_key."<br>";
$olex_name =  $_POST['olex_name'];
echo "<strong>Olex name = </strong>".$olex_name."<br>";
$olex_url =  $_POST['olex_url'];
echo "<strong>Olex url = </strong>".$olex_url."<br>";
$olex_model =  $_POST['olex_model'];
echo "<strong>Model = </strong>".$olex_model."<br>";
$olex_class =  $_POST['olex_class'];
echo "<strong>Class = </strong>".$olex_class."<br>";
$olex_license_base =  $_POST['olex_license_base'];
echo "<strong>License Base = </strong>".$olex_license_base."<hr>";
// insert olex_license query
$insert_olex = "INSERT INTO olex_license(olex_key,name,url,model,class,license_base)
VALUES('$olex_key','$olex_name','$olex_url','$olex_model','$olex_class','$olex_license_base')";
if($olex_key == ""){
 echo "* No license key";
}
$result_insert_olex=mysqli_query($con,$insert_olex);
//check query
if(! $result_insert_olex ) {
    echo
    "<form action='admin.php' method='post'>".
    "<input type='hidden' name='username' value ='admin'>".
    "<input type='hidden' name='password' value='password'>".
    "<input class='btn btn-danger' type='submit' value ='Back'></form>";
		die("<div class='alert alert-danger'><strong>Error : </strong> Could not insert data into olex_license:</div>" . mysql_error());
 }
 else{
   echo
   "<form action='admin.php' method='post'>".
   "<input type='hidden' name='username' value ='admin'>".
   "<input type='hidden' name='password' value='password'>".
   "<input class='btn btn-success' type='submit' value ='Back'></form>".
   "<div class='alert alert-success'><strong>Success : </strong>".
   $olex_key." already inserted into olex_license table."."</div>";
 }
mysqli_close($con);
 ?>
 </body>
 </html>
