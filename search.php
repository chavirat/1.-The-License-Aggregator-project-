<html>
<head>
  <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" rel="stylesheet"></link>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script crossorigin="anonymous" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/mystyle.css">
</head>
<div class="page-header">
   <h1>Search result</h1>
   <a class="btn btn-default" href="index.php"> Home</a>
   <form class="navbar-form navbar-right" role="search" action="search.php" method="post">
     <div class="form-group">
       <input type="text" class="form-control" placeholder="Search"  name="name">
     </div>
     <button type="submit" class="btn btn-default">Search</button>
   </form>
 </div>
<body>
<?php
// echo $_POST["name"];
include 'admin/sql_connect.php';
// Create connection
$con = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if($_POST['name']!="")
{
  $sql = "SELECT * FROM olex_license WHERE name LIKE '%".$_POST['name']."%' OR
  model LIKE '%".$_POST['name']."%' OR
  class LIKE '%".$_POST['name']."%' OR
  license_base LIKE '%".$_POST['name']."%' ";
}
else {
  $sql = "SELECT * FROM olex_license";
}
$result=mysqli_query($con,$sql);
//check query
if(! $result ) {
  die('Could not get data: ' . mysql_error());
}
if (mysqli_num_rows($result) ==0 )
{
  echo "<h3>No Results have been found </h3>";
}
else{
  echo
  "<table>".
  "<tr>".
  "<th> LICENSE NAME </th>".
  "<th> MODEL </th>".
  "<th> CLASS </th>".
  "<th> LICENSE BASE </th>".
  "</tr>";
  while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
    echo "<tr><td><a href ='license_info.php?olex_key={$row['olex_key']}'> {$row['name']} </a></td>".
    "<td> {$row['model']} </td> ".
    "<td> {$row['class']} </td> ".
    "<td> {$row['license_base']} </td> ".
    "</tr>";
  }
  echo "</table>";
}

mysqli_close($con);
 ?>
</body>
</html>
