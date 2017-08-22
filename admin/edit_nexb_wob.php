<html>
<head>
  <script src="js/jsscript.js"></script>
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
  //pass the key
  //$key =  $_GET['nexb_key'];
  $key = "4suite-1.1";
  //query
  $nexb_wob = "SELECT * FROM nexb_license_requirements, nexb_requirements  WHERE nexb_license_requirements.requirements = nexb_requirements.requirements AND nexb_key = '$key'";

  $result_nexb_wob=mysqli_query($con,$nexb_wob);

  $nexb_ob = "SELECT * FROM nexb_requirements WHERE type = 'obligation'";
  $nexb_re = "SELECT * FROM nexb_requirements WHERE type = 'restrictions'";
  $nexb_po = "SELECT * FROM nexb_requirements WHERE type = 'policies'";
  $nexb_in = "SELECT * FROM nexb_requirements WHERE type = 'information'";

  $result_nexb_ob = mysqli_query($con,$nexb_ob);
  $result_nexb_re = mysqli_query($con,$nexb_re);
  $result_nexb_po = mysqli_query($con,$nexb_po);
  $result_nexb_in = mysqli_query($con,$nexb_in);
  //check nexb_requirements query
  if(! $result_nexb_ob ) {
  		die('Could not get data from nexb_requirements for obligation type: ' . mysql_error());
   }
   if(! $result_nexb_re ) {
   		die('Could not get data from nexb_requirements for restriction type: ' . mysql_error());
    }
    if(! $result_nexb_po ) {
       die('Could not get data from nexb_requirements for policies type: ' . mysql_error());
     }
     if(! $result_nexb_in ) {
     		die('Could not get data from nexb_requirements for information type: ' . mysql_error());
      }
      if(! $result_nexb_wob ) {
        die('Could not get data from nexb_license_requirements: ' . mysql_error());
      }
      echo "<table class='table table'>";
      //Obligation
      echo "<tr><th>Obligation</th>".
      "<th>Restriction</th>".
      "<th>Policies</th>".
      "<th>Information</th></tr>".
      "<tr><td>";
    while($row = mysqli_fetch_array($result_nexb_ob, MYSQL_ASSOC))
    {
      echo
      "<div class='checkbox'>".
      "<label><input type='checkbox' value='{$row['requirements']}'>{$row['requirements']}</label>".
      "</div>";
    }
    echo "</td>";
    //restrictions
    echo"<td>";
  while($row = mysqli_fetch_array($result_nexb_re, MYSQL_ASSOC))
  {
    echo
    "<div class='checkbox'>".
    "<label><input type='checkbox' value='{$row['requirements']}'>{$row['requirements']}</label>".
    "</div>";
  }
  echo "</td>";
  //policies
  echo"<td>";
  while($row = mysqli_fetch_array($result_nexb_po, MYSQL_ASSOC))
  {
    echo
    "<div class='checkbox'>".
    "<label><input type='checkbox' value='{$row['requirements']}'>{$row['requirements']}</label>".
    "</div>";
  }
  echo "</td>";
  //information
  echo"<td>";
  while($row = mysqli_fetch_array($result_nexb_in, MYSQL_ASSOC))
  {
    echo
    "<div class='checkbox'>".
    "<label><input type='checkbox' value='{$row['requirements']}'>{$row['requirements']}</label>".
    "</div>";
  }
  echo "</td></tr></table>";
   while($row = mysqli_fetch_array($result_nexb_wob, MYSQL_ASSOC))
   {
     echo
     "<div class='checkbox'>".
     "<label><input type='checkbox' value='{$row['requirements']}' checked='checked'>{$row['requirements']}</label>".
     "</div>";
   }
  mysqli_close($con);
  ?>
<div class='col-sm-offset-2 col-sm-10'>
    <a class="btn btn-danger" href="delete_nexb_wob.php?nexb_key=<?php echo $key ?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
</div>
<br><br>
<form action='admin.php' method='post'>
<div class='form-group'>
  <input type='hidden' name='username' value ='admin'>
  <input type='hidden' name='password' value='password'>
</div>
<div class='form-group'>
  <div class='col-sm-offset-2 col-sm-10'>
  <button type='submit' class='btn btn-default'> <<< Back</button>
  </div></div></form>
</body>
</html>
