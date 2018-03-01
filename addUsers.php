<?php
    include('incfile/dbconnect.php');
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('Location: logIn.php');
    }
    else if(isset($_SESSION['username']) && ($_SESSION['role'] == 'author'))
    {
        header('Location: dashboard.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="images/x-icon" href="images/logoNews.png" width="1em" height="1em">
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Admin Panel</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/users.css">
    <link rel="stylesheet" href="css/mobile.css">
    <!-- Optional JavaScript -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <script src="js/login.js"></script> -->
</head>

<body>
    </div id="wrapper">
    <?php require_once('incfile/headerAdmin.php');?>

    <section>
        <div class="container-fluid body-section">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <?php require_once('incfile/sideBarAdmin.php');?>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12 sideBarTopDashBoard">
                    <h2> <i class="fa fa-user-plus" aria-hidden="true"></i> Add New User </h2>
                    <hr class="lineDashboard">
                    <ol class="breadcrumb">
                        <li><a href="dashboard.html">Dashboard</a></li>
                        <li class="active"> <i class="fa fa-user-plus" aria-hidden="true"></i> Add New User</li>
                    </ol>
                    <?php
                      $db = new PDO($dsn, $username, $password);
                    if(isset($_POST['submit']))
                    {
                        $date = date( 'Y-m-d' );
                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $username = strtolower($_POST['username']);
                        $username_trim = preg_replace('/\s\s+/', ' ', $username);
                        $email = strtolower($_POST['email']);
                        $password = $_POST['password'];
                        $role = $_POST['role'];
                        $image = $_FILES['image']['name'];
                        $tmp_image = $_FILES['image']['tmp_name'];
                        $path = "images/".$image;
                         // $mediapath= "media/$image";
                        $mediapath= "images/".$image;
                        $check_query="Select * from users where username ='$username' or email = '$email' ";
                        $results = $db->prepare($check_query);
                        $results->execute();
                        if(empty($firstname) or empty($lastname) or empty($username) or empty($email) or empty($password) or empty($role) or empty($image))
                         {
                             $error = "All fields required";
                         }
                    //     if($username != $username_trim){
                    //         echo" Please enter a valid username";
                    //     }
                    //     else 
                    if($results -> rowCount() > 0)
                        {
                            $error = "Username or Email already exist";
                        }
                        else{
                           // $db = new PDO($dsn, $username, $password);
                            global $db;
                           
                            $insert_query = "Insert into users (firstName, lastName, username, email, password, role, date, image) values(:firstname,:lastname, :username,:email
                            , :password, :role,:date, :image)";
                            $result = $db->prepare($insert_query); 
                            $result->execute(array(':firstname'=>$firstname ,':lastname'=> $lastname,':username'=>$username, ':email'=>$email, ':password'=>$password,
                            ':role'=>$role,':date'=>$date,':image'=>$image));
                           // $save = $db->query($insert_query);
                            // echo"test";
                            
                            if( move_uploaded_file($tmp_image,$path))
                            { //echo"success";
                               
                                $mediapath= "images/".$image; 
                                move_uploaded_file($tmp_image,"images/".$image);
                                copy($path, $mediapath);
                                $image_check =$db->prepare("Select * from users ORDER BY id DESC Limit 1");
                                $image_check ->execute();
                                $image_row = $image_check->fetch(PDO::FETCH_ASSOC);
                                //echo"image";
                                $check_image = $image_row['image'];

                                //  $msg ="User added";
                            }
                            
                            else{
                                $error="User has not been added";
                            }
                        }
                         unset($_POST['submit']);
                          $msg ="User added";
                       //echo "<meta http-equiv='refresh' content='0'>";
                    }
                    

                    ?>
                    <div class="row">
                        <div class="col-md-8">
                 <form action="" method="post" enctype="multipart/form-data" >
                     <div class="form-group">
                         <?php
                          if(isset($error))
                          {
                              echo"<span class='pull-right' style='color:red;'>$error </span>";
                          }
                          elseif(isset($msg))
                            {
                              echo"<span class='pull-right' style='color:green;'>$msg </span>";
                          }
                          ?>
                          <label for="firstname" >First Name:*</label>
                          
                          <input type="text"id="firstname"  name="firstname" class="form-control" placeholder="First Name"  />
                         </div>
                         <!--form group-->
                         <div class="form-group">
                          <label for="lastname" >Last Name:*</label>
                          <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last Name"  />
                         </div>                         <!--form group-->
                         <div class="form-group">
                          <label for="username" >UserName:*</label>
                          <input type="text" id="username" name="username" class="form-control" placeholder="UserName" />
                         </div>
                         <!--form group-->
                         <div class="form-group">
                          <label for="email" >Email:*</label>
                          <input type="text" id="email" name="email" class="form-control" placeholder="name@gmail.com"/>
                         </div>
                         <!--form group-->
                         <div class="form-group">
                          <label for="password" >Password:*</label>
                          <input type="password"  id="password" name="password" class="form-control" placeholder="password"/>
                         </div>
                         <!--form group-->
                         <div class="form-group">
                          <label for="role" >Role:*</label>
                          <select id="role" name="role" class="form-control">
                               <option value="admin" >Admin</option>
                              <option value="author" >Author</option>
                              </select>
                         </div>
                         <!--form group-->
                         <div class="form-group">
                          <label for="image" >Profile Picture:*</label>
                          <input type="file"  id="image" name="image" />
                         </div>
                         <!--form group-->
                         <input type="submit" name="submit" value="Add User" id='validate' class="btn btn-primary"/>
                     </form>
                     </div>
                     <!--col-->
                     <div class="col-md-4">
                         <?php
                         if(isset($check_image))
                         { 
                            echo"<img src='images/$check_image' width='100%'>";
                         }
                        //  else{
                        //      echo"No Image avaialable";
                        //  }

                         ?>
                         </div>
                     </div>
                     <!--row-->
                </div>
                <!--col-9-->
            </div>
        </div>
    </section>
     <?php require_once('incfile/footerAdmin.php');?>
    </div>
</body>

</html>