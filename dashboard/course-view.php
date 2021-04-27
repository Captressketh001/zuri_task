<!DOCTYPE html>
<?php 
	// database connection
	$dbc = mysqli_connect('localhost','root', '', 'dashboard') 
	or die ('Error connecting to mysql server');

	// Get the courses from the courses table in the database
	$results = mysqli_query($dbc, "SELECT * FROM courses"); 
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>View Courses</title>
</head>
<body>
	<!-- The view course table display -->
	<table class="container">
	<thead>
		<tr>
			<!-- <th>ID</th> -->
			<th>Course Name</th>
			<th>Course Title</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<!-- Loop through the result from the courses query and display them -->
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['course_name']; ?></td>
			<td><?php echo $row['couse_title']; ?></td>

			<!-- Edit course link -->
			<td>
				<a href="update-course.php?edit=<?php echo $row['ID']; ?>" class="edit_btn" >Edit</a>
			</td>
			<!-- delete course link -->
			<td>
				<a href="delete.php?del=<?php echo $row['ID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
		
	<?php } ?>
	<tr>
		<!-- link to add new course -->
			<td>
				<a href="index.php">Add New Course</a>
			</td>
		</tr>
</table>
</body>
</html>


<form>