<?php
    include('incfile/dbconnect.php');
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('Location: logIn.php');
    }
    
    $session_username =  $_SESSION['username'] ;
  
  if(isset($_GET['id']))
    {
        $edit_id = $_GET['id'];
        $edit_query = "Select * from users where id = $edit_id";
        $edit_result = $db->prepare($edit_query);
        $edit_result->execute();
        if($edit_result->rowCount() > 0 )
        {
            foreach($db->query($edit_query) as $edit_row){
            $edit_firstname = $edit_row['firstName'];
            $edit_lastname = $edit_row['lastName'];
           
            $edit_image = $edit_row['image'];
            $edit_details = $edit_row['details'];
        }
        }
        else{
            header('Location: dashboard.php');
           //echo"test";
        }
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
</head>

<body>
    <div id="wrapper">
    <?php require_once('incfile/headerAdmin.php');?>

    <section>
        <div class="container-fluid body-section">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <?php require_once('incfile/sideBarAdmin.php');?>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12 sideBarTopDashBoard">
                    <h2> <i class="fa fa-user" aria-hidden="true"></i> Edit Profile </h2>
                    <hr class="lineDashboard">
                    <ol class="breadcrumb">
                        <li><a href="dashboard.html">Dashboard</a></li>
                        <li class="active"> <i class="fa fa-user" aria-hidden="true"></i> Edit Profile</li>
                    </ol>
                    <?php
                    $db = new PDO($dsn, $username, $password);
        if(isset($_POST['submit']))
        {
            // $date = date( 'Y-m-d' );
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            // $role = $_POST['role'];
            $image = $_FILES['image']['name'];
            $tmp_image = $_FILES['image']['tmp_name'];
            $details = $_POST['details'];
            
            if(!empty($firstname) or !empty($lastname)  or !empty($role) or !empty($image))
            {                          
                global $db;
                $update_query = "update users SET firstName='$firstname' ,lastName ='$lastname', details ='$details', image = '$image' 
               where id =' $edit_id' ";
                $update_result = $db->prepare($update_query);
                $update_result-> execute();
                    if(!empty($image))
                    {
                        move_uploaded_file($tmp_image,"images/$image");
                    
                    // $image_check =$db->prepare("Select * from users ORDER BY id DESC Limit 1");
                    //$image_check ->execute();
                    // $image_row = $image_check->fetch(PDO::FETCH_ASSOC);
                    //echo"image";
                    // $check_image = $image_row['image'];
            }
           }
              else{
            $error="Profile not edited ";
            }
                             
            $msg="Profile uploaded successfully";
            unset($_POST['submit']);
            //echo "<meta http-equiv='refresh' content='0'>";
        }
                   
?>
                
                    <div class="row">
                        <div class="col-md-8">
                 <form action="" method="post" enctype="multipart/form-data">
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
                          
                          <input type="text"id="firstname"  name="firstname" class="form-control" placeholder="First Name" value="<?php if(isset($edit_firstname)){echo $edit_firstname;}?>"/>
                         </div>
                         <!--form group-->
                         <div class="form-group">
                          <label for="lastname" >Last Name:*</label>
                          <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last Name" value="<?php if(isset($edit_lastname)){echo $edit_lastname;}?>" />
                         </div>
                        
                         
                         <!--form group-->
                         <div class="form-group">
                          <label for="image" >Profile Picture:*</label>
                          <input type="file"  id="image" name="image" />
                         </div>
                          <div class="form-group">
                          <label for="details" >Details:*</label>
                          <!--<input type="text"id="email" name="email" class="form-control" placeholder="name@gmail.com"/>-->
                          <textarea rows="10"class="form-control" name="details" >
                              <?php if(isset($edit_details)){echo $edit_details;}?>
                          </textarea>
                         </div>
                         <!--form group-->
                         <input type="submit" name="submit" value="Edit User" class="btn btn-primary"/>
                     </form>
                     </div>
                     <!--col-->
                   
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