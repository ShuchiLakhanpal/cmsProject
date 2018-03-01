   <?php
    include('incfile/dbconnect.php');
        $db = new PDO($dsn, $username, $password);
        $query = "Select * from comments Where status = 'pending'  ORDER By id DESC";
        $result = $db->prepare($query);
        $result->execute();
       $num_rows= $result->rowCount();

       $newsquery = "Select * from news Where status = 'draft' ORDER By newsId DESC";
        $newsresult = $db->prepare($newsquery);
        $newsresult->execute();
       $news_rows= $newsresult->rowCount();

       $categories_dash = "Select * from category ORDER BY categoryId DESC";
       $categories_result = $db->prepare($categories_dash);
       $categories_result->execute();
       $categories_row_num = $categories_result->rowCount(); 

        $users_dash = "Select * from users ORDER BY id DESC";
       $users_result = $db->prepare($users_dash);
       $users_result->execute();
       $users_row_num = $users_result->rowCount(); 

        $media_dash = "Select * from media ORDER BY id DESC";
       $media_result = $db->prepare($media_dash);
       $media_result->execute();
       $media_row_num = $media_result->rowCount(); 

        ?>
   <div class="list-group sideBarTopAdmin ">
                        <a href="dashboard.php" class="list-group-item active">
                            <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard </a>
                             <a href="news.php" class="list-group-item">
                            <span class="badge">
                                <?php
                            if($newsresult->rowCount() > 0)
                        {
                            echo $news_rows;
                        }
                        else{
                            echo"0";
                        }
                         ?>
                            </span><i class="fa fa-list" aria-hidden="true"></i> News
 
                        </a>
                        <a href="addNews.php" class="list-group-item">
                            <!--<span class="badge">No</span> -->
                            <i class="fa fa-plus-square" aria-hidden="true"></i> Add News
 
                        </a>
                         <a href="media.php" class="list-group-item">
                            <span class="badge">
                                      <?php
                                            if($media_result->rowCount() > 0)
                                        {
                                            echo $media_row_num;
                                        }
                                        else{
                                            echo"0";
                                        }
                                      ?>
                            </span> <i class="fa fa-database" aria-hidden="true"></i>  Media
                        
                        </a>
                       
                        <a href="users.php" class="list-group-item">
                            <span class="badge">
                                   <?php
                            if($users_result->rowCount() > 0)
                        {
                            echo $users_row_num;
                        }
                        else{
                            echo"0";
                        }
                         ?>
                            </span><i class="fa fa-user" aria-hidden="true"></i> Users
                        </a>
                        <a href="categories.php" class="list-group-item">
                            <span class="badge">
                                 <?php
                                    if($categories_result->rowCount() > 0)
                                    {
                                        echo $categories_row_num;
                                    }
                                    else{
                                        echo"0";
                                    }
                                ?>
                            </span> <i class="fa fa-folder-open" aria-hidden="true"></i> Categories
                        </a>
                         <a href="comments.php" class="list-group-item">
                            
                           <span class="badge"> <?php
                            if($result->rowCount() > 0)
                        {
                            echo $num_rows;
                        }
                        else{
                            echo"0";
                        }
                         ?>
                                
                            </span> <i class="fa fa-comments" aria-hidden="true"></i> Comments
                       
                        </a>
                    </div>