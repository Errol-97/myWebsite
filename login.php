<?php
   include("config.php");
   session_start();

   $error = "";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);



      $sql = "SELECT employeeName FROM  employee WHERE employeeId = '$myusername' and password = '$mypassword'";

      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['employeeName'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;

         header("Location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>

   <head>
      <title>Login Page</title>

      <style type = "text/css">
		*{
			margin: 0;
			padding: 0;
			font-family:sans-serif;
			box-sizing: border-box;
		}
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;

         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
			color: cyan;
         }
         .box {
            border:#666666 solid 2px;
         }
      </style>

   </head>

   <body bgcolor = "darkseagreen">

      <div style = "margin: 30px;"align = "center">
         <div style = "width:100%; border: solid 1px #333333; " align = "left">
            <div style = "background-color:darkolivegreen; color:black; padding:2px;"><b>Login</b></div>

            <div style = "margin:30px">

               <form action = "" method = "post">
                  <label>Employee ID  :<br>
					<input type = "text" name = "username" class = "box"/><br /><br />
				  </label>
                  <label>Password  :<br>
					<input type = "password" name = "password" class = "box" /><br/><br />
				  </label>
                  <input type = "submit" value = " Submit "/><br />
               </form>

               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

            </div>

         </div>

      </div>

   </body>
</html>
