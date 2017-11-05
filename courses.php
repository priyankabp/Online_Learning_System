<?php 
  require_once('include/top.php');

  if (!isset($_SESSION['username'])) {
      header('Location: login.php');
  }
  elseif (isset($_SESSION['username']) && $_SESSION['role'] =='student'){
    header('Location: home.php');
   }
?>
<?php require_once('include/config.php'); ?>
<?php require_once('server.php'); ?>
<?php

   if (isset($_GET['edit'])) {
     $edit_id = $_GET['edit'];
   }

    if ($_GET['submit_course']) {
      $sql = "INSERT INTO registration.courses (course_name) VALUES ('" . $_GET['course_name'] . "')";
      if ($conn->query($sql) === TRUE) {
      } 
      else{
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

  # Delete Course functionality
  if (isset($_GET['delete'])) {
    # Get the id of the course to be deleted
    $delete_id = $_GET['delete'];
    # Delete query to delete the course
    $delete_query = "DELETE FROM `registration`.`courses` WHERE `course_id`= $delete_id;";
    if (mysqli_query($db,$delete_query)) {
      $msg = "Course has been deleted";
    }
    else{
      $error = "Course has not been deleted";
    }
  }

  if (isset($_POST['update'])) {
  $course_name = mysqli_real_escape_string($db,strtolower($_POST['course_name']));
  if (empty($course_name)) {
    $update_error = "Please add course name";
  }
  else{
    $check_query = "SELECT * FROM `courses` WHERE `course_name` = '$course_name'";
    $check_run = mysqli_query($db,$check_query);
    if (mysqli_num_rows($check_run) > 0) {
      $update_error = "Course name already exits";
    }
    else{
      $update_query = "UPDATE `courses` SET `course_name`='$course_name' WHERE `course_id`='$edit_id'";
      if (mysqli_query($db,$update_query)) {
        $update_msg = "Course name updated";
      }
      else{
        $update_error = "Failed to update Course Name";
      }
    }
  }
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
            <h1><i class="fa fa-book" aria-hidden="true"></i> Courses <small>Different Courses</small></h1><hr>
            <ol class="breadcrumb">
              <li><a href="home.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-folder-open"></i> Courses</li>
            </ol>

            
            <div class="row">
              <div class="col-md-6">
                <form action="">
                  <div class="form-group">
                    <label for="course">Course Name:</label>
                    <input type="text" name="course_name" placeholder="Course Name" class="form-control">
                  </div>
                  <input type="submit" value="Add New Course" name="submit_course" class="btn btn-primary">
                </form>

                <?php 
                  if (isset($_GET['edit'])) {
                    $edit_check_query = "SELECT * FROM courses WHERE course_id = $edit_id";
                    $edit_check_run = mysqli_query($db,$edit_check_query);
                    if (mysqli_num_rows($edit_check_run) > 0 ) {
                      

                    $edit_row = mysqli_fetch_array($edit_check_run);
                      $update_course = $edit_row['course_name'];
                    
                ?>

                <hr>
                <form action="" method="post">
                  <div class="form-group">
                    <label for="course">Update Course Name:</label>
                    <?php 
                          if (isset($update_msg)) {
                            echo "<span class='pull-right' style='color:green;'>$update_msg</span>";
                          }
                          elseif (isset($update_error)) {
                            echo "<span class='pull-right' style='color:red;'>$update_error</span>";
                          }
                    ?>
                    <input type="text" value="<?php echo $update_course;?>" name="course_name" placeholder="Course Name" class="form-control">
                  </div>
                  <input type="submit" name="update" value="Update Course" class="btn btn-primary">
                </form>
                <?php
                      }
                  }
                ?>
              </div>
              

               <!-- Displaying message for the admin if the course is deleted or not-->
                <?php
                  if (isset($error)) {
                    echo "<span style='color:red;' class='pull-right'>$error</span>";
                  }
                  elseif (isset($msg)) {
                    echo "<span style='color:green;' class='pull-right'>$msg</span>";
                  }
                ?>

              <div class="col-md-6">
                <?php
                  $query = "SELECT * FROM courses";
                  $run = mysqli_query($db,$query);
                  if (mysqli_num_rows($run) > 0) {
                  
                ?>
                <table class="table table-hover table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Sr #</th>
                      <th>Course Name</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                      while ($row = mysqli_fetch_array($run)) {
                        $id = $row['course_id'];
                        $course_name = $row['course_name'];
                    ?>
                    <tr>
                      <td><?php echo $id;?></td>
                      <td><?php echo $course_name;?></td>
                      <td><a href="courses.php?edit=<?php echo $id;?>"><i class="fa fa-pencil"></i></a></td>
                      <td><a href="courses.php?delete=<?php echo $id;?>"><i class="fa fa-times"></i></a></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <?php
                  }
                  else{
                    echo "<center><h2> No Courses Avaliable </h2></center>";
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php require_once('include/footer.php'); ?>