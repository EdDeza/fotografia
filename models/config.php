<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'db_photos');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   mysqli_set_charset($db,"utf8");

   //if ($db->connect_error) {
   // die("Connection failed: " . $db->connect_error);
	//} 
	//echo "Connected successfully";
   //$db->close();
?>