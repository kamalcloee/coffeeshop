<?php
   require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .catering
        {
            background-image: url(img/cat.jpg);
            height: 550px;
            width:1250px;
            background-size: cover;
            position: absolute;
            border-radius: 10px;
        }
        h2
        {
            border: solid 2px black;
            text-align: center;
            border-radius: 3px;
        }
        
        .form
        {
            border:solid 10px black;
            width:180px;
            padding: 40px;
            position: relative;
            margin-left: 800px;
            margin-top: 50px;
            border-radius: 3px;
            
        
        }
        .n
        {
            padding-bottom: 10px;
        }
       
    </style>
    
</head>
<body>
     <h2>CATERING ENQUIRY</h2>
        <div class="catering">
           
                <div class="form">
                  
                    
                   <form action="cattering1.php" method="post"> 
                  <input name="Name" type="text" placeholder="name">
                       <br>
                       <br>
                  <input name="email" type="email" placeholder="email">
                       
                       <br>
                       <br>
                       <input name="date" type="date" placeholder="">
                       
                       <br>
                       <br>
                       <input name="message" type="text" class="n">
                       <br>
                       <br>
                       
                  <input name="catering" type="submit" value="book">
                
                    <?php   
                       if(isset($_POST['catering']))
                    {
                      
                      $firstname = $_POST['Name'];
                      $email = $_POST['email'];
                    $date = $_POST['date'];
                      $message = $_POST['message'];
                      
                     
                       
                      $query="insert into service values('$firstname','$email','$date','$message')";
                     $query_run= mysqli_query($con,$query);

                          if($query_run)
                          {
                            echo '<script type="text/javascript"> alert("added") </script>';

                          }
                          else
                          {
                            echo '<script type="text/javascript"> alert("error") </script>';
                          }
                        }
                    else
                    {
                       echo '<script type="text/javascript"> alert("b error") </script>';

                  }
                     
                  ?>
                
                    </form>
                </div>
              </div>

</body>
</html>