<?php require_once('include/top.php');
  if (!isset($_SESSION['username'])) {
      header('Location: login.php');
    }

  $session_username = $_SESSION['username'];
  $session_role4 = $_SESSION['role'];
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
            <h1><i class="fa fa-user" aria-hidden="true"></i> Welcome <?php echo ucfirst($session_username);?></h1><hr>
            <ol class="breadcrumb">
              <li><a href="home.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-user"></i> Students</li>
            </ol>
            <?php
                if ($session_role4 == 'instructor') {
             ?>
                <h3>Students :</h3>
                <?php
                  $query = "SELECT * FROM `users` WHERE `role` = 'student'";
                  $run = mysqli_query($db,$query);
                  if (mysqli_num_rows($run) > 0) {
                  
                ?>
                <table class="table table-hover table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Sr #</th>
                      <th>Student Name</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      while ($row = mysqli_fetch_array($run)) {
                        $student_id = $row['id'];
                        $student_username = $row['username'];
                        $student_email = $row['email'];
                    ?>
                    <tr>
                      <td><?php echo $student_id;?></td>
                      <td><?php echo $student_username;?></td>
                      <td><?php echo $student_email;?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <?php
                  }
                  else{
                    echo "<center><h2> No Students Avaliable </h2></center>";
                  }
                ?>
            <?php 
                }
                else if ($session_role4 == 'student'){
             ?>
                <div class="col-md-9">
                  <a href="view-quizzes.php" class="btn btn-primary">View Quizzes</a>
                </div>
            <?php } ?>
          </div>
        </div>
      </div>
  <?php require_once('include/footer.php'); ?>