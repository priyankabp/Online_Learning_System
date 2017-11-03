<?php require_once('include/top.php'); 
    if (!isset($_SESSION['username'])) {
      header('Location: login.php');
    }
?>
<?php require_once('include/config.php');?>
<?php include_once('dao/quizDao.php');?>
<?php
$quizDao = new quizDao($conn);

if (isset($_GET['delete'])) {
    $delete_id =  $_GET['delete'];

    $delete_answers= "delete from registration.answers where assessment_id=$delete_id;";;


    if (mysqli_query($conn,$delete_answers)) {
        $msg = "Answers has been deleted";
    }
    else{
        $error = "Answers has not been deleted";
    }

    $delete_questions = "delete from registration.questions where assessment_id=$delete_id;";

    if (mysqli_query($conn,$delete_questions)) {
        $msg = "Questions has been deleted";
    }
    else{
        $error = "Questions has not been deleted";
    }
    $delete_assessments = "delete from registration.assessments where id=$delete_id;";

    if (mysqli_query($conn,$delete_assessments)) {
        $msg = "Assessments has been deleted";
    }
    else{
        $error = "Assessments has not been deleted";
    }
}
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
          </div>
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
                        <th>Num #</th>
                        <th>Module</th>
                        <th>Quiz</th>
                        <th>Run</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $query = "select  m.module_name, a.name, a.id_module, a.id  from registration.modules m
                              join registration.assessments a on m.id = a.id_module;";
                    if ($result = $conn->query($query)) {
                        /* fetch associative array */
                        $i=1;
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$row['module_name']?></td>
                                <td><a href="newquiz.php?assessment_name=<?=$row['name'] ?>"><?=$row['name']?></td>
                                <td><a href="test_run.php?assessment_name=<?=$row['name'] ?>"><i class="fa fa-caret-square-o-right"></i></a></td>
                                <td><a href="newquiz.php?assessment_name=<?=$row['name'] ?>"><i class="fa fa-pencil"></i></a></td>
                                <td><a href="allreports.php?delete=<?=$row['id'] ?>"><i class="fa fa-times"></i></a></td>
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
<?php require_once('include/footer.php'); ?>