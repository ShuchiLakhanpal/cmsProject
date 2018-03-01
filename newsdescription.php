<?php

// echo'test';
    include('./incfile/dbconnect.php');
 
    $db = new PDO($dsn,$username,$password); 
    if(isset($_GET['newsId']))
    {
         $news_id =  $_GET['newsId']; 
         $sql = "Select * from news where status = 'published' and newsId = '$news_id' ";
         $result = $db->prepare($sql);
         $result->execute();
        try{
         if($result -> rowCount() > 0)
         {
            // echo "test";
            foreach($db->query($sql) as $row)
            {
                 //echo "test2";
                $id = $row['newsId'] ;
                $date = $row['date'];
                $category = $row['category'];
                $title = $row['title'];
                $image = $row['image'];
                $description = $row['description'];
                $author = $row['author'];
                 }
                            }
                                else{
                                        header('Location :index.php');
                                    }
                            } 
      
                             catch(PDOException $e)
                    {
                        echo"Error:" .$e->getMessage();
                    }
      }
         ?>
<!doctype html>
<html lang="en">

<head>
    <title>CMS News Website</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="icon" href="img/favicon.ico" type="image/ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="images/x-icon" href="images/logoNews.png" width="1em" height="1em">
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/newsdescription.css">
    <link rel="stylesheet" href="css/mobile.css">
    <!-- Optional JavaScript -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--<script src="js/ticker.js"></script>-->
</head>

<body>
    <?php require_once('incfile/navbar.php');?>

<div id="wrapper">
    <section class="topNews">
        <section class="container">
            <section class="row sideBar">
                <section class="col-md-8">
               
                    <section class="news">
                        <section class="row">
                            <div class="col-md-2 news-date">
                                <div class="day month year"><?php echo date('d M Y', strtotime($date));?></div>
                                <!--day ends-->
                                
                            </div>
                            <!--ends first col-md-2-->
                            <div class="col-md-10 news-title">
                                <a href="#">
                                    <h2><?php echo $title; ?></h2>
                                </a>
                                <p>Written by:<span><?php echo ucfirst($author); ?></span></p>
                            </div>
                            <!--ends col-md-8-->
                            <!--<div class="col-md-2 "></div>-->
                            <!--ends col-md-2 second-->
                        <!--</section>-->
                       
                        <!--row-->
                       <img src="media/<?php echo $image;?>" class="imageNews" alt="image">
                        
                        <section class="description">
                           
                            <div class="col-md-12">
                               <?php echo $description;?>
                                <br><br>
                            </div>
                        </section>
                        </section>
                         </section>
                        <!--ends class description-->
                      <div class="news">
                        <section class="relatedNews">
                            <h4> Related News</h4>
                            <hr class="headerRelated">
                            <div class="row">
                                  <?php
                                //   if(isset($_GET['newsId']))
                                //       {
                                //      $news_id =  $_GET['newsId']; 
                                    $db = new PDO($dsn, $username, $password);
                                    
                                    $re_query ="Select * from news where status='published' and title LIKE '%$title%' LIMIT 3 ";
                                    $results = $db->prepare($re_query);
                                    $results->execute();
                                    //echo $results -> rowCount();
                                    if($results -> rowCount() > 0)
                                    {
                                         foreach($db->query($re_query) as $row)
                                         {
                                            $r_id = $row['newsId'];
                                            $r_image = $row['image'];
                                            $r_title = $row['title'];
                                            

                                    ?>
                                <div class="col-sm-4">
                                    <a href="newsdescription.php?newsId=<?php echo $r_id;?>" ><img src="media/<?php echo $r_image;?>" alt="related news">
                                        <h5><?php echo $r_title;?></h5>
                                    </a>
                                </div>
                                <?php
                                        }
                                    }
                                    //  }
                                ?>
                                
                            </div>
                        </section>
                       </div>
                        <!--ends related news-->
                        <div class="news">
                        <section class="author">
                            <div class="row">
                                <h3>Author:</h3>
                                <!--<div class="col-sm-3">
                                    <img src="images/news-logo.png" class="img-circle" alt="imge Profile ">
                                </div>-->
                                <div class="col-sm-12">
                                    <h4><?php echo $author;?></h4>
                                    <?php
                                    $sql_details = "Select * from users where username = '$author'";
                                    $result_details = $db->prepare($sql_details);
                                    $result_details->execute();
                                    if($result_details-> rowCount() > 0)
                                    {
                                        foreach($db-> query($sql_details) as $row){
                                        $author_details = $row['details'];

                                ?>
                                    <p>
                                       <?php echo $author_details;?>
                                    </p>
                                    <?php
                                    }
                                    }
                                    else
                                    {
                                        echo "<center><h4>No details available</center></h4>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <!--end of row-->
                        </section>
                        <!--end author-->
                        </div>
                        <?php
                        $db = new PDO($dsn, $username, $password);
                        $comm_query = "Select * from comments Where status = 'approved' and newsId =$news_id ORDER By id DESC";
                        $comm_result = $db->prepare($comm_query);
                        $comm_result->execute();
                        if($comm_result->rowCount() > 0)
                        {

                        ?>
                         <div class="news">
                        <section class="comment">
                            <h4>Comments</h4>
                            <hr class="commentHeading">
                            <?php
                            foreach($db->query($comm_query) as $comm_row)
                            {
                                $comm_id = $comm_row['id'];
                                $comm_comment = $comm_row['comment'];
                                $comm_name = $comm_row['name'];
                               // $comm_username = $comm_row['username'];
                            
                            ?>
                            <div class="row">
                                <!--<div class="col-sm-2">
                                    <img src="images/news-logo.png" class="img-circle" alt="comments">
                                </div>-->
                                <div class="col-sm-12">
                                    <h5><?php echo ucfirst($comm_name);?></h5>
                                    <p><?php echo $comm_comment;?></p>
                                </div>
                            </div>
                             <?php
                        
                        }
                        ?>
                        </section>
                        </div>
                        <?php
                        }
                        if(isset($_POST['submit']))
                        {    $db = new PDO($dsn, $username, $password);
                            $commSub_name= $_POST['name'];
                             $commSub_email= $_POST['email'];
                             $commSub_comment= $_POST['comment'];
                            //   $commSub_date= $_POST['date'];
                         if(empty($commSub_name) or empty($commSub_email) or empty($commSub_comment) ) {
                             $error_msg ="All fields required";
                         }  
                         else{
                             $submit_query = "insert into comments (name, email,newsId, comment, status) values ('$commSub_name', '$commSub_email','$news_id', '$commSub_comment','pending' )";
                             $submit_result= $db->prepare($submit_query);
                             $submit_result->execute();
                             if($submit_result)
                             {
                                 $msg= "Message uploaded";
                             }
                         }  
                        }
                        
                        ?>
                        <!--comments-->
                        <section class="comment-box">
                            <div class="row">
                                <div class="col-xs-12">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="fname">Full name: *</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            </span>
                                                </div>
                                                <input type="text" name="name" id="fname" class="form-control" placeholder="name" required>
                                            </div>
                                        </div>
                                        <!--end of form-group-->
                                        <div class="form-group">
                                            <label for="email">Email: *</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span>
                                                    <i class="fa fa-envelope" aria-hidden="true"></i>

                                                    </span>
                                                </div>
                                                <input type="text" name="email" id="email" class="form-control" placeholder="name@gmail.com" required>
                                            </div>
                                        </div>
                                        <!--end of form-group-->
                                        <div class="form-group">
                                            <label for="address">Address: *</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <span>
                                                        <i class="fa fa-address-card-o" aria-hidden="true"></i>

                                                    </span>
                                                </div>
                                                <input type="text" name="address" id="address" class="form-control" placeholder="address" required>
                                            </div>
                                        </div>
                                        <!--end of form-group-->
                                        <div class="form-group">
                                            <label for="comment">Comments :</label>
                                            <textarea id="comment" name="comment" cols="30" rows="10" class="form-control" required></textarea>
                                        </div>
                                        <!--end of form-group-->
                                        <div class="col-md-12 text-center">
                                            <input type="submit" name="submit" value="Submit" class="btn btn-primary button">
                                            <span class="pull-right" style="color:red">

                                                <?php
                                                    if(isset($error_msg))
                                                    {
                                                        echo"<span class='pull-right' style='color:red'>Error </span>";
                                                    }
                                                    elseif(isset($msg))
                                                    {
                                                         echo"<span class='pull-right' style='color:green'>Message Uploaded  </span>";
                                                    }
                                                ?>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                        <!--end of comment-box-->
                    <!--</section>-->
                    <!--news ends-->
                </section>
                <!--ends col-md-8-->
                <section class="col-md-4 ">
                    
                    <div class="widgets ">
                        <form action="index.php" method="post">
                        <div class="input-group searchBar ">
                            <input type="text " class="form-control " name="search-title" placeholder="Search for... ">
                            <span class="input-group-btn ">
                           <input type="submit" class="btn btn-default " name="search" value="Go"/>
                           </span>
                        </div>
                        <!-- /input-group -->
                        </form>
                    </div>
                    <!--widgets close-->
                    <div class="widgets ">
                        <div class="popular ">
                            <h4>Featured</h4>
                            <?php
                                $db = new PDO($dsn, $username, $password);
                                $p_sql = "Select newsId, title, date, image from news where status='published' and category='feature' ORDER BY newsId DESC limit 5 ";
                                $result = $db->prepare($p_sql);
                                $result->execute();
                                // echo $result-> rowCount();
                                if($result-> rowCount() > 0)
                                {
                                    foreach($db->query($p_sql) as $p_row)
                              {
                              
                                
                                    

                                    $p_Id = $p_row['newsId'];
                                    $p_title = $p_row['title'];
                                    $p_date = $p_row['date'];
                                    $p_image = $p_row['image'];
                               
                            ?>
                            <hr class="headingLine ">
                            <div class="row ">
                                <div class="col-md-4 ">
                                    <a href="newsdescription.php?newsId=<?php echo $p_Id;?>"><img src="media/<?php echo $p_image ?>" alt="image "></a>
                                </div>
                                <div class="col-md-8 details ">
                                    <a href="newsdescription.php?newsId=<?php echo $p_Id;?>">
                                        <h5><?php echo $p_title; ?></h5>
                                    </a>
                                    <p><i class="fa fa-clock-o " aria-hidden="true "></i> <?php echo date('d M Y', strtotime($p_date)); ?>
                                    </p>
                                </div>
                            </div>
                             <?php } 
                                }
                                else 
                                {
                                    echo "No Data Available";
                                }
                                ?>
                           
                        </div>
                    </div>
                    <!--widgets close-->
                    <div class="widgets ">
                        <div class="popular ">
                            <h4>World News</h4>
                             <?php
                                $db = new PDO($dsn, $username, $password);
                                $p_sql = "Select newsId, title, date, image from news where status='published' and category='world' ORDER BY newsId DESC limit 5 ";
                                $result = $db->prepare($p_sql);
                                $result->execute();
                                // echo $result-> rowCount();
                                if($result-> rowCount() > 0)
                                {
                                    foreach($db->query($p_sql) as $p_row)
                              {
                              
                                
                                    

                                    $p_Id = $p_row['newsId'];
                                    $p_title = $p_row['title'];
                                    $p_date = $p_row['date'];
                                    $p_image = $p_row['image'];
                               
                            ?>
                            <hr class="headingLine ">
                            <div class="row ">
                                <div class="col-md-4 ">
                                    <a href="newsdescription.php?newsId=<?php echo $p_Id;?>"><img src="media/<?php echo $p_image ?>" alt="image "></a>
                                </div>
                                <div class="col-md-8 details ">
                                    <a href="newsdescription.php?newsId=<?php echo $p_Id;?>">
                                        <h5><?php echo $p_title; ?></h5>
                                    </a>
                                    <p><i class="fa fa-clock-o " aria-hidden="true "></i> <?php echo date('d M Y', strtotime($p_date)); ?>
                                    </p>
                                </div>
                            </div>
                             <?php } 
                                }
                                else 
                                {
                                    echo "No Data Available";
                                }
                                ?>

                        </div>
                    </div>
                    <!--widgets close-->
                    <div class="widgets ">
                        <div class="popular ">
                            <h4>Categories</h4>
                            <hr class="headingLine ">
                            <div class="row ">
                                <div class="col-md-12 ">
                                    <ul>
                                           <li>
                                        <?php
                                            $db = new PDO($dsn, $username, $password);

                                            $sql = "Select categoryId, category from category ORDER BY category ASC";
                                            $results = $db->prepare($sql);
	                                        $results->execute();
                                            try{
                                                 if($results -> rowCount() >0){
                                                foreach ($db->query($sql) as $row)
                                                {
                                                   
                                                    $category = ucfirst($row['category']);
                                                    $id = $row['categoryId'];
                                                    echo "<li><a href='index.php?id=".$id."'> $category</a>    
                                        </li>";
                                                }
                                                 }else{
                                                    echo "<center><h2>No categories available</h2></center>";
                                                 }
                                            }
                                                catch(PDOException $e)
                                                {
                                                    echo "Error: ". $e->getMessage();
                                                }

                                            
                                        ?>    
                                        </li>
                                    </ul>
                                </div>
                                <!--<div class="col-xs-6 ">
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <!--widgets end-->
                </section>
                <!--col-md-4 ends-->
            </section>
            <!--end of row side bar-->
        </section>
    </section>
    <!--end section without class-->
   <?php require_once('incfile/footer.php');?>
</div>
</body>

</html>