<?php
   include('session.php');
?>
<html>

   <head>
      <title>Welcome </title>
   </head>

   <body>
      <h1>Welcome <?php echo $login_session; ?></h1>
	  <h2><a href="EnterInfo.php"> Submit an Entry </a></h2>
	  <h2><a href="taskP.php"> Task Percentages </a></h2>
      <h4><a href = "logout.php">Sign Out</a></h4>
   </body>

</html>
