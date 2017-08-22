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
  //pass the key
  $code =  $_GET['code'];
  //query
  $sql_nexb_ob = "SELECT * FROM nexb_requirements
  WHERE requirements = '$code'";

  $result_sql_nexb_ob=mysqli_query($con,$sql_nexb_ob);
  //check query
  if(! $result_sql_nexb_ob ) {
  		die('Could not get data from nexb_requirements: ' . mysql_error());
   }
   $row = mysqli_fetch_array($result_sql_nexb_ob, MYSQL_ASSOC);
    echo
    "<form class='form-horizontal' action='update_nexb_ob.php' method='post'>".
      "<div class='form-group'>".
      "<label  class='col-sm-2 control-label'>Nexb Requirement</label>".
      "<div class='col-sm-10'>".
        "<label  class='control-label' style='color:#3e8cd2;'>{$row['requirements']}</label>".
          "<input type='hidden' class='form-control' name ='code' value ='{$row['requirements']}'>".
        "</div>".
      "</div>".
      "<div class='form-group'>".
        "<label class='col-sm-2 control-label'>nexb obligation description</label>".
        "<div class='col-sm-10'>".
          "<input type='text' class='form-control' name ='description' value ='{$row['description']}'>".
        "</div>".
      "</div>".
      "<div class='form-group'>".
        "<label class='col-sm-2 control-label'>nexb obligation type</label>".
        "<div class='col-sm-10'>".
          "<input type='text' class='form-control' name ='type' value ='{$row['type']}'>".
        "</div>".
      "</div>".
      "<div class='form-group'>".
        "<div class='col-sm-offset-2 col-sm-10'>".
          "<button type='submit' class='btn btn-success'>Update</button>".
        "</div>".
      "</div>".
      "</form>";
  mysqli_close($con);
  ?>
  <div class='col-sm-offset-2 col-sm-10'>
      <a class="btn btn-danger" href="delete_nexb_ob.php?code=<?php echo $code ?>" onclick="return confirm('Are you sure you want to delete? Make sure this obligation did not use with any license, otherwise this obligation will not show up on the comparison page.')">Delete</a>
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
