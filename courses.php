<?php require_once('include/top.php'); ?>
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
                    <input type="text" name="" placeholder="Course Name" class="form-control">
                  </div>
                  <input type="submit" value="Add Course" name="submit" class="btn btn-primary">
                </form>
              </div>
              <div class="col-md-6">
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
                    <tr>
                      <td>1</td>
                      <td>Course 1</td>
                      <td><a href="#"><i class="fa fa-pencil"></i></a></td>
                      <td><a href="#"><i class="fa fa-times"></i></a></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Course 2</td>
                      <td><a href="#"><i class="fa fa-pencil"></i></a></td>
                      <td><a href="#"><i class="fa fa-times"></i></a></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Course 3</td>
                      <td><a href="#"><i class="fa fa-pencil"></i></a></td>
                      <td><a href="#"><i class="fa fa-times"></i></a></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Course 4</td>
                      <td><a href="#"><i class="fa fa-pencil"></i></a></td>
                      <td><a href="#"><i class="fa fa-times"></i></a></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Course 5</td>
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