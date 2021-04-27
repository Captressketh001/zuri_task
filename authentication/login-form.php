<?php
// start the session
session_start();
// 
if(!isset($_SESSION['ID'])){
    if(isset($_POST['submit'])){
        $dbc = mysqli_connect('localhost','root', '', 'php_crud') 
        or die ('Error connecting to mysql server');

        // collect user input
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email) && !empty($password)){
            $query = "SELECT ID, firstname FROM user_registration WHERE email = '$email' AND user_password = '$password'";
            $data = mysqli_query($dbc, $query);

            if (mysqli_num_rows($data) == 1){
                $row = mysqli_fetch_array($data);
                $_SESSION['ID'] = $row['ID'];
                $_SESSION['firstname'] = $row['firstname'];
                
                echo 'Welcome ' . $_SESSION['firstname'] . '!'. '<p>Login successful! You can <a href="reset-password.php">reset </a>your password here or <a href="logout.php">logout</a>.</p>';
            }
            else{
                echo "<p>Sorry, you must enter a valid username and password to login!</p>";
            }
        }
        else{
            echo "Sorry, you must enter your username and password to log in";
        }
    }
}
