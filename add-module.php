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
            <h1><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modules <small>Add New Module/ New Topic</small></h1><hr>
            <ol class="breadcrumb">
              <li><a href="home.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-folder-open"></i> Add New Module/ New Topic</li>
            </ol>

            <div class="row">
              <div class="col-md-6">
                <form action="">
                  <div class="form-group">
                    <h3><i class="fa fa-pencil-square-o" aria-hidden="true"></i> New Module</h3><hr>
                    <label for="Role">Course:</label>
                    <select name="role" id="role" class="form-control">
                      <option value="course1">Course 1</option>
                      <option value="course2">Course 2</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="module">New Module Name:</label>
                    <input type="text" name="" placeholder="Module Name" class="form-control">
                  </div>
                  <input type="submit" value="Add New Module" name="submit" class="btn btn-primary">
                </form>
              </div>
              <div class="col-md-6">
                <form action="">
                  <div class="form-group">
                    <h3><i class="fa fa-list" aria-hidden="true"></i> New Topic</h3><hr>
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
                  <input type="submit" value="Add New Topic" name="submit" class="btn btn-primary">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
  <?php require_once('include/footer.php'); ?>