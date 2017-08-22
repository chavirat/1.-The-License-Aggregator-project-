<html>
<head>
  <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" rel="stylesheet"></link>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script crossorigin="anonymous" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="page-header">
  <h1>Insert nexb obligation</h1>
</div>
<?php
include 'sql_connect.php';
$con = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//echo "Connected successfully <br>";
$requirements =  $_POST['requirements'];
echo "<strong>Nexb license requirement = </strong>".$requirements."<br>";
$description =  $_POST['description'];
echo "<strong>Description = </strong>".$description."<br>";
$type =  $_POST['optradio'];
echo "<strong> Type = </strong>".$type."<hr>";
// insert nexb_obligation query
$insert_nexb_ob = "INSERT INTO nexb_requirements(requirements,description,type)
VALUES('$requirements','$description','$type')";
if($requirements == ""){
 echo "* No nexb license requirement ";
}
$result_insert_nexb_ob=mysqli_query($con,$insert_nexb_ob);
//check query
if(! $result_insert_nexb_ob ) {
    echo
    "<form action='admin.php' method='post'>".
    "<input type='hidden' name='username' value ='admin'>".
    "<input type='hidden' name='password' value='password'>".
    "<input class='btn btn-danger' type='submit' value ='Back'></form>";
		die("<div class='alert alert-danger'><strong>Error : </strong> Could not insert data into nexb_requirements:</div>" . mysql_error());
 }
 else{
   echo
   "<form action='admin.php' method='post'>".
   "<input type='hidden' name='username' value ='admin'>".
   "<input type='hidden' name='password' value='password'>".
   "<input class='btn btn-success' type='submit' value ='Back'></form>".
   "<div class='alert alert-success'><strong>Success : ".
   $requirements." </strong>already inserted into nexb_requirements table."."</div>";
 }
mysqli_close($con);
 ?>
 </body>
 </html>
