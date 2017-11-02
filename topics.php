<?php require_once('include/top.php'); ?>
<?php require_once('server.php');?>
<?php

    if ($_GET['submit_topic']) {
    $sql = "INSERT INTO registration.topics (course_id,module_id,topic_name,topic_description,id_user) VALUES ('1','1','" . $_GET['topic_name'] . "','" . $_GET['topic_description'] . "','1')";
      if ($db->query($sql) === TRUE) {
          echo "New record created successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $db->error;
      }
    }

    

  # Delete Topic functionality
  if (isset($_GET['delete'])) {
    # Get the id of the Topic to be deleted
    $delete_id = $_GET['delete'];
    # Delete query to delete the Topic
    $delete_query = "DELETE FROM `registration`.`topics` WHERE `id`= $delete_id;";
    if (mysqli_query($db,$delete_query)) {
      $msg = "Topic has been deleted";
    }
    else{
      $error = "Topic has not been deleted";
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
            <h1><i class="fa fa-list" aria-hidden="true"></i> Topics <small>Different Topics</small></h1><hr>
            <ol class="breadcrumb">
              <li><a href="home.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-folder-open"></i> Topics</li>
            </ol>

            <?php
              $query = "SELECT id,course_id, module_id, topic_name FROM topics";
              $run = mysqli_query($db,$query);
              if (mysqli_num_rows($run) > 0) {
              
            ?>

            <div class="row">
              <div class="col-md-7">
                <form action="">
                  <div class="form-group">
                    <label for="course">Course:</label>
                    <select name="course_name" id="course" class="form-control">
                        <?php
                        $query = "SELECT * FROM registration.courses";
                        if ($result = $db->query($query)) {
                        /* fetch associative array */
                        while ($row = $result->fetch_assoc()) {
                            print "<option value=\"$row[course_id]\">${row[course_name]}</option>";
                        }
                        /* free result set */
                        $result->free();
                        }
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="module">Module Name:</label>
                    <select name="module_name" id="module_name" class="form-control">
                        <?php
                        $query = "SELECT id, module_name from registration.modules";
                        if ($result = $db->query($query)) {
                        /* fetch associative array */
                        while ($row = $result->fetch_assoc()) {
                            print "<option value=\"$row[id]\">${row[module_name]}</option>";
                        }
                        /* free result set */
                        $result->free();
                        }
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="topic">Topic Name:</label>
                    <input type="text" name="topic_name" placeholder="Topic Name" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="topic">Topic Description:</label>
                    <textarea name="topic_description" placeholder="Topic Description" class="form-control"></textarea>
                  </div>
                  <input type="submit" value="Add New Topic" name="submit_topic" class="btn btn-primary">
                </form>
              </div>

              <!-- Displaying message for the admin if the topic is deleted or not-->
                <?php
                  if (isset($error)) {
                    echo "<span style='color:red;' class='pull-right'>$error</span>";
                  }
                  elseif (isset($msg)) {
                    echo "<span style='color:green;' class='pull-right'>$msg</span>";
                  }
                ?>

              <div class="col-md-5">
                <table class="table table-hover table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Sr #</th>
                      <th>Topic</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      while ($row = mysqli_fetch_array($run)) {
                        $id = $row['id'];
                        $course_id = $row['course_id'];
                        $module_id = $row['module_id'];
                        $topic_name = $row['topic_name'];
                    ?>
                    <tr>
                      <td><?php echo $id;?></td>
                      <td><a href="view-topic.php?topic_id=<?php echo $id; ?>"><?php echo $topic_name;?></td>
                      <td><a href="add-module.php?edit=<?php echo $id;?>"><i class="fa fa-pencil"></i></a></td>
                      <td><a href="topics.php?delete=<?php echo $id;?>"><i class="fa fa-times"></i></a></td>
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