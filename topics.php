<?php require_once('include/top.php'); ?>
<?php require_once('server.php');?>
<?php
  if ($_GET['topic_name']) {
    $sql = "INSERT INTO registration.topics (course_name,module_name,topic_name,id_user) VALUES ('" . $_GET['course_name'] . "','" . $_GET['module_name'] . "','" . $_GET['topic_name'] . "','1')";
    if ($db->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
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
              $query = "SELECT id,course_name, module_name, topic_name FROM topics";
              $run = mysqli_query($db,$query);
              if (mysqli_num_rows($run) > 0) {
              
            ?>

            <div class="row">
              <div class="col-md-4">
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
                    <select name="module" id="module" class="form-control">
                        <?php
                        $query = "SELECT id, m_name from registration.modules";
                        if ($result = $db->query($query)) {
                        /* fetch associative array */
                        while ($row = $result->fetch_assoc()) {
                            print "<option value=\"$row[id]\">${row[m_name]}</option>";
                        }
                        /* free result set */
                        $result->free();
                        }
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="module">Topic Name:</label>
                    <input type="text" name="topic_name" placeholder="Module Name" class="form-control">
                  </div>
                  <input type="submit" value="Add Topic" name="submit" class="btn btn-primary">
                </form>
              </div>
              <div class="col-md-8">
                <table class="table table-hover table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Sr #</th>
                      <th>Course</th>
                      <th>Module</th>
                      <th>Topic</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      while ($row = mysqli_fetch_array($run)) {
                        $id = $row['id'];
                        $course_name = $row['course_name'];
                        $module_name = $row['module_name'];
                        $topic_name = $row['topic_name'];
                    ?>
                    <tr>
                      <td><?php echo $id;?></td>
                      <td><?php echo $course_name;?></td>
                      <td><?php echo $module_name;?></td>
                      <td><?php echo $topic_name;?></td>
                      <td><a href="#"><i class="fa fa-pencil"></i></a></td>
                      <td><a href="#"><i class="fa fa-times"></i></a></td>
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