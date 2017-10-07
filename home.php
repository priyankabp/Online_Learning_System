<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Start Bootstrap
                    </a>
                </li>
                <li>
                    <a href="#courses">Courses</a>
                </li>
                <li>
                    <a href="#assignments">Assignments</a>
                </li>
                <li>
                    <a href="#exams">Exams</a>
                </li>
                <li>
                    <a href="#contact">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#menu-toggle" class="btn btn-secondary btn-lg" id="menu-toggle">
                        <span style="color:white" onclick="openNav()">&#9776; Project Name </span>
                    </a>
                </div>

                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">

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

                        <li>
                            <a class="navbar-brand" href="#user">Welcome <strong><?php echo $_SESSION['username']; ?></strong> </a>
                        </li>
                        <li> 
                                <a class="navbar-brand" href="index.php?logout='1'" style="color: red;">LogOut</a> 
                        </li>

                        <!-- logged in user information -->
                        <?php  if (isset($_SESSION['username'])) : ?>
                            <li>
                                <a class="navbar-brand" href="#user">Welcome <strong><?php echo $_SESSION['username']; ?></strong> </a>
                            </li>
                            <!--<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>-->
                            <li> 
                                <a class="navbar-brand" href="index.php?logout='1'" style="color: red;">LogOut</a> 
                            </li>
                        <?php endif ?>   
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>


    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>