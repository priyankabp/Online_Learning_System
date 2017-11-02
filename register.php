<?php require_once('server.php'); ?>
<?php
  // REGISTER USER
  if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $role = mysqli_real_escape_string($db, $_POST['role']);

    $check_query = "SELECT * FROM users WHERE username = '$username' or email = '$email'";
    $check_run = mysqli_query($db,$check_query);
    // form validation: ensure that the form is correctly filled
    if (empty($username) or empty($email) or empty($password_1)) {
      $error = "All (*) fields are Required";
    }
    elseif ($password_1 != $password_2) {
      $errors = "The two passwords do not match";
    }
    else if (mysqli_num_rows($check_run) > 0) {
      $error = "Username or Email already exits";
    }
    // register user if there are no errors in the form
    else{
      $password = md5($password_1);//encrypt the password before saving in the database
      $query = "INSERT INTO `registration`.`users` (`username`, `email`, `password`,`role`) 
            VALUES('$username','$email', '$password','$role');";
      if(mysqli_query($db, $query)){
        $msg = "New user Added";
      }
      else{
        echo "Error: " . $query . "<br>" . $db->error;
        $error = "New User Not Added";
      }

      $_SESSION['username'] = $username;
      //$_SESSION['success'] = "You are now logged in";
      header('location: home.php');
    }

  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Register | OLS</title>

    <!-- Bootstrap -->
    <link href="images/favicon.png" rel="icon">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/animated.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

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
      </div>
    </nav>


    <!-- Top content -->
        <div class="top-content">
          <div class="container">
                  
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1>Online Lerning System</h1>
                        <div class="description">
                          <p>
                            This web based learning system framework will allow instructors to create any online learning system.
                          </p>
                        </div>
                    </div>
                </div>

                <div class="row register-form">
                    <div class="col-sm-4 col-sm-offset-1">
                      <form role="form" action="register.php" method="post" class="form-register">

                        <h2 class="form-register-heading">Register</h2>
                        <?php include('errors.php'); ?>

                        <div class="form-group">
                            <label class="sr-only" for="r-form-username">Username</label>
                              <?php 
                                if (isset($error)) {
                                  echo "<span class='pull-right' style='color:red;'>$error</span>";
                                }
                                elseif (isset($msg)) {
                                  echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                }
                              ?>
                            <input type="text" name="username" placeholder="Username..." class="r-form-username form-control" id="r-form-username" value="<?php echo $username; ?>">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="r-form-email">Email</label>
                            <input type="email" name="email" placeholder="Email..." class="r-form-last-name form-control" id="r-form-email" value="<?php echo $email; ?>">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="r-form-password">Password</label>
                            <input type="password" name="password_1" placeholder="Password..." class="r-form-password form-control" id="r-form-password">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="r-form-email">Confirm Password</label>
                            <input type="password" name="password_2" placeholder="Confirm Password..." class="r-form-confirm-password form-control" id="r-form-confirm-password">
                        </div>
                        <div class="form-group">
                          <select name="role">
                            <option value="select">Select your role</option>
                            <option value="student">Student</option>
                            <option value="instructor">Instructor</option>
                          </select>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block" name="reg_user" value="Sign me up!">
                        <p>Already a member? <a href="login.php">Sign In</a>
                        </p>
                      </form>
                    </div>

                    <div class="col-sm-6 forms-right-icons">
                      <div class="row">
                        <div class="col-md-4 icon"></div>
                        <div class="col-md-8">
                          <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> Courses</h3>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 icon"></div>
                        <div class="col-md-8">
                          <h3><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modules</h3>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 icon"></div>
                        <div class="col-md-8">
                          <h3><i class="fa fa-graduation-cap" aria-hidden="true"></i> Assessments</h3>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                        </div>
                      </div>
                    </div>
                </div>
        </div>
<?php require_once('include/footer.php'); ?>