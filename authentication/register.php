<?php  
    $dbc = mysqli_connect('localhost','root', '', 'php_crud') 
    or die ('Error connecting to mysql server');
    
    if(isset($_POST['submit'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
            $query = "SELECT * FROM user_registration WHERE email = '$email' ";
            $data = mysqli_query($dbc,$query);
            if(mysqli_num_rows($data) == 0 ){
                $query = "INSERT INTO user_registration(firstname, lastname, email, user_password)". 
                "VALUES('$fname', '$lname', '$email','$password')";
                mysqli_query($dbc,$query)
                or die('error querying database');
                echo ('<p>You are registered, kindly <a href="login.php">login</a> here</p>');
                mysqli_close($dbc);
            }
            else{
                echo '<p>Account already exists, Please use a different address!</p>';
            }
            
        }
        else{
            echo '<p>You must fill all the fields before you can submit!</p>';
        }
        
    }   
?>