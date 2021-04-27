<?php
    // code to perform the delete function
    $dbc = mysqli_connect('localhost','root', '', 'dashboard') 
    or die ('Error connecting to mysql server');
    $id = $_GET['del'];
    $val = mysqli_query($dbc, "DELETE FROM courses WHERE ID=$id");
        if($val){
            header('location: course-view.php');;
        }
        else{
            echo "error";
        }  
    mysqli_close($dbc);    
?>