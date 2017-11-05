<?php require_once('include/top.php'); 
    if (!isset($_SESSION['username'])) {
      header('Location: login.php');
    }
?>
<?php require_once('include/config.php');?>
<?php include_once('dao/quizDao.php');?>
<?php
$quizDao = new quizDao($db);
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
            <h1><i class="fa fa-graduation-cap" aria-hidden="true"></i> Assessments <small>All Quizzes</small></h1><hr>
            <ol class="breadcrumb">
              <li><a href="home.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
              <li><a href="assessments.php"><i class="fa fa-folder-open"></i> Assessments</a></li>
	      <li class="active"><i class="fa fa-folder-open"></i> All Quizzes</li>
            </ol>

            <?php
            if (isset($error)) {
                echo "<span style='color:red;' class='pull-right'>$error</span>";
            }
            elseif (isset($msg)) {
                echo "<span style='color:green;' class='pull-right'>$msg</span>";
            }
            ?>
            <div class="col-md-5">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Sr.#</th>
                        <th>Module</th>
                        <th>Quiz</th>
                        <th>Run</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $query = "select  m.module_name, a.name, a.id_module, a.id  from registration.modules m
                              join registration.assessments a on m.id = a.id_module;";
                    if ($result = $db->query($query)) {
                        /* fetch associative array */
                        $i=1;
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$row['module_name']?></td>
                                <td><a href="newquiz.php?assessment_name=<?=$row['name'] ?>"><?=$row['name']?></td>
                                <td><a href="test_run.php?assessment_name=<?=$row['name'] ?>"><i class="fa fa-caret-square-o-right"></i></a></td>
                            </tr>
                            <?php
                        }
                        /* free result set */
                        $result->free();
                    }?>

                    </tbody>


                </table>
            </div>
          </div>
        </div>
      </div>
<?php require_once('include/footer.php'); ?>