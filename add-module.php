<?php require_once('include/top.php');
  if (!isset($_SESSION['username'])) {
      header('Location: login.php');
  }
  elseif (isset($_SESSION['username']) && $_SESSION['role'] =='student'){
    header('Location: home.php');
   }
 ?>
<?php require_once('server.php'); ?>

<?php
if ($_GET['submit_module']) {
    $sql = "INSERT INTO registration.modules (module_name, id_user) VALUES ('" . $_GET['module_name'] . "', '1')";
    if ($db->query($sql) === TRUE) {
        //echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}
if ($_GET['submit_topic']) {
    $sql = "INSERT INTO registration.topics (course_id,module_id,topic_name,id_user) VALUES ('1','1','" . $_GET['topic_name'] . "','1')";
    if ($db->query($sql) === TRUE) {
        //echo "New record created successfully";
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
            <h1><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modules <small>Add New Module | New Topic</small></h1><hr>
            <ol class="breadcrumb">
              <li><a href="home.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-folder-open"></i> Add New Module | New Topic</li>
            </ol>

            <div class="row">
              <div class="col-md-6">
                <form action="">
                  <div class="form-group">
                    <h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i> New Module</h4><hr>
                    <label for="course">Course:</label>
                    <select name="course_name" id="course_name" class="form-control">
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
                    <label for="module">New Module Name:</label>
                    <input type="text" name="module_name" placeholder="Module Name" class="form-control">
                  </div>
                  <input type="submit" value="Add New Module" name="submit_module" class="btn btn-primary">
                </form>
              </div>
              <div class="col-md-6">
                <form action="">
                  <div class="form-group">
                    <h4><i class="fa fa-list" aria-hidden="true"></i> New Topic</h4><hr>
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
                  <input type="submit" value="Add New Topic" name="submit_topic" class="btn btn-primary">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
  <?php require_once('include/footer.php'); ?>