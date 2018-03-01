<?php
    include('incfile/dbconnect.php');
    session_start();

    $SESSION_username = $_SESSION['username'];
    $SESSION_role = $_SESSION['role'];
    if(!isset($_SESSION['username']))
    {
        header('Location: logIn.php');
    }
     $db = new PDO($dsn, $username, $password);
        $dash_query = "Select * from comments  ORDER By id DESC";
        $result_dash = $db->prepare($dash_query);
        $result_dash->execute();
       $num_rows_dash= $result_dash->rowCount();

        $news_dash_query = "Select * from news  ORDER By newsId DESC";
        $news_dash_result = $db->prepare($news_dash_query);
        $news_dash_result->execute();
       $news__dash_rows= $news_dash_result->rowCount();

       $categories_dash = "Select * from category ORDER BY categoryId DESC";
       $categories_result = $db->prepare($categories_dash);
       $categories_result->execute();
       $categories_row_num = $categories_result->rowCount(); 

       $users_dash = "Select * from users ORDER BY id DESC";
       $users_result = $db->prepare($users_dash);
       $users_result->execute();
       $users_row_num = $users_result->rowCount(); 

       if(isset($SESSION_username) )
       {
        
           $sql_news = "Select * from news Order by newsId DESC";
           $result_dash_news = $db->prepare($sql_news);
            $result_dash_news->execute();

            $sql_users = "Select * from users Order by id ASC";
           $result_dash_users = $db->prepare($sql_users);
            $result_dash_users->execute();


           
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
                <div class="col-md-3 col-sm-12 col-xs-12" >
                 <?php require_once('incfile/sideBarAdmin.php');?>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12 sideBarTopDashBoard" >
                    <h1> <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard <small>Statistics Overview</small></h1>
                    <hr class="lineDashboard">
                    <ol class="breadcrumb">
                        <li class="active"> <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</li>
                    </ol>
                    <div class="row tag-boxes">
                        <div class="col-md-6 col-lg-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-comments fa-5x" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-xs-9">
                                            <div class="text-right huge">
                                                 <?php
                                                        if($result_dash->rowCount() > 0)
                                                    {
                                                        echo $num_rows_dash;
                                                    }
                                                    ?>
                                            </div>
                                            <div class="text-right">New Comments
                                            </div>
                                        </div>
                                    </div>
                                    <!--row inner-->
                                </div>
                                <!--panel heading-->
                                <a href="comments.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View all Comments</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>

                                    </div>
                                </a>
                                <!--</div>-->
                                <!--panel heading-->
                            </div>
                            <!--panel primary-->
                        </div>
                        <!--col-->
                        <div class="col-md-6 col-lg-3">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-file-text fa-5x" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-xs-9">
                                            <div class="text-right huge">
                                                 <?php
                                                        if($news_dash_result->rowCount() > 0)
                                                    {
                                                        echo $news__dash_rows;
                                                    }
                                                 ?>
                                            </div>
                                            <div class="text-right">All News
                                            </div>
                                        </div>
                                    </div>
                                    <!--row inner-->
                                </div>
                                <!--panel heading-->
                                <a href="news.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View all News</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>

                                    </div>
                                </a>
                                <!--</div>-->
                                <!--panel heading-->
                            </div>
                            <!--panel primary-->
                        </div>
                        <!--col-->
                        <div class="col-md-6 col-lg-3">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-xs-9">
                                            <div class="text-right huge">
                                            <?php
                                                if($users_result->rowCount() > 0)
                                                {
                                                    echo $users_row_num;
                                                }
                                            ?>
                                            </div>
                                            <div class="text-right">Users
                                            </div>
                                        </div>
                                    </div>
                                    <!--row inner-->
                                </div>
                                <!--panel heading-->
                                <a href="users.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View all Users</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>

                                    </div>
                                </a>
                                <!--</div>-->
                                <!--panel heading-->
                            </div>
                            <!--panel primary-->
                        </div>
                        <!--col-->
                        <div class="col-md-6 col-lg-3">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-folder-open fa-5x" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-xs-9">
                                            <div class="text-right huge">
                                                <?php
                                                    if($categories_result->rowCount() > 0)
                                                    {
                                                        echo $categories_row_num;
                                                    }
                                                ?>
                                            </div>
                                            <div class="text-right">Categories
                                            </div>
                                        </div>
                                    </div>
                                    <!--row inner-->
                                </div>
                                <a href="categories.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View all Categories</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>

                                    </div>
                                </a>
                                <!--</div>-->
                                <!--panel heading-->
                            </div>
                            <!--panel primary-->
                        </div>
                        <!--col-->
                    </div>
                    <!--row outer-->
                    <hr class="lineDashboard">
                    <h3>Users</h3>
                    <table class="table table-hover table-striped">
                         
                        <thead>
                            <tr>
                                <th>Sr.No.</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $db = new PDO($dsn, $username, $password);
                         foreach($db->query($sql_users)as $row)
                                {
                                    $id =$row['id'];
                                    $date = $row['date'];
                                    $firstname = $row['firstName'];
                                    $username = $row['username'];
                                    $role = $row['role'];
                                    
                            ?>
                            <tr>
                                <td><?php echo $id;?></td>
                                <td><?php echo date('d M Y' , strtotime($date));?></td>
                                <td><?php echo ucfirst($firstname);?></td>
                                <td><?php echo $username;?></td>
                                <td><?php echo ucfirst($role);?></td>
                            </tr>
                            
                        </tbody>
                        <?php
                            }

                        ?>
                    </table>
                    <a href="#" class="btn btn-primary">View All Users</a>
                    <hr class="lineDashboard">
                    <h3> News</h3>
                   
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sr.No.</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Author</th>
                                <th>Image</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <?php
                         foreach($db->query($sql_news)as $row)
                                {
                                    $id =$row['newsId'];
                                    $title = $row['title'];
                                    $date = $row['date'];
                                    $author = $row['author'];
                                    $image = $row['image'];
                                    $status = $row['status'];
                            
                            
                            ?>
                        <tbody>
                            <tr>
                                <td><?php echo $id;?></td>
                                <td><?php echo ucfirst($title);?></td>
                                <td><?php echo date('d M Y' , strtotime($date));?></td>
                                <td><?php echo ucfirst($author);?></td>
                                <td><img src="media/<?php echo $image; ?>" style="width:20px; height:20px;"></td>
                                <td><?php echo ucfirst($status);?></td>
                            </tr>
                            <tr>
                               
                        </tbody>
                        <?php
                        }
                        ?>
                    </table>
                   
                    <a href="news.php" class="btn btn-primary myBtn">View All News</a>
                </div>
            </div>
        </div>
    </section>
   <?php require_once('incfile/footerAdmin.php');?>
    </div>
</body>

</html>