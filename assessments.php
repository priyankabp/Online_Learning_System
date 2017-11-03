<?php require_once('include/top.php');
  if (!isset($_SESSION['username'])) {
      header('Location: login.php');
    }
 ?>
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
            <h1><i class="fa fa-graduation-cap" aria-hidden="true"></i> Assessments <small>All Quizzes</small></h1><hr>
            <ol class="breadcrumb">
              <li><a href="home.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-folder-open"></i> Assessments</li>
            </ol>
          </div>

          <div class="col-md-9">
            <a href="allreports.php">All quizzes</a> &nbsp
	          <a href="add-assessment.php">New assessment</a>
          </div>
          
        </div>
      </div>
  <?php require_once('include/footer.php'); ?>