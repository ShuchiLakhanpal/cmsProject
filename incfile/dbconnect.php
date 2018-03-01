<?php

// echo'test';
      $dsn= "mysql:host=sql302.byethost7.com;dbname=b7_19983540_newscms;charset=utf8";
      $username='b7_19983540';
      $password = 'Aseem@22'; 
      // $dbname ='b7_19983540_newscms';
      // $dbhost = 'sql302.byethost7.com';
    // $dsn = "mysql: host = localhost; dbname=newscms; charset=utf8";
     // $username="root";
     // $password = "";
    //  trios developer

    // $dsn= "mysql:host=localhost;dbname=slakhanpaldb;charset=utf8";
    //   $username="S.Lakhanpal";
    //   $password = "223eJza5"; 
        try {
     // first connect to database with the PDO object. 
      // $db = new PDO($dsn,$username,$password,[  

      //  PDO::ATTR_EMULATE_PREPARES => false, 
      //  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

      // ]);
      $db = new PDO($dsn,$username,$password);
      // echo "connected";
 } catch(PDOException $e){
     // if connection fails, show PDO error. 
   echo "Error connecting to mysql: ". $e->getMessage();
 }
     
      

?>
