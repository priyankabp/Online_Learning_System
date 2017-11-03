<?php require_once('include/top.php'); 
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
   }
  else if (isset($_SESSION['username']) && $_SESSION['role'] =='student'){
    header('Location: home.php');
  }
?>
<?php require_once('include/config.php'); ?>
<?php require_once('server.php'); ?>
<?php
/*echo "MODULE NAME GET : '", $_GET['assessment_name'], "'<BR> ";
echo "MODULE NAME GET : '", $_GET['role'], "'<BR> ";
if ($_GET['assessment_name']) {
    $sql = "INSERT INTO registration.assessments (name, id_module, id_user)
    VALUES ('" . $_GET['assessment_name'] ."','". $_GET['role'] ."', '1')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //$conn->close();
}
*/?>
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
            <h1><i class="fa fa-graduation-cap" aria-hidden="true"></i> Assessments <small>Add New Assessment</small></h1><hr>
            <ol class="breadcrumb">
              <li><a href="home.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-folder-open"></i> Add New Assessment</li>
            </ol>
          </div>
            <div class="col-md-6">
                <form action="newquiz.php">
                    <input type="hidden" name="page" value="create_assessment" />
                    <div class="form-group">
                        <label for="module">Module:</label>
                        <select name="module" id="module" class="form-control">
                        <?php
                        $query = "SELECT id, module_name from registration.modules";
                        if ($result = $conn->query($query)) {
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
                        <label for="assessment">Assessment Name:</label>
                        <input type="text" name="assessment_name" placeholder="Assessment Name" class="form-control">
                    </div>
                    <input type="submit" value="Add Assessment" name="submit_assessment" class="btn btn-primary">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </form>
            </div>
        </div>
      </div>
  <?php require_once('include/footer.php'); ?>