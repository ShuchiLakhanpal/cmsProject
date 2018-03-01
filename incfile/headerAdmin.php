    <?php
   // session_start();
    $SESSION_username = $_SESSION['username'];

    ?>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
                <a class="navbar-brand" href="index.php">News Website</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i>

 Home</a></li>
                    <li><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i> Welcome: <?php echo $SESSION_username; ?>
 </a></li>
                    <li>
                        <a href="addUsers.php"> <i class="fa fa-user-plus" aria-hidden="true"></i> Add User</a>
                    </li>
                    <li><a href="addNews.php"><i class="fa fa-plus-square" aria-hidden="true"></i>
  Add News</a></li>
                    <li><a href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i> 
Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
