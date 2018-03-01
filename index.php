<?php

// echo'test';
      include('./incfile/dbconnect.php');
     // $db = new PDO($dsn,$username,$password);  

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
   <!--<div id="wrapper">-->
    <section class="newsTickerCon " id="js-ticker-slide">
       <ul class="newsTicker" id="newsTicker">
<!--<li style="width:25%">News 1</li>
           <li style="width:25%">News 2</li>
           <li style="width:25%">News 1</li>
           <li style="width:25%">News 3</li>
        -->
<?php
    $db = new PDO($dsn, $username, $password);
    $tickersql = "Select title from news where status='published' ORDER BY newsId DESC limit 4";

    $resulttckr = $db->prepare($tickersql);
    $resulttckr->execute();
    $value =$db->query($tickersql);
    $counttckr = $resulttckr->rowCount();
    // if($counttckr%2 == 0){
    $li = '<li style="width:'.floor(100/$counttckr) .'%">';
    // }
    // else{
    //     $li = '<li style="width:'.floor(100/($counttckr-1)) .'% ">';
    // }
    //$WDT= 1920;
    $ticker = array(); 
    // echo $counttckr;
    if($resulttckr->rowCount() > 0)
    {   
        
        while($rowtckr =$value-> fetch( PDO::FETCH_ASSOC))
        {
            $ticker[]=$rowtckr;
            $title = $rowtckr['title'];
            echo $li . $title;
           
       
        }
    }
    else {
        echo"Error";
    }
?>
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
                <section class="col-md-8"><h3>Breaking News</h3> 
                    <?php
                    $db = new PDO($dsn, $username, $password);
                        $slidersql = "Select image, title from news where status like 'published' ORDER BY newsId Desc limit 3";
                         $results = $db->prepare($slidersql);
                         $results->execute();
                         $row_count = $results->rowCount();

                      // echo $row_count;
                            if($row_count > 0)
                            {
                               
                                    $count = $results ->rowCount(); 
                            ?>

                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <?php
                            // $count = $row_count;
                            for($i = 0; $i < $count; $i++){
                                if($i == 0)
                                {
                                   echo "<li data-target='#carousel-example-generic' data-slide-to=' ".$i."' class='active'></li>";
                                }
                                else{
                                    echo "<li data-target='#carousel-example-generic' data-slide-to=' ".$i."' ></li>";
                                }
                            }
                           ?> 
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php
                             $check =0;
                             $news = array();
                             $val = $db->query($slidersql);
                                while($slider_row =$val-> fetch( PDO::FETCH_ASSOC))
                                {
                                    $news[] =  $slider_row;
                                    //$slider_id = $slider_row['Id'];
                                     $slider_image = $slider_row['image'];
                                      $slider_title = $slider_row['title'];
                                      $check += 1;
                                      if($check == 1)
                                      {
                                          echo" <div class='item active '>";
                                      }

                                      else{
                                          echo" <div class='item  '>";
                                      }
                              

                            ?>
                            <!--<div class="item active ">-->
                                <!--<img src="images/newsRoom.jpg" class="imageCarousel" alt="Slider 1">-->
                                <img src="media/<?php echo $slider_image;?>" class="imageNews" alt="Sliders">
                                <div class="carousel-caption">
                                   <?php echo $slider_title;?>
                                </div>
                            </div>
                            <?php } ?>
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
                            }
                            else{
                                echo"No Data Available";
                            }
                    $db = new PDO($dsn, $username, $password);
                    $sql = "Select newsId,date, category, title, image, description, author from news where status= 'published' order by newsId Desc limit 2";

                    $results = $db->prepare($sql);
                    $results->execute();
                    try{
                    if($results ->rowCount() > 0)
                    {
                       foreach($db->query($sql) as $row)
                       {
                           $id = $row['newsId'];
                           
                            $date = $row['date'];
                             $category = $row['category'];
                            $title = $row['title'];
                            $image = $row['image'];
                            $description = $row['description'];
                            $author = $row['author'];
                            // $status = $row['status'];  
                    ?>
                    <section class="news">
                        <section class="row">
                            <div class="col-md-2 news-date">
                                <div class="day month year"><?php echo date('d M Y', strtotime($date));?></div>
                               
                            </div>
                            <!--ends first col-md-2-->
                            <div class="col-md-10 news-title">
                                <a href="newsdescription.php?newsId=<?php echo $id; ?>">
                                    <h2><?php echo $title; ?></h2>
                                </a>
                                <p>Written by:<span><?php echo ucfirst($author); ?></span></p>
                            </div>
                            <!--ends col-md-8-->
                            <!--<div class="col-md-2 "></div>-->
                            <!--ends col-md-2 second-->
                        </section>
                        <!--row-->
                        <a href="newsdescription.php?newsId=<?php echo $id; ?>"><img src="media/<?php echo $image;?>" class="imageNews" alt="image">
                        </a>
                        <div class="bottom">
                            <span class="first"><a href="newsdescription.php?newsId=<?php echo $id; ?>"><i class="fa fa-folder"><?php echo ucfirst($category);?></i></a></span>
                            </div>   
                    </section>
                    <!--news ends-->
                    <?php
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
                </section>
                <!--ends col-md-8-->
                <section class="col-md-4">
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
                    <div class="widgets">
                        <div class="popular">
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
                            <hr class="headingLine">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="newsdescription.php?newsId=<?php echo $p_Id;?>"><img src="media/<?php echo $p_image ?>" class="imageWidget" alt="image"></a>
                                </div>
                                <div class="col-md-8 details">
                                    <a href="newsdescription.php?newsId=<?php echo $p_Id;?>">
                                        <h5><?php echo $p_title; ?></h5>
                                    </a>
                                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date('d M Y', strtotime($p_date)); ?>
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
                    <div class="widgets">
                        <div class="popular">
                            <h4>World News</h4>
                              <?php
                                $db = new PDO($dsn, $username, $password);
                                $p_sql = "Select newsId, title, date, image from news where status='published' and category='world' ORDER BY newsId Desc limit 5 ";
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
                             <hr class="headingLine">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="newsdescription.php?newsId=<?php echo $p_Id;?>"><img src="media/<?php echo $p_image ?>"class="imageWidget"  alt="image"></a>
                                </div>
                                <div class="col-md-8 details">
                                    <a href="newsdescription.php?newsId=<?php echo $p_Id;?>">
                                        <h5><?php echo $p_title; ?></h5>
                                    </a>
                                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date('d M Y', strtotime($p_date)); ?>
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
                    <div class="widgets">
                        <div class="popular">
                            <h4>Categories</h4>
                            <hr class="headingLine">
                            <div class="row">
                                <div class="col-xs-12">
                                    <ul>
                                        <!--<li><a href="">Category</a></li>
                                        <li><a href="">Category</a></li>
                                        <li><a href="">Category</a></li>
                                        <li><a href="">Category</a></li>-->
                                        
                                        <?php
                                            $db = new PDO($dsn, $username, $password);

                                            $sql = "Select categoryId, category from category ORDER BY category ASC";
                                            $results = $db->prepare($sql);
	                                        $results->execute();
                                            try{
                                                 if($results -> rowCount() >0){
                                                foreach ($db->query($sql) as $row)
                                                {
                                                    $category =ucfirst($row['category']);
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
    <?php require_once('incfile/footer.php');?>
<!--</div>-->
</body>

</html>