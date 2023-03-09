<?php
    session_start();
    $connection = new mysqli('localhost','root','','userdb');
    if(! $connection){
        echo 'not connected with database';
         var_dump($connection) ;
    }
    else{
        // echo 'connected';
    }

    if(isset($_POST['submit'])){
 
        $email=$_POST['email'];
        $password=$_POST['password'];
       
        $empMsg='Please fill up this field';
       
       if(!empty($password)&&!empty($email)){

           $sql= "SELECT * FROM approved_user WHERE email='$email' AND user_type='admin' ";
           $query=$connection->query($sql);
          
               if($query->num_rows>0){
                  
                   $_SESSION['login']='login success';
                   header('location:admindashboard.php') ;
               }
               else{

               $sql= "SELECT * FROM approved_user WHERE email='$email' AND password='$password' ";
               $query=$connection->query($sql);

               if($query->num_rows>0){
                   $_SESSION['login']='login success';
                   header('location:dashboard.php') ;
               }
               else{
                   // echo 'not found';
                   header('location:waitingpage.php') ;
               }

               }
           
                
                       
               }
    };






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <?php include_once './layout/navbar.php' ?>
<h1>login system</h1>

<div class="container">
    <div class="row">
        <div class="col-4">

        </div>
        <div class="col-4" style="margin-top: 50px;">

            <?php
              if( isset( $_GET['loginsuccess'])){
                echo 'user created !now log in';
              };
            ?>
            <form action="login.php" method="POST">
                <div class="mt-2">
                    <label class="form-label" for="email">
                        Email
                    </label>
                        <input type="text" class="form-control"name="email" id="" required>
                    
                </div>
                <div class="mt-2">
                    <label class="form-label" for="password">
                        Password
                    </label>
                        <input type="password" class="form-control"name="password" id="" required>
                    
                </div>
                <div class="mt-2">
                    
                    <button class="btn btn-success btn-lg btn-block" name="submit">Login</button>
                    
                </div>
                or
                <a href="registration.php">Registration</a>

            </form>
        </div>
        <div class="col-4">
            
        </div>
    </div>
</div>
</body>
</html>