<?php
    include('incfile/dbconnect.php');

    session_start();
    if(!isset($_SESSION['username']))
    {
        header('Location: logIn.php');
    }
 $session_username =  $_SESSION['username'] ;
  
     $db = new PDO($dsn, $username, $password);
 
   $sqlprofile = "Select * from users where username = '$session_username'";
  
   $result_profile = $db->prepare($sqlprofile);
   $result_profile->execute();
   
      
                        while ($row = $result_profile->fetch(PDO::FETCH_ASSOC))
                         {
                          $image = $row['image'];
                        $id = $row['id'];
                        $date = $row['date'];
                        $firstName = $row['firstName'];
                        $lastName = $row['lastName'];
                        $email = $row['email'];
                        $role = $row['role'];
                        $details = $row['details'];
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
    <link rel="stylesheet" href="css/mobile.css">
    <!-- Optional JavaScript -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body id="profile">
    <div id="wrapper">
   <?php require_once('incfile/headerAdmin.php');?>


    <section>
        <div class="container-fluid body-section">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <?php require_once('incfile/sideBarAdmin.php');?>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12 sideBarTopDashBoard">
                    <h1> <i class="fa fa-user" aria-hidden="true"></i> User Profile <small>Personal Details</small></h1>
                    <hr class="lineDashboard">
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li class="active"> <i class="fa fa-user" aria-hidden="true"></i> Profile </li>
                    </ol>
                   
                  
                   
                    <div class="row">
                        <div class="col-xs-12">
                             <center><img src="images/<?php echo $image;?>" id="profile-image" alt="image" name="image" width="200px" class="img-circle img-thumbnail"></center><br>
                    <a href="editProfile.php?id=<?php echo $id;?>" class="btn btn-primary pull-right" >Edit Profile</a><br><br>
                    <center>
                       <h3>Profile Details</h3>
                    </center><br>
                    <table class="table table-bordered">
                        
                            <tr>
                                <td width="20%"><b>User Id:</b></td>
                                <td width="30%"><?php echo $id;?> </td>
                                 <td width="20%"><b>Sign Up Date:</b></td>
                                  <td width="30%"><?php echo date('d M Y', strtotime($date));?></td>
                            </tr>
                             <tr>
                                <td width="20%"><b>First Nmae:</b></td>
                                <td width="30%"><?php echo $firstName;?></td>
                                 <td width="20%"><b>LastName:</b></td>
                                  <td width="30%"><?php echo $lastName;?></td>
                            </tr>
                             <tr>
                                <td width="20%"><b>User Name:</b></td>
                                <td width="30%"><?php echo $session_username;?></td>
                                 <td width="20%"><b>Email:</b></td>
                                  <td width="30%"><?php echo $email;?></td>
                            </tr>
                             <tr>
                                <td width="20%"><b>Role:</b></td>
                                <td width="30%"><?php echo $role;?></td>
                                 <td width="20%"><b></b></td>
                                  <td width="30%"></td>
                            </tr>
                       
                    </table>
                    <div class="row">
                        <div class="col-lg-8 col-sm-12">
                            <b>Details:</b>
                            <div><?php echo $details;?></div>
                            </div>
                    </div>
                        <!--row-->
                            </div>
                        </div>
                        <!--row-->
                  </div>
            </div>
        </div>
    </section>
    <?php require_once('incfile/footerAdmin.php');?>
    </div>
</body>

</html>