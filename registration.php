<?php
include_once 'connection.php';
if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $email_address=$_POST['email'];
    $password=$_POST['password'];
    $passwordAgain=$_POST['password-again'];
    $empMsg='Please fill up this fieeld';


    if(!empty($username)&&!empty($email_address)){
        if($password===$passwordAgain){

        $query = "INSERT INTO `new_user`(`username`,`email_address`,`password`) VALUES(:username,:email_address,:password)";

        $stmt = $connection->prepare($query);
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':email_address',$email_address);
        $stmt->bindParam(':password',$password);
        $stmt->execute();
         
        if($stmt==true) {
            // echo 'user created';
            header('location:login.php?loginsuccess');
        }
        else{
            echo 'not created';
        }
    }
    else{
            echo 'not matched';
    }
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php include_once './layout/navbar.php' ?>
        <div class="row">
            <div class="col-4">

            </div>
            <div class="col-4" style="margin-top: 50px;">
                <form action="registration.php" method="POST">

                    <div class="mt-2">
                        <label class="form-label" for="username" >
                            User name
                        </label>
                            <input type="text" class="form-control"name="username" id="" value="<?php if(isset($_POST['submit'])){echo $username ;} ?>" >
                        
                        
                        <?php 
                            if(isset($_POST['submit'])&& $_POST['username']==false){
                                echo "<span class='text-danger'>".$empMsg."
                                </span>";
                            }
                        ?>
                    </div>
                    <div class="mt-2">
                        <label class="form-label" for="email">
                            Email
                        </label>
                            <input type="text" class="form-control"name="email" id="" value="<?php if(isset($_POST['submit'])){echo $email_address;} ?>">
                        
                        <?php 
                            if(isset($_POST['submit'])&& $_POST['email']==false){
                                echo "<span class='text-danger'>".$empMsg."
                                </span>";
                            }
                        ?> 
                    </div>
                    <div class="mt-2">
                        <label class="form-label" for="password">
                            Password
                        </label>
                            <input type="password" class="form-control"name="password" id="" value="<?php if(isset($_POST['submit'])){echo $password ;} ?>">
                        
                        <?php 
                            if(isset($_POST['submit'])&& $_POST['password']==false){
                                echo "<span class='text-danger'>".$empMsg."
                                </span>";
                            }
                        ?>
                    </div>
                    <div class="mt-2">
                        <label class="form-label" for="password-again">
                            Password Again
                        </label>
                        <input type="password" class="form-control" name="password-again" id="">

                        <?php 
                            if(isset($_POST['submit'])&& $_POST['password-again']==false){
                                echo "<span class='text-danger'>".$empMsg."
                                </span>";
                            }
                        ?> 
                    </div>
                    <div class="mt-2">
                        
                        <button class="btn btn-success btn-lg btn-block" name="submit">Submit</button>
                        
                    </div>

                </form>
            </div>
            <div class="col-4">
                
            </div>
        </div>
    </div>
</body>
</html>