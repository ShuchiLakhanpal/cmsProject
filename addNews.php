<?php
    include('incfile/dbconnect.php');
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('Location: logIn.php');
    }

    $session_username = $_SESSION['username'];
   
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
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <!--<script src="js/textarea.js"></script>-->
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
                    <h1> <i class="fa fa-plus-square" aria-hidden="true"></i> Add News </h1>
                    <hr class="lineDashboard">
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li class="active"> <i class="fa fa-plus-square" aria-hidden="true"></i> Add News
 </li>
                    </ol>
                      <?php
                        // $msg="";
                    $db = new PDO($dsn, $username, $password);
                    if(isset($_POST['submit']))
                    {
                        $image = $_FILES['media']['name'];
                        $tmp_image =  $_FILES['media']['tmp_name'];
                        $date = date( 'Y-m-d' );
                        $title = $_POST['title'];
                        $description1 = $db->quote($_POST['description']);
                        //echo $description1;
                        //exit();
                        $tags = $_POST['tags'];
                        $status = $_POST['status'];
                        $category = $_POST['category'];
                        //$author = $_POST['author'];
                        //  if(!isset($_FILES['image'])){
                        //  $image = $_FILES["image"]["name"];
                        //  }
                        //  $tmp_name = $_FILES["image"]["tmp_name"];
                        // $path = "";
                        $path = "admin/media/".$image;
                            
                        $insert_query="insert into news(date, title, description, author, tags, status, image, category) values('$date',' $title', $description1,'$session_username', '$tags','$status','$image','$category')";
                        // echo $status;
                        $result=$db->prepare($insert_query);
                        $result->execute();
                        $mediapath= "media/".$image;
                        // $success= move_uploaded_file($tmp_name,$path);
                        // $save=$db->query($insert_query);  
                        if(move_uploaded_file($tmp_image,$path))
                        {
                            $path = "admin/media/".$image;
                            $mediapath= "media/".$image; 
                            //if(move_uploaded_file($tmp_name,$path)){
                            copy($path, $mediapath);
                            //} 

                            //$msg="News uploaded successfully";
                            // move_uploaded_file($tmp_name,$path);
                        }

                        if($result){
                            $msg="News uploaded successfully"."<br>";
                            $msg .=  "View in News Tab";
                        }else{
                            $error="News not uploaded ";
                        } 
                      }
                      ?>  
                    <div class="row">
                        <div class="col-xs-12">
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
                                <label for="title" name="title">Title:*</label>
                                <input type="text" name="title" placeholder="Type Title Here" class="form-control"/>
                                </div>
                                <!--form-grp-->
                                <div class="form-group">
                               <a href="media.php" class="btn btn-primary">Add Media</a>
                                </div>
                                <!--form-grp-->
                                 <?php require_once('incfile/textarea.php');?>
                                <div class="form-group">
                                <textarea rows="10" cols="10" name="description" id="textarea" class="form-control">
                                    <?php if(isset($description)){echo $description;}?>
                                </textarea>
                                </div>
                                <!--form-grp-->
                                <div class="row">
                                         <div class="col-sm-6">
                                              <div class="form-group">
                                              <label for="media" >Post Image:*</label>
                                                <!---->
                                               <input type="file" name="media" >
                                               
                                              </div>
                                              <!--form group-->
                                               </div>
                                               <!--col-->
                                             <div class="col-sm-6">
                                                <div class="form-group">
                                                   
                                              <label for="category" >Categories:*</label>
                                               <select name="category" class="form-control">
                                                 <?php
                                                      $db = new PDO($dsn, $username, $password);

                                                        $sql = "Select category from category ORDER BY category ASC ";
                                                        $results = $db->prepare($sql);
                                                        $results->execute();
                                                         try{
                                               // echo $results -> rowCount() ;

                                                 if($results -> rowCount() > 0){
                                                foreach ($db->query($sql) as $row)
                                                {
                                                  $category = ucfirst($row['category']);

                                                 echo"<option  value='".$category."'>$category</option>";
                                                  }
                                                 }else{
                                                    echo "<center><h6>No categories available</h6></center>";
                                                 }
                                            }
                                                catch(PDOException $e)
                                                {
                                                    echo "Error: ". $e->getMessage();
                                                }

                                            
                                        ?>    
                                                       
                                                   </select>
                                                    
                                                 
                                                  
                                              
                                              </div>
                                              <!--form group-->
                                               </div>
                                               <!--col-->
                                                 </div>
                                                 <!--col ends-->
                                                 </div>
                                                 <!--row-->
                                                  <div class="row">
                                         <div class="col-sm-6">
                                              <div class="form-group">
                                              <label for="tags" >Tags:*</label>
                                                <input type="text" name="tags"  class="form-control"/>
                                              </div>
                                              <!--form group-->
                                               </div>
                                               <!--col-->
                                             <div class="col-sm-6">
                                                <div class="form-group">

                                              <label for="status" >Status:*</label>
                                             
                                                <select name="status" id="status" class="form-control">
                                              
                                             
                                                  <option value="Published" >Published</option>
                                                  <option value="draft" >Draft</option>
                                                   <option value="updated" >Updated</option>
                                                  
                                             
                                                 </select>
                                             
                                               
                                              </div>
                                              <!--form group-->
                                               </div>
                                               <!--col-->
                                                 </div>
                                                 <!--col ends-->
                                                 </div>
                                                 <!--row-->
                                        <input type="submit" class="btn btn-primary"  value="Add News" name="submit"/>  
                            </form>
                            </div>
                            <!--col ends-->
                        </div>
                        <!--row ends-->

                </div>
            </div>
        </div>
    </section>
    <?php require_once('incfile/footerAdmin.php');?>
    </div>
</body>

</html>