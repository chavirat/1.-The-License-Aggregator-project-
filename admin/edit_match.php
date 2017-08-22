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
  $key =  $_GET['olex_key'];
  //query
  $sql_match = "SELECT * FROM match_license
  WHERE olex_key = '$key'";

  $result_sql_match=mysqli_query($con,$sql_match);
  //check query
  if(! $result_sql_match ) {
  		die('Could not get data from match_license: ' . mysql_error());
   }
   $row = mysqli_fetch_array($result_sql_match, MYSQL_ASSOC);
    echo
    "<form class='form-horizontal' action='update_match.php' method='post'>".
      "<div class='form-group'>".
        "<label class='col-sm-2 control-label'>Olex key</label>".
        "<div class='col-sm-10'>".
          "<input type='text' class='form-control' name ='olex_key' value ='{$row['olex_key']}'>".
        "</div>".
      "</div>".
      "<div class='form-group'>".
      "<label class='col-sm-2 control-label'>Nexb key</label>".
        "<div class='col-sm-10'>".
          "<input type='text' class='form-control' name ='nexb_key' value ='{$row['nexb_key']}'>".
        "</div>".
      "</div>".
      "<div class='form-group'>".
      "<label class='col-sm-2 control-label'>SPDX key</label>".
        "<div class='col-sm-10'>".
          "<input type='text' class='form-control' name ='SPDX_key' value ='{$row['SPDX_key']}'>".
        "</div>".
      "</div>".
      "<div class='form-group'>".
      "<label class='col-sm-2 control-label'>Tldr key</label>".
        "<div class='col-sm-10'>".
          "<input type='text' class='form-control' name ='tldr_key' value ='{$row['tldr_key']}'>".
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
      <a class="btn btn-danger" href="delete_match.php?olex_key=<?php echo $key ?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
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
