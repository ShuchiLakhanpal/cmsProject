<nav class="navbar navbar-inverse navbar-fixed-top menuText">
        <section class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <section class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
                <a class="navbar-brand logo" href="index.php">
                    <section class="col-xs-5">
                        <img src="images/logoNews.png" alt="News" class="imageLogo">
                    </section>
                    <section class="textLogo col-xs-7">News</section>
                </a>
            </section>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <section class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <!--<form class="navbar-form navbar-left">
                    <section class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </section>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>-->
                <ul class="nav navbar-nav navbar-right menu ">
                    <li><a href="index.php" class="paddingMenu"><i class="fa fa-home" aria-hidden="true" id="iconFonts"></i>Home &nbsp;|</a></li>
                    <li><a href="newsdescription.php" class="paddingMenu">International &nbsp; |</a></li>
                    <li><a href="newsdescription.php" class="paddingMenu">Sports &nbsp;|</a></li>
                    <li><a href="newsdescription.php" class="paddingMenu">Education &nbsp;|</a></li>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More Categories <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                             
                                        <?php
                                            $db = new PDO($dsn, $username, $password);

                                            $sql = "Select categoryId,category from category ORDER BY category ASC";
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
                                       
                                        
                            <li role="separator" class="sectionider"></li>
                            <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>   Contact Us</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.navbar-collapse -->
        </section>
        <!-- /.container-fluid -->
    </nav>