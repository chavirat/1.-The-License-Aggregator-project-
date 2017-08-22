<html>
<head>
  <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" rel="stylesheet"></link>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script crossorigin="anonymous" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="page-header">
  <h1>Insert Olex obligation</h1>
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
$code =  $_POST['olex_obligation_code'];
echo "<strong>olex obligation code = </strong>".$code."<br>";
$name =  $_POST['name'];
echo "<strong>olex obligation name = </strong>".$name."<br>";
$shortened =  $_POST['shortened'];
echo "<strong>olex obligation shortened = </strong>".$shortened."<hr>";
// insert olex_obligation query
$insert_olex_ob = "INSERT INTO olex_obligation(olex_obligation_code,name,shortened)
VALUES('$code','$name','$shortened')";
if($code == ""){
 echo "* No olex obligation code ";
}
$result_insert_olex_ob=mysqli_query($con,$insert_olex_ob);
//check query
if(! $result_insert_olex_ob ) {
    echo
    "<form action='admin.php' method='post'>".
    "<input type='hidden' name='username' value ='admin'>".
    "<input type='hidden' name='password' value='password'>".
    "<input class='btn btn-danger' type='submit' value ='Back'></form>";
		die("<div class='alert alert-danger'><strong>Error : </strong> Could not insert data into olex_obligation:</div>" . mysql_error());
 }
 else{
   echo
   "<form action='admin.php' method='post'>".
   "<input type='hidden' name='username' value ='admin'>".
   "<input type='hidden' name='password' value='password'>".
   "<input class='btn btn-success' type='submit' value ='Back'></form>".
   "<div class='alert alert-success'><strong>Success : </strong>".
   $code." already inserted into olex_obligation table."."</div>";
 }
mysqli_close($con);
 ?>
 </body>
 </html>
