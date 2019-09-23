<?php
    require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        body
        {
            background-image: url(img/loginibac.jpg);
           background-size: cover;
           
        }
        .login
        {
            
            margin-left: 800px;
            margin-top: 100px;
        }
        .form
        {
            border:solid 2px black;
            border-radius: 5px;
            padding: 40px;
            width: 200px;
        }
        h2
        {
            font-family: sans-serif;
        }
    </style>
    
</head>
<body>
        <div class="login">
            <h2>Welcome</h2>
                <div class="form">
                  
                    
                   <form action="login.php" method="post"> 
                  <input name="username" type="text" placeholder="Username">
                       <br>
                       <br>
                  <input name="password" type="password" placeholder="Password">
                       <br>
                       <br>
                  <input name="login" type="submit" value="Sign In" class="sign_in">
                  <a href="register.php"><input type="button" value="Sign Up" class="sign_up"></a>
                       
                       <?php
                    if(isset($_POST['login']))
                    {
                        $username=$_POST['username'];
                        $password=$_POST['password'];
                        $encrypted_password = md5($password);

                        $query="select * from login WHERE username='$username' AND password='$password'";

                        $query_run= mysqli_query($con,$query);

                        if(mysqli_num_rows($query_run)>0)
                        {
                            //valid
                            $_SESSION['username']= $username;
                           // header('location: catering.php');
                             echo '<script type="text/javascript"> alert("login successfull") </script>';
                        }
                        else
                        {
                            //invalid
                            echo '<script type="text/javascript"> alert("Invalid credentials") </script>';
                        }
                    }

                  ?>

                
                    </form>
                </div>
              </div>

</body>
</html>