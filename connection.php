<?php

$host = "db4free.net";
$username = "alvinsuanco";
$password = "Vynvhokz@24";
$dbname = "alvintodolist";

$conn = mysqli_connect($host, $username, $password, $dbname );

if( !$conn ){
	die('Connection Failed: ' . mysqli_error($conn));

}

echo "Connection Successfully: ";

?>