<?php 
  require_once('include/top.php');  
  require_once('include/config.php');
  require_once('server.php');
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  $session_role3 = $_SESSION['role'];

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }

  $course_tag_query = "SELECT * FROM `courses`";
  $module_tag_query = "SELECT * FROM `modules`";
  $assessment_tag_query = "SELECT * FROM `assessments`";
  $user_tag_query = "SELECT * FROM `users` WHERE role = 'student'";

  $course_tag_run = mysqli_query($db,$course_tag_query);
  $module_tag_run = mysqli_query($db,$module_tag_query);
  $assessment_tag_run = mysqli_query($db,$assessment_tag_query);
  $user_tag_run = mysqli_query($db,$user_tag_query);

  $course_rows = mysqli_num_rows($course_tag_run);
  $module_rows = mysqli_num_rows($module_tag_run);
  $assessment_rows = mysqli_num_rows($assessment_tag_run);
  $user_rows = mysqli_num_rows($user_tag_run);

?>
  </head>
  <body>
    <div id="wrapper">
    <?php require_once('include/header.php');  ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <?php require_once('include/left-sidebar.php');?>
        </div>
        <div class="col-md-9">
          <h1><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard <small>Statics Overview</small></h1><hr>
          <ol class="breadcrumb">
            <li class="active">Dashboard</a></li>
          </ol>

          <!--Items Box Open-->
            <div class="row tag-boxes">

              <!--Courses Box Open-->
              <div class="col-md-6 col-lg-3">
                <div class="panel panel-purple">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-3">
                        <i class="fa fa-book fa-5x"></i>
                      </div>
                      <div class="col-xs-9">
                        <div class="text-right huge"><?php echo $course_rows;?></div>
                        <div class="text-right">Courses</div>
                      </div>
                    </div>
                  </div>
                  <a href="courses.php">
                    <div class="panel-footer">
                      <span class="pull-left"> View All Courses</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                    </div>
                  </a>
                </div>
              </div><!--Courses Box Close-->

              <!--Module Box Open-->
              <div class="col-md-6 col-lg-3">
                <div class="panel panel-darkblue">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-3">
                        <i class="fa fa-pencil-square-o fa-5x"></i>
                      </div>
                      <div class="col-xs-9">
                        <div class="text-right huge"><?php echo $module_rows;?></div>
                        <div class="text-right">All Modules</div>
                      </div>
                    </div>
                  </div>
                  <a href="modules.php">
                    <div class="panel-footer">
                      <span class="pull-left"> View All Modules</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                    </div>
                  </a>
                </div>
              </div><!--Module Box Close-->

              <!--Assessment Box Open-->
              <div class="col-md-6 col-lg-3">
                <div class="panel panel-cyan">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-3">
                        <i class="fa fa-graduation-cap fa-5x"></i>
                      </div>
                      <div class="col-xs-9">
                        <div class="text-right huge"><?php echo $assessment_rows;?></div>
                        <div class="text-right">All Assessments</div>
                      </div>
                    </div>
                  </div>

                  <?php
                    if ($session_role3 == 'instructor') {
                  ?>
                      <a href="allreports.php">
                  <?php 
                    } 
                    else if ($session_role3 == 'student'){
                  ?>
                      <a href="view-quizzes.php">
                  <?php } ?>
                    <div class="panel-footer">
                      <span class="pull-left"> View All Assessments</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                    </div>
                  </a>
                </div>
              </div><!--Assessments Box Close-->

              <!--Studnts Box Open-->
              <div class="col-md-6 col-lg-3">
                <div class="panel panel-green">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                      </div>
                      <div class="col-xs-9">
                        <div class="text-right huge"><?php echo $user_rows;?></div>
                        <div class="text-right">All Students</div>
                      </div>
                    </div>
                  </div>
                  <a href="student.php">
                    <div class="panel-footer">
                      <span class="pull-left"> View All Students</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                    </div>
                  </a>
                </div>
              </div><!--Students Box Close-->
            </div><hr><!-- Items Box Close -->


            <div class="row">
                <div class="col-md-6">
                    <h3>Courses :</h3>
                    <?php
                      $get_courses_query = "SELECT * FROM registration.courses ORDER BY course_id DESC LIMIT 5";
                      $get_courses_run = mysqli_query($db,$get_courses_query);

                        if ($get_courses_run == FALSE) {
                            echo $db->error;
                        }
                      if (mysqli_num_rows($get_courses_run)>0) {
                        
                    ?>
                    <table class="table table-hover table-stripped">
                      <thead>
                        <tr>
                          <th>Sr #</th>
                          <th>Course Name</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          while ($get_courses_row = mysqli_fetch_array($get_courses_run)) {
                            $course_id = $get_courses_row['course_id'];
                            $course_name = $get_courses_row['course_name'];
                        ?>
                        <tr>
                          <td><?php echo $course_id;?></td>
                          <td><?php echo $course_name;?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <a href="courses.php" class="btn btn-primary">View All Courses</a>
                    <hr>
                    <?php 
                      } 
                      else{
                        echo "<center><h2> No Courses Avaliable </h2></center>";
                      }
                    ?>
                </div>

                <div class="col-md-6">
                    <h3>Modules :</h3>
                    <?php
                      $get_modules_query = "SELECT * FROM modules ORDER BY id DESC LIMIT 5";
                      $get_modules_run = mysqli_query($db,$get_modules_query);
                      if (mysqli_num_rows($get_modules_run)>0) {
                        
                    ?>
                    <table class="table table-hover table-stripped">
                      <thead>
                        <tr>
                          <th>Sr #</th>
                          <th>Module Name</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          while ($get_modules_row = mysqli_fetch_array($get_modules_run)) {
                            $module_id = $get_modules_row['id'];
                            $module_name = $get_modules_row['module_name'];
                        ?>
                        <tr>
                          <td><?php echo $module_id;?></td>
                          <td><?php echo $module_name;?></td>
                        </tr>
                        <?php 
                          }
                        ?>
                      </tbody>
                    </table>
                    <a href="modules.php" class="btn btn-primary">View All Modules</a>
                    <hr>
                    <?php 
                      } 
                      else{
                        echo "<center><h2> No Modules Avaliable </h2></center>";
                      } 
                    ?>
                </div>
            </div><hr>

            <div class="row">

                <div class="col-md-6">
                    <h3>Assessments :</h3>
                    <?php
                      $get_assessments_query = "SELECT * FROM assessments ORDER BY id DESC LIMIT 5";
                      $get_assessments_run = mysqli_query($db,$get_assessments_query);
                      if (mysqli_num_rows($get_assessments_run)>0) {
                        
                    ?>
                    <table class="table table-hover table-stripped">
                      <thead>
                        <tr>
                          <th>Sr #</th>
                          <th>Assessment Name</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          while ($get_assessments_row = mysqli_fetch_array($get_assessments_run)) {
                            $assessment_id = $get_assessments_row['id'];
                            $assessment_name = $get_assessments_row['name'];
                        ?>
                        <tr>
                          <td><?php echo $assessment_id;?></td>
                          <td><?php echo $assessment_name;?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <a href="allreports.php" class="btn btn-primary">View All Assessments</a>
                    <hr>
                    <?php 
                      } 
                      else{
                        echo "<center><h2> No Assessments Avaliable </h2></center>";
                      } 
                    ?>
                </div>

                <div class="col-md-6">
                    <h3>Topics :</h3>
                    <?php
                      $get_topics_query = "SELECT * FROM topics ORDER BY id DESC LIMIT 5";
                      $get_topics_run = mysqli_query($db,$get_topics_query);
                      if (mysqli_num_rows($get_topics_run)>0) {
                        
                    ?>
                    <table class="table table-hover table-stripped">
                      <thead>
                        <tr>
                          <th>Sr #</th>
                          <th>Course Name</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          while ($get_topics_row = mysqli_fetch_array($get_topics_run)) {
                            $topic_id = $get_topics_row['id'];
                            $topic_name = $get_topics_row['topic_name'];
                        ?>
                        <tr>
                          <td><?php echo $topic_id;?></td>
                          <td><?php echo $topic_name;?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <a href="topics.php" class="btn btn-primary">View All Topics</a>
                    <hr>
                    <?php 
                      } 
                      else{
                        echo "<center><h2> No Topics Avaliable </h2></center>";
                      } 
                    ?>
                </div>
            </div><hr>
        </div>
      </div>
    </div>
<?php require_once('include/footer.php'); ?>