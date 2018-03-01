<?php
    include('incfile/dbconnect.php');

    session_start();
    if(!isset($_SESSION['username']))
    {
        header('Location: logIn.php');
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
                    <h1> <i class="fa fa-database" aria-hidden="true"></i> Media <small>Add or View Media</small></h1>
                    <hr class="lineDashboard">
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li class="active"> <i class="fa fa-database" aria-hidden="true"></i> Media </li>
                    </ol>
                    <?php
                    $msg="";
                    $db = new PDO($dsn, $username, $password);
                    if(isset($_POST['submit']))
                    {
                        // echo"test";
                        $image = $_FILES["media"]["name"];
                        $tmp_image =  $_FILES["media"]["tmp_name"];
                        $path = "admin/media/".$image;
                        $query="Insert into media (image) values ('$image')";
                        $result=$db->prepare($query);
                        $result ->execute();
                         $mediapath= "media/".$image;  
                        //$success= move_uploaded_file($tmp_name,$path);
                        if(move_uploaded_file($tmp_image,$path))
                        {
                         
                        $mediapath= "media/".$image;  

                            $msg="Success";
                            // if(move_uploaded_file($tmp_name,$path)){
                            copy($path, $mediapath);
                            // }
                        }else{
                            $msg="error";
                        }
                        unset($_POST['submit']);
                       echo "<meta http-equiv='refresh' content='0'>";
                    }                    
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                      
                        <div class="col-xs-8 col-sm-4">
                            <input type="file" name="media" required >
                            </div>
                             <div class="col-xs-8 col-sm-4">
                                 <input type="submit" name="submit" class="btn btn-primary btn-sm" value="Add Media">
                            </div>
                        </div>
                        <!--row-->
                        </form>
                        <!--<hr style="width:1px;">-->
                       <div class="row">
                         <?php
                        $db = new PDO($dsn, $username,$password);
                        $get_query = "Select * from media ORDER BY id DESC";
                        $get_result = $db->prepare($get_query);
                        $get_result->execute();
                        if($get_result -> rowCount() > 0){
                            foreach($get_result as $row){
                                $get_image = $row['image'];
                        ?>
                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 thumb">
                            <a href="" class="thumbnail">
                                <img src="admin/media/<?php echo $get_image; ?>" alt="image" width="100%" name="image">
                                </a>
                        </div> 
                        <?php
                            }
                        }
                        else{
                            echo "<center><h2>No media available</h2></center>";
                        }
                       ?>    
                      
                </div>
            </div>
        </div>
    </section>
    <?php require_once('incfile/footerAdmin.php');?>
    </div>
</body>

</html>