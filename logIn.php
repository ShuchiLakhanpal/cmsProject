<?php
//ob_start();
 include('incfile/dbconnect.php');
session_start();

     $db = new PDO($dsn, $username, $password);

 if(isset($_POST['submit']))
 {
     $username = strtolower($_POST['username']);
     $password = $_POST['password'];
    // $role =$_POST['role'];
     $check_username_query ="Select * from users where username ='$username'";
     $result = $db->prepare($check_username_query);
     $result->execute();
     if($result -> rowCount() > 0) 
     {
         foreach ($db->query($check_username_query) as $row) {
       
         $db_username = $row['username'];
         $db_password = $row['password'];
         $db_role = $row['role'];
        // $db_author_image = $row['image'];
         

          // $password = crypt($password,$db_password);
           if($username == $db_username && $password == $db_password)
           { 
               header('Location:dashboard.php');
               $_SESSION['username'] = $db_username;
               $_SESSION['role'] = $db_role;
              // $_SESSION['author_image'] = $db_author_image;

           }
           else
           {
         $error = "Wrong username or password";
     }
     }
     }
     else{
         $error = "Wrong username or password";
     }
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="images/x-icon" href="images/logoNews.png" width="1em" height="1em">
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/mobile.css">

    <title>LogIn | News Admin</title>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->

    <!-- Custom styles for this template -->
    <link href="css/adminLogIn.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="container">

        <form class="form-signin" action="" method="post">
            <h2 class="form-signin-heading">Please sign in</h2>
            <label for="inputEmail" class="sr-only">User Name</label>
            <input type="text" name="username" id="inputEmail" class="form-control" placeholder="User Name" required autofocus><br><br>
            <?php
            if(isset($error)){
            echo $error;
            }
            ?>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <div class="checkbox">
                <label>
            <!--<input type="checkbox" value="remember-me"> Remember me-->
          </label>
            </div>
            <input type="submit" name="submit" value="Sign In" class="btn btn-lg btn-primary btn-block"/>

            
        </form>

    </div>
    <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
</body>

</html>