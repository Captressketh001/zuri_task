<?php
// start the session
session_start();
    if(isset($_POST['submit'])){
        $dbc = mysqli_connect('localhost','root', '', 'php_crud') 
        or die ('Error connecting to mysql server');

        // collect user input
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email) && !empty($password)){
            $query = "SELECT email FROM user_registration WHERE ID='" . $_SESSION['ID'] . "'";
            $data = mysqli_query($dbc, $query);

            if (mysqli_num_rows($data) == 1){
                $row = mysqli_fetch_array($data);
                if($email == $row['email']){
                    $query = "UPDATE user_registration SET user_password='" . $password ."' WHERE ID=" . $_SESSION['ID'];
                    mysqli_query($dbc,$query)
                    or die('error querying database');
                    echo '<p>Password reset successfully! You can <a href="login.php">login </a>with your new password here.</p>';
                    mysqli_close($dbc);    
                }
               
                
            }
            else{
                echo "<p>Sorry, you must enter a valid email!</p>";
            }
        }
        else{
            echo "Sorry, you must enter your email and new password to reset your password";
        }
    }