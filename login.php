<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login | OLS</title>

    <!-- Bootstrap -->
    <link href="images/favicon.png" rel="icon">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/animated.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <nav class="navbar navbar-default navbar-fixed-top">
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
                      <form class="form-signin">
                        <h2 class="form-signin-heading">Sign In</h2>
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" value="remember-me"> Remember me
                          </label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                        <p>
                          Not yet a member? <a href="register.php">Sign up</a>
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