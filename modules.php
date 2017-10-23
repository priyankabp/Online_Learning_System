<?php require_once('include/top.php'); ?>
<?php require_once('include/config.php'); ?>
<?php
echo "MODULE NAME GET : '", $_GET['module_name'], "'<BR> ";
if ($_GET['module_name']) {
    $sql = "INSERT INTO registration.modules (name, id_user) VALUES ('" . $_GET['module_name'] . "', '1')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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

            <div class="row">
              <div class="col-md-6">
                <form action="">
                  <div class="form-group">
                    <label for="Role">Course:</label>
                    <select name="role" id="role" class="form-control">
                      <option value="course1">Course 1</option>
                      <option value="course2">Course 2</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="module">Module Name:</label>
                    <input type="text" name="module_name" placeholder="Module Name" class="form-control">
                  </div>
                  <input type="submit" value="Add Module" name="submit" class="btn btn-primary">

                </form>
              </div>
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
                    <tr>
                      <td>1</td>
                      <td>Course 1</td>
                      <td>Module 1</td>
                      <td><a href="#"><i class="fa fa-pencil"></i></a></td>
                      <td><a href="#"><i class="fa fa-times"></i></a></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Course 1</td>
                      <td>Module 2</td>
                      <td><a href="#"><i class="fa fa-pencil"></i></a></td>
                      <td><a href="#"><i class="fa fa-times"></i></a></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Course 2</td>
                      <td>Module 3</td>
                      <td><a href="#"><i class="fa fa-pencil"></i></a></td>
                      <td><a href="#"><i class="fa fa-times"></i></a></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Course 2</td>
                      <td>Module 4</td>
                      <td><a href="#"><i class="fa fa-pencil"></i></a></td>
                      <td><a href="#"><i class="fa fa-times"></i></a></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Course 2</td>
                      <td>Module 5</td>
                      <td><a href="#"><i class="fa fa-pencil"></i></a></td>
                      <td><a href="#"><i class="fa fa-times"></i></a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  <?php require_once('include/footer.php'); ?>