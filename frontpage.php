<?php

// echo'test';
      $dsn= "mysql: host=localhost; dbname=newscms"; 
     // $dsn = "mysql: host = localhost; dbname=test; charset=utf8";
      $username="root";
      $password = "";

      $db = new PDO($dsn,$username,$password);  

      

?>
<!doctype html>
<html lang="en">

<head>
    <title>CMS News Website</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="images/x-icon" href="images/logoNews.png" width="1em" height="1em">
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/mobile.css">
    <!-- Optional JavaScript -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/ticker.js"></script>
</head>

<body>
    <?php require_once('incfile/navbar.php');?>
<div id="wrapper">
    <section class="newsTickerCon " id="js-ticker-slide">
        <ul class="newsTicker" id="newsTicker">
            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
            <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
            <li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</li>
            <li>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
        </ul>
    </section>
    <div class="buttonTckr">
        <div class="alignBttnTckr">
            <!--<input type="button" class="button-default" value="Pause" id="pause" >-->
            <a href="#"><i class="fa fa-pause-circle btnTckr" aria-hidden="true" id="pause"></i></a>
            <!--<input type="button" class="button-default" value="start" id="start">-->
            <a href="#"><i class="fa fa-play-circle btnTckr" aria-hidden="true" id="start"></i></a>
        </div>
    </div>
    <section>
        <section class="container">
            <section class="row sideBar">
                <section class="col-md-8">World News
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active ">
                                <img src="images/newsRoom.jpg" class="imageCarousel" alt="Slider 1">
                                <div class="carousel-caption">
                                    Title News
                                </div>
                            </div>
                            <div class="item ">
                                <img src="images/breakingNews.jpg" class="imageCarousel imageTwo" alt="Slider 2">
                                <div class="carousel-caption">
                                    Title News
                                </div>
                            </div>
                            <div class="item ">
                                <img src="images/newsRoom.jpg" class="imageCarousel" alt="Slider 3">
                                <div class="carousel-caption">
                                    Title News
                                </div>
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!--carousel ends-->
                    <?php
                    $db = new PDO($dsn, $username, $password);
                    $sql = "Select date,  title, image, description, author from news where status= 'published' order by newsId Desc ";

                    $results = $db->prepare($sql);
                    $results->execute();
                    try{
                    if($results ->rowCount() > 0)
                    {
                       foreach($db->query($sql) as $row)
                       {
                            $date = $row['date'];
                            $category = $row['category'];
                            $title = $row['title'];
                            $image = $row['image'];
                            $description = $row['description'];
                            $author = $row['author'];
                            $status = $row['status'];  
                       }

                    }else{
                        echo"<center><h2>No Latest News Available At This Time</h2></center>";
                    }

                    }
                    catch(PDOException $e)
                    {
                        echo"Error:" .$e->getMessage();
                    }
                    ?>
                    <section class="news">
                        <section class="row">
                            <div class="col-md-2 news-date">
                                <div class="day">Day</div>
                                <!--day ends-->
                                <div class="month">Month</div>
                                <!--month ends-->
                                <div class="year">2017</div>
                                <!--year ends-->
                            </div>
                            <!--ends first col-md-2-->
                            <div class="col-md-10 news-title">
                                <a href="newsdescription.php">
                                    <h2>This is news heading</h2>
                                </a>
                                <p>Written by:<span>name</span></p>
                            </div>
                            <!--ends col-md-8-->
                            <!--<div class="col-md-2 "></div>-->
                            <!--ends col-md-2 second-->
                        </section>
                        <!--row-->
                        <a href=""><img src="images/cricket.jpg" class="imageNews" alt="image">
                        </a>
                    </section>
                    <!--news ends-->
                </section>
                <!--ends col-md-8-->
                <section class="col-xs-4">
                    <div class="widgets">
                        <div class="input-group searchBar">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                           <button class="btn btn-default" type="button">Go!</button>
                           </span>
                        </div>
                        <!-- /input-group -->
                    </div>
                    <!--widgets close-->
                    <div class="widgets">
                        <div class="popular">
                            <h4>Featured</h4>
                            <hr class="headingLine">
                            <div class="row">
                                <div class="col-xs-4">
                                    <a href=""><img src="images/gifNews.gif" alt="image"></a>
                                </div>
                                <div class="col-xs-8 details">
                                    <a href="">
                                        <h5>Heading</h5>
                                    </a>
                                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> Date
                                    </p>
                                </div>
                            </div>
                            <hr class="headingLine">
                            <div class="row">
                                <div class="col-xs-4">
                                    <a href=""><img src="images/cricket.jpg" alt="image"></a>
                                </div>
                                <div class="col-xs-8 details">
                                    <a href="">
                                        <a href="">
                                            <h5>Heading</h5>
                                        </a>
                                    </a>
                                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> Date
                                    </p>
                                </div>
                            </div>

                            <hr class="headingLine">
                            <div class="row">
                                <div class="col-xs-4">
                                    <a href=""><img src="images/gifNews.gif" alt="image"></a>
                                </div>
                                <div class="col-xs-8 details">
                                    <a href="">
                                        <h5>Heading</h5>
                                    </a>
                                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> Date
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--widgets close-->
                    <div class="widgets">
                        <div class="popular">
                            <h4>World News</h4>
                            <hr class="headingLine">
                            <div class="row">
                                <div class="col-xs-4">
                                    <a href=""><img src="images/cricket.jpg" alt="image"></a>
                                </div>
                                <div class="col-xs-8 details">
                                    <a href="">
                                        <h5>Heading</h5>
                                    </a>
                                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> Date
                                    </p>
                                </div>
                            </div>
                            <hr class="headingLine">
                            <div class="row">
                                <div class="col-xs-4">
                                    <a href=""><img src="images/cricket.jpg" alt="image"></a>
                                </div>
                                <div class="col-xs-8 details">
                                    <a href="">
                                        <h5>Heading</h5>
                                    </a>
                                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> Date
                                    </p>
                                </div>
                            </div>

                            <hr class="headingLine">
                            <div class="row">
                                <div class="col-xs-4">
                                    <a href=""><img src="images/cricket.jpg" alt="image"></a>
                                </div>
                                <div class="col-xs-8 details">
                                    <a href="">
                                        <h5>Heading</h5>
                                    </a>
                                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> Date
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--widgets close-->
                    <div class="widgets">
                        <div class="popular">
                            <h4>Categories</h4>
                            <hr class="headingLine">
                            <div class="row">
                                <div class="col-xs-12">
                                    <ul>
                                         <li>
                                        <?php
                                            $db = new PDO($dsn, $username, $password);

                                            $sql = "Select categoryName from category";
                                            $results = $db->prepare($sql);
	                                        $results->execute();
                                            try{
                                                 if($results -> rowCount() >0){
                                                foreach ($db->query($sql) as $row)
                                                {
                                                    echo ucfirst($row['categoryName']). '<br>';
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
                                <!--<div class="col-xs-6">
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
    <footer>
        <section class="container">
            <section class="socialIcons" id="text">
                Follow Us On
            </section>
            <section class="socialIcons">
                <ul class="social">
                    <li>
                        <a href="https://www.facebook.com" target="_blank"><img src="images/facebook.png" class="icons" /></a>
                    </li>
                    <li>
                        <a href="https://plus.google.com" target="_blank"><img src="images/gPlus.png" class="iconsGPlus" /></a>
                    </li>
                    <li>
                        <a href="https://twitter.com" target="_blank"><img src="images/twitter.png" class="iconsTwitter" /></a>
                    </li>
                </ul>
            </section>

            <h6 id="textCopyright">copyright@2017</h6>
        </section>
    </footer>
</div>
</body>

</html>