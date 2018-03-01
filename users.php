<?php
    include('incfile/dbconnect.php');
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
if(isset($_SESSION['username']) && ($_SESSION['role'] == 'admin')){
    
    if(isset($_GET['del']))
    { 
        $msg='';
        $del_id = $_GET['del'];

        $del_query = "Delete from users where id = $del_id ";
        $del_result = $db->prepare($del_query);
        $del_result->execute();
        //$db_save = $db->query($del_query);
        //$result = $db_save->fetch(PDO::FETCH_ASSOC);
        
        if($del_result)
        {    
            $msg= "User has been deleted successfully!";
        }
        else
        {
            $error ="User has not been deleted!";
        }
        //echo "<meta http-equiv='refresh' content='0'>";
    
    }
   // header("Refresh:0;");
 if(isset($_POST['checkboxes']))
 {
     //echo"test";
     foreach($_POST['checkboxes'] as $user_id)
     {echo $user_id;
          $bulkoption = $_POST['bulkoption'];
          if($bulkoption == 'delete')
          {
            $bulk_query = "Delete from users where id = $user_id";
            $bulk_result = $db->prepare($bulk_query);
            $bulk_result->execute();
          }elseif($bulkoption == 'author')
          {
            $update_author_query = "Update users set role = 'author' where id = $user_id";
            $bulk_update_result = $db->prepare($update_author_query);
            $bulk_update_result->execute();
          }
          elseif($bulkoption == 'admin')
          {
            $update_admin_query = "Update users set role = 'admin' where id = $user_id";
            $bulk_update_admin_result = $db->prepare($update_admin_query);
            $bulk_update_admin_result->execute();
          }
     }
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
    <link rel="stylesheet" href="css/users.css">
    <link rel="stylesheet" href="css/mobile.css">
    <!-- Optional JavaScript -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    </div id="wrapper">
    <?php require_once('incfile/headerAdmin.php');?>

    <section>
        <div class="container-fluid body-section">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <?php require_once('incfile/sideBarAdmin.php');?>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12 sideBarTopDashBoard">
                    <h1> <i class="fa fa-user" aria-hidden="true"></i> Users <small>View all Users</small></h1>
                    <hr class="lineDashboard">
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li class="active"> <i class="fa fa-user" aria-hidden="true"></i> Users</li>
                    </ol>
                    <?php
                    $db = new PDO($dsn, $username, $password);
                    $query = "Select * from users ORDER BY id DESC";
                    $result = $db->prepare($query);
                    $result->execute();
                    if($result->rowCount() > 0)
                    {

                    ?>
                     <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-8">
                           
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <select name="bulkoption" id="" class="form-control">
                                                <option value="delete">Delete</option>
                                                <option value="author">Change to Author</option>
                                                <option value="admin">Change to Admin</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="submit" class="btn btn-success" value="Apply">
                                        <a href="addUsers.php" class="btn btn-primary">Add New</a>
            
                                    
                                </div>
                                </div>
                                <!--inner row-->
                           
                        </div>
                        <!--sm-8-->
                    </div>
                    <!--outer row-->
                    <!--<hr class="usersLine">-->
                    <?php
                        $error ='';
                        $msg ='';
                    if(isset($error))
                    {
                        echo"<span style='color:red' class= 'pull-right'>$error</span>";
                    }
                    else if(isset($msg))
                    {
                        echo"<span style='color:green' class= 'pull-right'>$error</span>";
                    }

                    ?>

                    <table class="table table-bordered table-striped">
                        <thead>

                            <tr>
                                <th><input type="checkbox" id="selectallboxes"></th>
                                <th>S.No.</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Date</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($db->query($query) as $row){
                                $id = $row['id'];
                                $firstName = ucfirst($row['firstName']);
                                $lastName = ucfirst($row['lastName']);
                                $email = $row['email'];
                                $username = $row['username'];
                                $role = $row['role'];
                                $date = $row['date'];
                                $image = $row['image'];
                           
                            ?>
                            <tr>
                                <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $id;?>"></td>
                                <td><?php echo $id; ?></td>
                                <td><?php echo "$firstName $lastName"; ?></td>
                                <td><?php echo $username; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><img src="images/<?php echo $image; ?>" style="width:20px; height:20px;"></td>
                                <td>******</td>
                                <td><?php echo $role; ?></td>
                                <td><?php echo date('d M Y', strtotime($date)); ?></td>
                                <td><a href='editUsers.php?edit=<?php echo $id; ?>'><i class="fa fa-pencil"></i></a></td>
                                <td><a href='users.php?del=<?php echo $id; ?>'><i class="fa fa-times"></i></a></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>

                    </table>
                   
                    <?php
                    }
                    else
                    {
                        echo"<center><h2>No Users</h2></center>";
                    }
                    ?>
                    </form>
                </div>
                <!--col-9-->
            </div>
        </div>
    </section>
     <?php require_once('incfile/footerAdmin.php');?>
    </div>
</body>

</html>