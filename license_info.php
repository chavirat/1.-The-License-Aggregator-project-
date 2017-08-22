<html>
<head>
  <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" rel="stylesheet"></link>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script crossorigin="anonymous" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/mystyle.css">
</head>
<body>
  <div class="page-header">
     <h1>License Comparison</h1>
     <a class="btn btn-default" href="index.php"> Home</a>
     <form class="navbar-form navbar-right" role="search" action="search.php" method="post">
       <div class="form-group">
         <input type="text" class="form-control" placeholder="Search"  name="name">
       </div>
       <button type="submit" class="btn btn-default">Search</button>
     </form>
   </div>
<div id ="header">
  <?php include 'olex_license.php';?>
</div>
<div id ="compare">
  <h3>Nexb License</h3>
  <?php include 'nexb_license.php';  ?>
</div>
<div id ="compare">
  <h3>SPDX License</h3>
  <?php include 'spdx_license.php';  ?>
</div>
<div id ="compare">
  <h3>Tldr License </h3>
  <?php include 'tldr_license.php';  ?>
</div>

</body>
</html>
