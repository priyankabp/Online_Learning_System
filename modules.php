<?php require_once('include/top.php');
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
  echo "MODULE NAME GET : '", $_GET['module_name'], "'<BR> ";
  if ($_GET['submit_module']) {
      $sql = "INSERT INTO registration.modules (module_name, id_user) VALUES ('" . $_GET['module_name'] . "', '1')";
      if ($db->query($sql) === TRUE) {
          echo "New record created successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $db->error;
      }
  }

  # Delete Module functionality
  echo "Delete Module : '", $_GET['delete'], "'<BR> ";
  if (isset($_GET['delete'])) {
    # Get the id of the Module to be deleted
    $delete_id = $_GET['delete'];
    # Delete query to delete the Module
    $delete_query = "DELETE FROM `registration`.`modules` WHERE `id`= $delete_id;";
    if (mysqli_query($db,$delete_query)) {
      $msg = "Module has been deleted";
    }
    else{
      $error = "Module has not been deleted";
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
            <h1><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modules <small>Different Modules</small></h1><hr>
            <ol class="breadcrumb">
              <li><a href="home.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-folder-open"></i> Modules</li>
            </ol>

            <?php
                $query = "SELECT id,module_name FROM modules";
                $run = mysqli_query($db,$query);
                if(mysqli_num_rows($run) > 0){

              ?>
            <div class="row">
              <div class="col-md-6">
                <form action="">
                  <div class="form-group">
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
                    <label for="module">Module Name:</label>
                    <input type="text" name="module_name" placeholder="Module Name" class="form-control">
                  </div>
                  <input type="submit" value="Add Module" name="submit_module" class="btn btn-primary">

                </form>
              </div>

              <!-- Displaying message for the admin if the module is deleted or not-->
                <?php
                  if (isset($error)) {
                    echo "<span style='color:red;' class='pull-right'>$error</span>";
                  }
                  elseif (isset($msg)) {
                    echo "<span style='color:green;' class='pull-right'>$msg</span>";
                  }
                ?>
              
              <div class="col-md-6">
                <table class="table table-hover table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Sr #</th>
                      <th>Course</th>
                      <th>Module Name</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      while ($row = mysqli_fetch_array($run)) {
                        $id = $row['id'];
                        #$course_name = ucfirst($row['course_id']);
                        $module_name = ucfirst($row['module_name']);
                    ?>
                    <tr>
                      <td><?php echo $id;?></td>
                      <td></td>
                      <td><?php echo $module_name;?></td>
                      <td><a href="add-module.php?edit=<?php echo $id;?>"><i class="fa fa-pencil"></i></a></td>
                      <td><a href="modules.php?delete=<?php echo $id;?>"><i class="fa fa-times"></i></a></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>

                <?php
                  }
                  else{
                    echo "<center><h2>No Modules Avaliable </h2></center>";
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
  <?php require_once('include/footer.php'); ?>