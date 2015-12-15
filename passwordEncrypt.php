<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WebeHosting";

/* connectie maken */
$conn = new mysqli($servername, $username, $password, $dbname);
/* check connectie */
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

function checkUserPass($username, $password){

	$username = str_replace("'","''",$username)
   $password = md5($password);

   // Verify that user is in database
   $q = "SELECT password FROM admin WHERE username = '$username'";
   $result = mysqli_query($q, $conn);
   if(!$result || (mysqli_num_rows($result) < 1)){
	   return 1; //Indicates username failure
   }

   // Retrieve password from result
   $dbarray = mysqli_fetch_array($result);

   // Validate that password is correct
   if($password == $dbarray['password']){
	   return 0; //Success! Username and password confirmed
   }
   else{
	   return 1; //Indicates password failure
   }
}

?>