<?php  
    // database connection
    $dbc = mysqli_connect('localhost','root', '', 'dashboard') 
    or die ('Error connecting to mysql server');
    
    // collect data from the add course form(index.php) and add it to the database
    if(isset($_POST['submit'])){
        $coursename = $_POST['course-name'];
        $coursetitle = $_POST['title'];

        if (!empty($coursename) && !empty($coursetitle)){
            $query = "SELECT * FROM courses WHERE course_name = '$coursename' ";
            $data = mysqli_query($dbc,$query);
            if(mysqli_num_rows($data) == 0 ){
                $query = "INSERT INTO courses(course_name, couse_title)". 
                "VALUES('$coursename', '$coursetitle')";
                mysqli_query($dbc,$query)
                or die('error querying database');
                header('location: course-view.php');
                mysqli_close($dbc);
            }
            else{
                echo '<p>Course already exists, try adding a new one!</p>';
            }
            
        }
        else{
            echo '<p>You must fill all the fields before you can add course!</p>';
        }
        
    }   
?>