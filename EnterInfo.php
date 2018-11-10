<?php
   include('session.php');
     
?>
<html>
   
   <head>
      <title><?php echo $login_session; ?></title>
   </head>
   
   <body>
      
      <h2><a href="welcome.php"> Home </a></h2>
      <h2>Plane Information </h2>
      
      <form method = "post" action = "send_info.php">
         <table>
            <tr>
               <td>Name:</td> 
               <td><input type = "text" name = "name"></td>
            </tr>
            
            <tr>
               <td>E-mail:</td>
               <td><input type = "text" name = "email"></td>
            </tr>
            
			<tr>
               <td>Gender:</td>
               <td>
                  <input type = "radio" name = "gender" value = "female">Female
                  <input type = "radio" name = "gender" value = "male">Male
               </td>
            </tr>
            
            <tr>
               <td>Class details:</td>
               <td><textarea name = "comment" rows = "5" cols = "40"></textarea></td>
            </tr>
                        
            
            <tr>
               <td>
                  <input type = "submit" name = "submit" value = "Submit"> 
               </td>
            </tr>
         </table>
      </form>
          
   </body>
</html>