<!DOCTYPE html>
<html lang="en">
<head> 
	<meta charset="utf-8">

	<title> mod08-07 Activity </title>

	<script
  	src="https://code.jquery.com/jquery-3.3.1.min.js"
  	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  	crossorigin="anonymous"></script>
</head>
<body>

<h1>TO-DO List App</h1>

<form>
	<input type="text" name="name" id="new-task">
	<button id="addTaskBtn"> Add New Task </button>
</form>



<script>
	
	$("#addTaskBtn").click ( () => {
		const newTask = $('#new-task').val();

		$.ajax ({
			method : "GET",
			url : "controllers/add_task.php",
			data : {name : newTask},
		}).done( 
				console.log('added task')
			);
		});

</script>

		
<h2> Task List</h2>		
<ul id="taskList">

<?php

	require_once "connection.php";

	$sql = "SELECT * FROM  tasks";
	$result = mysqli_query ($conn,$sql);

	while ($row = mysqli_fetch_assoc($result) ) { 

?>

		<li data-id="<?php echo $row['id'] ; ?>" >
			<?php echo $row['name'] . " is task number " . $row['id'] ; ?>
			<button class="deleteBtn">Delete</button>
		</li>
	<?php } ?>
</ul>

	<script>
		
		$('#taskList').on('click', '.deleteBtn', function(){
			const task_id = $(this).parent().attr('data-id');

			$.ajax({
				method: "POST",
				url: 'controllers/delete_task.php',
				data : {task_id : task_id}
			}).done(data => {
				$(this).parent().fadeout();
			});
		});


	</script>




	

</body>
</html>