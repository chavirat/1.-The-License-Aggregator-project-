<html>
<head>
  <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" rel="stylesheet"></link>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script crossorigin="anonymous" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
  <h3>Insert tldr license</h3><hr>
<?php
include 'sql_connect.php';
$con = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//echo "Connected successfully <br>";
$tldr_key =  $_POST['tldr_key'];
echo "<strong>tldr key = </strong>".$tldr_key."<br>";
$tldr_name =  $_POST['tldr_name'];
echo "<strong>tldr name = </strong>".$tldr_name."<br>";
$tldr_url =  $_POST['tldr_url'];
echo "<strong>tldr url = </strong>".$tldr_url."<br>";
$summary =  $_POST['summary'];
echo "<strong>summary = </strong>".$summary."<hr>";
// insert tldr_license query
$insert_tldr = "INSERT INTO tldr_license(tldr_key,tldr_name,tldr_url,summary)
VALUES('$tldr_key','$tldr_name','$tldr_url','$summary')";
if($tldr_key == ""){
 echo "* No license key";
}
$result_insert_tldr=mysqli_query($con,$insert_tldr);
//check query
if(! $result_insert_tldr ) {
    echo
    "<form action='admin.php' method='post'>".
    "<input type='hidden' name='username' value ='admin'>".
    "<input type='hidden' name='password' value='password'>".
    "<input class='btn btn-danger' type='submit' value ='Back'></form>";
		die("<div class='alert alert-danger'><strong>Error : </strong> Could not insert data into tldr_license:</div>" . mysql_error());
 }
 else{
   echo
   "<form action='admin.php' method='post'>".
   "<input type='hidden' name='username' value ='admin'>".
   "<input type='hidden' name='password' value='password'>".
   "<input class='btn btn-success' type='submit' value ='Back'></form>".
   "<div class='alert alert-success'><strong>Success : </strong>".
   $tldr_key." already inserted into tldr_license table."."</div>";
 }
mysqli_close($con);
 ?>
 </body>
 </html>
