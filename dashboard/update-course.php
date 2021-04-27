<!DOCTYPE html>
<?php
    // database connection
    $dbc = mysqli_connect('localhost','root', '', 'dashboard') 
    or die ('Error connecting to mysql server');

    // get the id of the course and use it to select the course with the particular id
    $id = $_GET['edit'];
    $val = mysqli_query($dbc, "SELECT * FROM courses WHERE ID=$id");
    $row = $val->fetch_assoc();

    // collect data from the update form
    if(isset($_POST['submit'])){
        $coursename = $_POST['course-name'];
        $coursetitle = $_POST['title'];
        $sql = "UPDATE courses SET course_name= '$coursename', couse_title= '$coursetitle' WHERE id = '$id'";
        $dbc->query($sql);
        header('location: course-view.php');
        mysqli_close($dbc);
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Course</title>
    
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <!-- code for the update form -->
        <div class="container">
            <h2>Update Courses</h2>
            <div>
                <form action="" method="POST">
                    <label for="Title">Course Title</label>
                    <div>
                        <input type="text" name="course-name" value="<?php echo $row['course_name']; ?>">
                    </div>
                    <label for="Code">Course Code</label>
                    <div>
                        <input type="text" name="title" value="<?php echo $row['couse_title'];?>">
                    </div><br>
                    <input type="submit" value="Update Course" name="submit" >
                </form><br>
            </div>
        </div>
    </main>
</body>
</html>