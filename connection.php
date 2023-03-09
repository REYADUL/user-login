<?php
    // $connection = new mysqli('localhost','root','','');
    // if(! $connection){
    //     echo 'not connected with database';
    //      var_dump($connection) ;
    // }
    // else{
    //     echo 'connected';
    // }
     define('DSN','mysql:dbname=userdb;host=localhost');
     define('DSN1','mysql:dbname=;host=localhost');
     define('USERNAME','root');
     define('PASSWORD','');
     try{
         $connection = new PDO(DSN,USERNAME,PASSWORD);
        //  var_dump($connection);
         $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
     }
     catch(PDOException $exception){
         echo $exception->getMessage();
     }   
?>