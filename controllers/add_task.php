<?php 


require_once '../connection.php';

$newTask = $_GET['name'];


$sql = "INSERT INTO tasks(name) VALUES ('$newTask')";

//mysqli_query function expects 2 arguments.

$result = mysqli_query($conn, $sql);

if ($result === TRUE) {
	echo 'new user added successfully';
} else {
	echo 'error: ' . $sql . "<br>" . mysqli_error($conn);
}

//close a previously opened database connection
mysqli_close($conn);

?>