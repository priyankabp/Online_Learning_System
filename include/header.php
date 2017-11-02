<!-- notification message -->
<?php if (isset($_SESSION['success'])) : ?>
  <div class="error success" >
    <h3>
      <?php 
        echo $_SESSION['success']; 
        unset($_SESSION['success']);
      ?>
    </h3>
  </div>
<?php endif ?>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Online Learning System</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="add-course.php"><i class="fa fa-book" aria-hidden="true"></i> Add Course</a></li>
            <li><a href="add-module.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add Module</a></li>
            <li><a href="add-assessment.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Add Assesment</a></li>
            <!-- logged in user information -->
            <?php  if (isset($_SESSION['username'])) : ?>
            <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Welcome <?php echo $_SESSION['username']; ?></a></li>
            <li><a href="home.php?logout='1'"><i class="fa fa-power-off" aria-hidden="true"></i> Log Out</a></li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </nav>