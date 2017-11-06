<?php
  $session_role1 = $_SESSION['role'];
  $course_tag_query = "SELECT * FROM registration.courses";
  $module_tag_query = "SELECT * FROM registration.modules";
  $assessment_tag_query = "SELECT * FROM registration.assessments";
  $user_tag_query = "SELECT * FROM registration.users WHERE role = 'student'";
  $topic_tag_query = "SELECT * FROM registration.topics";

  $course_tag_run = mysqli_query($db,$course_tag_query);
  $module_tag_run = mysqli_query($db,$module_tag_query);
  $assessment_tag_run = mysqli_query($db,$assessment_tag_query);
  $user_tag_run = mysqli_query($db,$user_tag_query);
  $topic_tag_run = mysqli_query($db,$topic_tag_query);

  $course_rows = mysqli_num_rows($course_tag_run);
  $module_rows = mysqli_num_rows($module_tag_run);
  $assessment_rows = mysqli_num_rows($assessment_tag_run);
  $user_rows = mysqli_num_rows($user_tag_run);
  $topic_rows = mysqli_num_rows($topic_tag_run);
  
?>
<div class="list-group">
            <a href="home.php" class="list-group-item active">
              <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
            </a>
            <?php
                if ($session_role1 == 'instructor') {
              ?>
            <a href="courses.php" class="list-group-item">
              <span class="badge"><?php echo $course_rows;?></span>
              <i class="fa fa-book" aria-hidden="true"></i> Courses
            </a>
            <a href="modules.php" class="list-group-item">
              <span class="badge"><?php echo $module_rows;?></span>
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modules
            </a>
            <a href="topics.php" class="list-group-item">
              <span class="badge"><?php echo $topic_rows;?></span>
              <i class="fa fa-list" aria-hidden="true"></i> Topics
            </a>
            <a href="assessments.php" class="list-group-item">
              <span class="badge"><?php echo $assessment_rows;?></span>
              <i class="fa fa-graduation-cap" aria-hidden="true"></i> Assessments
            </a>
            <?php } ?>
            <a href="student.php" class="list-group-item">
              <span class="badge"><?php echo $user_rows;?></span>
              <i class="fa fa-users" aria-hidden="true"></i> Students
            </a>
          </div>