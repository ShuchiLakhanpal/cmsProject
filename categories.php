<?php
    include('incfile/dbconnect.php');
    include('incfile/categoryInsert.php');
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('Location: logIn.php');
    }
    else if(isset($_SESSION['username']) && ($_SESSION['role'] == 'author'))
    {
        header('Location: dashboard.php');
    }
   $db = new PDO($dsn, $username,$password);
 if(isset($_SESSION['username']) && ($_SESSION['role'] == 'admin'))
 {//echo$_SESSION['username'];
    if(isset($_GET['del']))
    {
        $Id = $_GET['del'];
      
     // echo $Id;
           $del_query ="Delete from category where categoryId = $Id";
           $del_result = $db->prepare($del_query);
           $del_result->execute();
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
    <link rel="stylesheet" href="css/categories.css">
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
                    <h1> <i class="fa fa-folder-open" aria-hidden="true"></i> Categories <small>Various Category</small></h1>
                    <hr class="lineDashboard">
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php"> <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
                        </li>
                        <li class="active"> <i class="fa fa-folder-open" aria-hidden="true"></i> Categories</li>
                    </ol>
                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="post" id="category">
                                <div class="form-group">
                                    <label for="category">Category Name:</label>
                                    <?php require_once('incfile/categoryInsert.php');?>
                                    <input type="text" placeholder="Category Name" class="form-control" name="category">
                                </div>
                                <input type="submit" value="Add Category" name="submit" class="btn btn-primary">
                            </form>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Category Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <!--<th></th>-->
                                    </tr>
                                </thead>
                                <tbody>
                               
                                         
                                        <?php
                                            $db = new PDO($dsn, $username, $password);

                                            $sql = "Select categoryId, category from category ORDER BY category ASC";
                                            $results = $db->prepare($sql);
	                                        $results->execute();
                                            try{
                                               // echo $results -> rowCount() ;

                                                 if($results -> rowCount() >0){
                                                foreach ($db->query($sql) as $row)
                                                {
                                                    $categoryId = $row['categoryId'];
                                                    $category = $row['category'];
                                                 ?>
                                                 <tr>
                                                <td><?php echo $row['categoryId'];?></td>
                                                <td><?php echo ucfirst($row['category']);?></td>
                                                <td><a href="#"><i class="fa fa-pencil"></i></a></td>
                                                <td><a href='categories.php?del=<?php echo $categoryId;?>'><i class="fa fa-times"></i></a></td>
                                                 </tr>
                                                 <?php 
                                                 
                                                  
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
                                        
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require_once('incfile/footerAdmin.php');?>
    </div>
</body>

</html>