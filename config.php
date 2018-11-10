<?php
   define('DB_SERVER', 'localhost:3308');
   define('DB_USERNAME', 'errol');
   define('DB_PASSWORD', 'errol1997');
   define('DB_DATABASE', 'cs460');

   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   if (mysqli_connect_errno())
    {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>
