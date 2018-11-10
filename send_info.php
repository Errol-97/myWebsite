<?php
include('session.php');
// define variables and set to empty values
         $name = $email = $gender = $comment = $website = "";
         
         //if ($_SERVER["REQUEST_METHOD"] == "POST") {
		 if (isset($_POST['submit'])) {
            $name = test_input($_POST["name"]);
            $email = test_input($_POST["email"]);
            $gender = test_input($_POST["gender"]);
            $comment = test_input($_POST["comment"]);
            
         }
		 
		 $query= "INSERT INTO employee(Name,email,Gender,Note) VALUES('$name','$email','$gender','$comment')";
		 if (mysqli_query($db, $query)) {
			 
			header("Location: welcome.php");
		 } else {
             echo "Error uinserting record: " . mysqli_error($db);
            }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
?>