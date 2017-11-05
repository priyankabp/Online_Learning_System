<?php require_once('include/top.php');
  if (!isset($_SESSION['username'])) {
      header('Location: login.php');
    }

  $session_username = $_SESSION['username'];
 ?>
<?php require_once('server.php'); ?>
  </head>
  <body>
    <div id="wrapper">
      <?php require_once('include/header.php'); ?>

      <div class="container-fluid body-section">
        <div class="row">

          <div class="col-md-3">
            <?php require_once('include/left-sidebar.php'); ?>
          </div>

          <div class="col-md-9">
            <h1><i class="fa fa-graduation-cap" aria-hidden="true"></i> Welcome <?php echo ucfirst($session_username);?></h1><hr>
            <ol class="breadcrumb">
              <li><a href="home.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-folder-open"></i> Available Quizzes</li>
            </ol>
             <div class="col-md-9">
                <a href="view-quizzes.php" class="btn btn-primary">View Quizzes</a>
             </div>
          </div>
        </div>
      </div>
  <?php require_once('include/footer.php'); ?>