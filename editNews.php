<?php
    include('incfile/dbconnect.php');
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('Location: logIn.php');
    }

    $session_username = $_SESSION['username'];
    $session_role = $_SESSION['role'];
    // echo $session_role;
    // echo  $session_username;
   if(isset($_GET['edit']))
    {
       // echo $session_role;
        $edit_id = $_GET['edit'];

        if( $session_role == 'admin'){
            
        $edit_query = "Select * from news where newsId = $edit_id ";
        $edit_result = $db->prepare($edit_query);
        $edit_result->execute();
        //$edit_result->rowCount();
    }
   
    if($edit_result->rowCount() > 0 )
    {
        foreach($db->query($edit_query) as $edit_row){
        $edit_title = $edit_row['title'];
        $edit_description = $edit_row['description'];
        $edit_tags = $edit_row['tags'];
        $edit_image = $edit_row['image'];
        $edit_status = $edit_row['status'];
        $edit_category = $edit_row['category'];
    }
   }
    elseif( $session_role == 'author')
    {
        //echo $session_role;
        
         $edit_query = "Select * from news where newsId = $edit_id and author = ' $session_role' ";
        $edit_result = $db->prepare($edit_query);
        $edit_result->execute();

         if($edit_result->rowCount() > 0 )
        {
            foreach($db->query($edit_query) as $edit_row){
            $edit_title = $edit_row['title'];
            $edit_description = $edit_row['description'];
            $edit_tags = $edit_row['tags'];
            $edit_image = $edit_row['image'];
            $edit_status = $edit_row['status'];
            $edit_category = $edit_row['category'];
        }
        }
    }
  // echo $edit_result->rowCount();
        // if($edit_result->rowCount() > 0 )
        // {
        //     foreach($db->query($edit_query) as $edit_row){
        //     $edit_title = $edit_row['title'];
        //     $edit_description = $edit_row['description'];
        //     $edit_tags = $edit_row['tags'];
        //     $edit_image = $edit_row['image'];
        //     $edit_status = $edit_row['status'];
        //     $edit_category = $edit_row['category'];
        // }
        // }
        else{
            header('Location: editNews.php');
           //echo"test";
        }
}
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="icon" type="image/ico" href="images/favicon.ico"> -->
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
                    <h1> <i class="fa fa-pencil" aria-hidden="true"></i> Edit News </h1>
                    <hr class="lineDashboard">
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li class="active"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit News
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
                            // $description = $_POST['description'];
                            $description1 = $db->quote($_POST['description']);
                            $tags = $_POST['tags'];
                            $status = $_POST['status'];
                            $category = $_POST['category'];
                            $path = "admin/media".$image;
                            
                            $update_query="Update news SET title = '$title', description = $description1, tags='$tags', status ='$status', image = '$image', category ='$category' where newsId = '$edit_id'"; 

                            // echo $status;
                            $result=$db->prepare( $update_query);
                            $result->execute();
                            $mediapath= "media/".$image; 
                            if( move_uploaded_file($tmp_image,$path))
                            {
                                $path = "admin/media".$image;
                                $mediapath= "media/".$image; 
                                copy($path, $mediapath);
                            }
                            if($result){
                                $msg="News updated successfully"."<br>";
                                $msg .=  "View in News Tab";
                            }
                            else{
                                 $error="News not updated ";
                            }
                        }
                      ?>  
                    <div class="row">
                        <div class="col-xs-12">
                             <form action="" method="post" enctype="multipart/form-data">
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
                            <div class="form-group">
                                <label for="title" name="title">Title:*</label>
                                <input type="text" name="title" placeholder="Type Title Here" class="form-control"  value="<?php if(isset($edit_title)){echo $edit_title;}?>" /> 
                                </div>
                                <!--form-grp-->
                                <div class="form-group">
                                 
                               <a href="media.php" class="btn btn-primary">Add Media</a>
                                </div>
                                <!--form-grp-->
                                 <?php require_once('incfile/textarea.php');?>
                                <div class="form-group">
                                <textarea rows="10" cols="10" name="description" id="textarea" class="form-control" >
                                     <?php if(isset($edit_description)){echo $edit_description;}?>
                                </textarea>
                                </div>
                                <!--form-grp-->
                                <div class="row">
                                         <div class="col-sm-6">
                                              <div class="form-group">
                                              
                                              <label for="media" >Post Image:*</label>
                                                <!---->
                                               <input type="file" name="media" />

                                              </div>
                                              <!--form group-->
                                               </div>
                                               <!--col-->
                                             <div class="col-sm-6">
                                                <div class="form-group">
                                                   
                                              <label for="category" >Categories:*</label>
                                               <select name="category" class="form-control" >
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
                                                                echo "<option  value='".$category."' ><?php if(isset($edit_category)){echo $edit_category;}?>$category</option>";
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
                                                <input type="text" name="tags"  class="form-control" value="<?php if(isset($edit_tags)){echo $edit_tags;}?>"/>
                                              </div>
                                              <!--form group-->
                                               </div>
                                               <!--col-->
                                             <div class="col-sm-6">
                                                <div class="form-group">

                                              <label for="status" >Status:*</label>
                                             
                                                <select name="status" id="status" class="form-control">
                                              
                                             
                                                  <option value="Published" <?php if(isset($status) and $status ='published'){echo "selected";}?>>Published</option>
                                                  <option value="draft"<?php if(isset($status) and $status ='draft'){echo "selected";}?>>Draft</option>
                                                   <option value="updated" <?php if(isset($status) and $status ='updated'){echo "selected";}?>>Updated</option>
                                                  
                                             
                                                 </select>
                                             
                                               
                                              </div>
                                              <!--form group-->
                                               </div>
                                               <!--col-->
                                                 </div>
                                                 <!--col ends-->
                                                 </div>
                                                 <!--row-->
                                        <input type="submit" class="btn btn-primary"  value="Update News" name="submit"/>  
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