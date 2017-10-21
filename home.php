<?php require_once('include/top.php');  ?>
  </head>
  <body>
    <?php require_once('include/header.php');  ?>
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

              <!--Courses Box Open-->
              <div class="col-md-6 col-lg-3">
                <div class="panel panel-purple">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-3">
                        <i class="fa fa-book fa-5x"></i>
                      </div>
                      <div class="col-xs-9">
                        <div class="text-right huge">11</div>
                        <div class="text-right">Courses</div>
                      </div>
                    </div>
                  </div>
                  <a href="#">
                    <div class="panel-footer">
                      <span class="pull-left"> View All Courses</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                    </div>
                  </a>
                </div>
              </div><!--Courses Box Close-->

              <!--Module Box Open-->
              <div class="col-md-6 col-lg-3">
                <div class="panel panel-darkblue">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-3">
                        <i class="fa fa-pencil-square-o fa-5x"></i>
                      </div>
                      <div class="col-xs-9">
                        <div class="text-right huge">18</div>
                        <div class="text-right">All Modules</div>
                      </div>
                    </div>
                  </div>
                  <a href="#">
                    <div class="panel-footer">
                      <span class="pull-left"> View All Modules</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                    </div>
                  </a>
                </div>
              </div><!--Module Box Close-->

              <!--Assessment Box Open-->
              <div class="col-md-6 col-lg-3">
                <div class="panel panel-cyan">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-3">
                        <i class="fa fa-graduation-cap fa-5x"></i>
                      </div>
                      <div class="col-xs-9">
                        <div class="text-right huge">30</div>
                        <div class="text-right">All Assessments</div>
                      </div>
                    </div>
                  </div>
                  <a href="#">
                    <div class="panel-footer">
                      <span class="pull-left"> View All Assessments</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                    </div>
                  </a>
                </div>
              </div><!--Assessments Box Close-->

              <!--Studnts Box Open-->
              <div class="col-md-6 col-lg-3">
                <div class="panel panel-green">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                      </div>
                      <div class="col-xs-9">
                        <div class="text-right huge">9</div>
                        <div class="text-right">All Students</div>
                      </div>
                    </div>
                  </div>
                  <a href="#">
                    <div class="panel-footer">
                      <span class="pull-left"> View All Students</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                    </div>
                  </a>
                </div>
              </div><!--Students Box Close-->
            </div><hr><!-- Items Box Close -->

          </div>
        </div>
      </div>
        </div>
      </div>
    </div>
<?php require_once('include/footer.php'); ?>