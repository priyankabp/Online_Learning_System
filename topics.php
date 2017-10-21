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
            <h1><i class="fa fa-folder-open" aria-hidden="true"></i> Topics <small>Different Topics</small></h1><hr>
            <ol class="breadcrumb">
              <li><a href="home.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-folder-open"></i> Topics</li>
            </ol>

            <div class="row">
              <div class="col-md-4">
                <form action="">
                  <div class="form-group">
                    <label for="course">Course:</label>
                    <select name="course" id="course" class="form-control">
                      <option value="course1">Course 1</option>
                      <option value="course2">Course 2</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="module">Module Name:</label>
                    <select name="module" id="module" class="form-control">
                      <option value="module1">Module 1</option>
                      <option value="module2">Module 2</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="module">Topic Name:</label>
                    <input type="text" name="" placeholder="Module Name" class="form-control">
                  </div>
                  <input type="submit" value="Add Module" name="submit" class="btn btn-primary">
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
                    <tr>
                      <td>1</td>
                      <td>Course 1</td>
                      <td>Module 1</td>
                      <td>Topic 1</td>
                      <td><a href="#"><i class="fa fa-pencil"></i></a></td>
                      <td><a href="#"><i class="fa fa-times"></i></a></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Course 1</td>
                      <td>Module 2</td>
                      <td>Topic 1</td>
                      <td><a href="#"><i class="fa fa-pencil"></i></a></td>
                      <td><a href="#"><i class="fa fa-times"></i></a></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Course 2</td>
                      <td>Module 2</td>
                      <td>Topic 1</td>
                      <td><a href="#"><i class="fa fa-pencil"></i></a></td>
                      <td><a href="#"><i class="fa fa-times"></i></a></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Course 2</td>
                      <td>Module 4</td>
                      <td>Topic 3</td>
                      <td><a href="#"><i class="fa fa-pencil"></i></a></td>
                      <td><a href="#"><i class="fa fa-times"></i></a></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Course 2</td>
                      <td>Module 5</td>
                      <td>Topic 3</td>
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