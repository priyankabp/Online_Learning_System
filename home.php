<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Instructor | OLS</title>

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

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Module</a></li>
            <li><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add Topic</a></li>
            <li><a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Add Assesment</a></li>
            <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
            <li><a href="#"><i class="fa fa-power-off" aria-hidden="true"></i> Log Out</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <?php require_once('include/left-sidebar.php');?>
        </div>
        <div class="col-md-9">
          <h1><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard <small>Statics Overview</small></h1><hr>
          <ol class="breadcrumb">
            <li class="active">Dashboard</a></li>
          </ol>

          <!--Items Box Open-->
            <div class="row tag-boxes">

              <!--Comment Box Open-->
              <div class="col-md-6 col-lg-3">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                      </div>
                      <div class="col-xs-9">
                        <div class="text-right huge">11</div>
                        <div class="text-right">New Comments</div>
                      </div>
                    </div>
                  </div>
                  <a href="#">
                    <div class="panel-footer">
                      <span class="pull-left"> View All Comments</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                    </div>
                  </a>
                </div>
              </div><!--Comment Box Close-->

              <!--Post Box Open-->
              <div class="col-md-6 col-lg-3">
                <div class="panel panel-red">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                      </div>
                      <div class="col-xs-9">
                        <div class="text-right huge">18</div>
                        <div class="text-right">All Posts</div>
                      </div>
                    </div>
                  </div>
                  <a href="#">
                    <div class="panel-footer">
                      <span class="pull-left"> View All Posts</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                    </div>
                  </a>
                </div>
              </div><!--Post Box Close-->

              <!--Users Box Open-->
              <div class="col-md-6 col-lg-3">
                <div class="panel panel-yellow">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                      </div>
                      <div class="col-xs-9">
                        <div class="text-right huge">30</div>
                        <div class="text-right">All Users</div>
                      </div>
                    </div>
                  </div>
                  <a href="#">
                    <div class="panel-footer">
                      <span class="pull-left"> View All Users</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                    </div>
                  </a>
                </div>
              </div><!--Users Box Close-->

              <!--Categories Box Open-->
              <div class="col-md-6 col-lg-3">
                <div class="panel panel-green">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-3">
                        <i class="fa fa-folder-open fa-5x"></i>
                      </div>
                      <div class="col-xs-9">
                        <div class="text-right huge">9</div>
                        <div class="text-right">All Categories</div>
                      </div>
                    </div>
                  </div>
                  <a href="#">
                    <div class="panel-footer">
                      <span class="pull-left"> View All Categories</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                    </div>
                  </a>
                </div>
              </div><!--Categories Box Close-->
            </div><hr><!-- Items Box Close -->

          </div>
        </div>
      </div>
        </div>
      </div>
    </div>
<?php require_once('include/footer.php'); ?>