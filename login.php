<?php

if(!isset($_SESSION)){
        session_start();
    }

include_once("connections/connection.php");
$con = connection();

        if(isset($_POST['login'])){
                $username =$_POST['username'];
                $password =$_POST['password'];

     $sql = "SELECT * FROM student_users WHERE username= '$username' AND password ='$password'";
        
        $user = $con->query($sql) or die ($con->error);
        $row = $user->fetch_assoc();
      $total = $user->num_rows;

                if($total > 0){
                        $_SESSION['UserLogin'] = $row['username'];
                        $_SESSION['Access'] = $row['access'];

                    $_SESSION['UserLogin'];

                     echo header("Location: index.php");  
                }else{
                        echo "Login failed. Please check your credentials.";
                }
                

               
        }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
     <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <h1>Login Page</h1>
        <br>
        <form action="" method="POST">
        <label >Username</label>
        <input type="text" name="username" id="username" >
        <label >Password</label>
        <input type="password" name="password" id="password" >
        <button type="submit" name="login">Submit</button>

        </form>
       
        
    
</body>
</html>