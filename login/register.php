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
       .signup
       {
           margin-left: 800px;
       }
       .form
       {
           border:solid 2px black;
          
           border-radius: 5px;
       }
       .h
       {
           position:relative;
           text-align: center;
           font-family:sans-serif;
            
       }
    </style>
    
</head>
<body>
    <div class="signup">
        
          
            <h1 class="h">Sign Up</h1>
            <hr>
        <div class="form">
           <form action="register.php" method="post"> 
            <table>
            <tr>
                <td><label for="fullname">Full name</label></td>
                <td><input type="text" placeholder="Name" name="fullname" id="fullname"></td>
            </tr>
            <tr>
                <td><label for="gender">Gender</label></td>
                <td>
                    <select id="gender" name="gender">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </td>

            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" placeholder="email" name="email"></td>
            </tr>
            <tr>
                <td><label for="dob">DOB</label></td>
                <td><input type="date" id="dob"></td>
            </tr>
            <Tr>
                <td><label for="phone_number">Phone number</label></td>
                <td><input type="tel"  name="phone_number" id="phone_number"></td>
            </Tr>
            <tr>
                <td><label for="username">Username</label></td>
                <td><input type="text" placeholder="Username" name="username"></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" placeholder="Password" name="password"></td>
            </tr>
            <tr>
                <td><label for="confirm_password">Confirm password</label></td>
                <td><input type="password" placeholder="confirm password" name="cpassword"></td>
            </tr>
                
                
            <tr>
                <td></td>
                
                
                <td><input type="submit" value="signup" class="signup_bt" name="signup"></td>
                
            </tr>
            </table>
                <?php 
                    if(isset($_POST['signup']))
                    {
                      //echo '<script type="text/javascript"> alert("create button clicked") </script>';
                      $fullname = $_POST['fullname'];
                      $email = $_POST['email'];
                     
                     
                     
                      $username = $_POST['username'];
                      $password = $_POST['password'];
                      $cpassword = $_POST['cpassword'];
                      
                      if($password==$cpassword)
                      {
                        $encrypted_password = md5($password);
                        $query="select * from login WHERE username='$username'";
                        $query_run= mysqli_query($con,$query);

                        if(mysqli_num_rows($query_run)>0)
                        {
                          //there is already a user with the same username
                          echo '<script type="text/javascript"> alert("User already exists .. try another username") </script>';

                        }
                        else
                        {
                          $query="insert into login values('$fullname','$email','$username','$password')";
                          $query_run= mysqli_query($con,$query);

                          if($query_run)
                          {
                            echo '<script type="text/javascript"> alert("succefully registered") </script>';

                          }
                          else
                          {
                            echo '<script type="text/javascript"> alert("error") </script>';
                          }
                        }
                      }
                      else{
                        echo '<script type="text/javascript"> alert("password and confirm password does not match") </script>';

                      }
                    } 
                  ?>
            </form>
            
        </div>
      </div>
</body>
</html>