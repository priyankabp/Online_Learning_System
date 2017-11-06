<?php require_once('include/top.php');
    if (!isset($_SESSION['username'])) {
      header('Location: login.php');
    }
 ?>
<?php require_once('include/config.php'); ?>
<?php require_once('server.php'); ?>
<?php include_once('dao/quizDao.php');?>
<?php
$asmnt_name = $_GET['assessment_name'];
$quizDao = new quizDao($db);
$assessment_id = $_GET['assessment_id'];
$submission_id = uniqid();

//$b =   $_GET['module'];
if ($_GET['page'] == "create_assessment") {
    $quizDao->createAssessment($asmnt_name, $_GET['module'], '1' );
}

foreach ($_GET as $name => $value) {
    $question_id = explode("question_", $name);
    //it is a check to see that request parameter starts with "question_" and has a numeric id after it
    if ($question_id[0] == '' && $question_id[1] > 0) {
        $sql = "INSERT INTO registration.test_results (assessment_id, user_id, question_id, answer,submission)
          VALUES ($assessment_id, 1, $question_id[1],'$value','$submission_id')";
        if ($db->query($sql) === TRUE) {
            //echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
    }
}

?>
</head>
<body xmlns="http://www.w3.org/1999/html">
<div id="wrapper">
<?php require_once('include/header.php'); ?>

    <div class="container-fluid body-section">
    <div class="row">

        <div class="col-md-3">
            <?php require_once('include/left-sidebar.php'); ?>
        </div>

        <div class="col-md-9">
            <?php
            $query = "select module_name from registration.modules where id = ".$_GET['module'].";";
            if ($result = $db->query($query)) {
                /* fetch associative array */
                while ($row = $result->fetch_assoc()) {
                    $b = $row['module_name'];
                }
                /* free result set */
                $result->free();
            }
            ?>
            <h1><i class="fa fa-graduation-cap" aria-hidden="true"></i> <?php echo $_GET['assessment_name'] ?> <br><small><?php echo $b ?></small></h1>
            <hr>

            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-tachometer"></i>Dashboard</a></li>
                <li><a href="assessments.php">Assessments</a></li>
                <li class="active"><?php echo $_GET['assessment_name'] ?></li>
            </ol>
        </div>
        <div class="col-md-6">
            <?php
            $i=0;
            $query = "select a.name, q.content, q.type, q.assessment_id, q.id, q.points  from registration.questions
                    q join registration.assessments a on a.id = q.assessment_id where a.name ='$asmnt_name'";
            if ($result = $db->query($query)) {
                /* fetch associative array */
                while ($row = $result->fetch_assoc()) {
                    $i++;
                    $points =$row['points'];
                    ?>
                    <table>
                    <tr>
                    <label for="num"><?=$i?>.</label>
                    <label for="question"><?=$row['content']?></label>
                    </tr>
                    <tr><td>
                    <?php
                    // checking what type of questions mc or fill_in
                    //$answer_query = "select answer, correct from registration.answers where question_id=$row[id]";
                            $answer_query ="SELECT 	a.answer, r.answer as test_results, a.correct
                                            FROM registration.test_results r
                                            join registration.answers a on r.question_id = a.question_id
                                            where r.question_id = $row[id] and r.submission = '$submission_id'";

                           // echo $answer_query . "<br>";
                    if ($answer_result = $db->query($answer_query)) {
                        /* fetch associative array */
                        $mc_ul_open = FALSE;
                        $is_correct_answer = FALSE;
                        while ($answer_row = $answer_result->fetch_assoc()) {
                            if ($row['type'] == "mc"){
                                if ( $mc_ul_open == FALSE ){
                                    echo "<ul>";
                                    $mc_ul_open = TRUE;
                                }
                                $color = "black";

                                if ($answer_row['correct']=='y'){
                                    $color = "style=\"color: lawngreen\"";
                                    if (($answer_row['test_results'] == $answer_row['answer'])) {
                                        $is_correct_answer = TRUE;
                                    }
                                }
                                elseif ( ($answer_row['test_results'] == $answer_row['answer']) ) {
                                    $color = "style=\"color: red\"";

                                }
                                //echo $color;
                                ?>
                                    <li <?= $color ?> ><?=$answer_row['answer']?></li>
                            <?php }
                            else if ($row['type'] == "fi"){?>
                                <p><?= $answer_row['test_results']  ?></p>
                                <label for="answer">Right Answer(s) will be graded by the instructor:</label>
                                <p style="color: #7cfc00"><?=$answer_row['answer']?></p>
                            <?php }
                        }
                        if ($mc_ul_open == TRUE ) { echo "</ul>".($is_correct_answer?"Correct: $points out of $points":"Incorrect: 0 out of $points")."<br>";}
                    }
                    $answer_result->free();?>
                    </td></tr>
                    </table><?php
                }
                /* free result set */
                $result->free();
            }
            ?>
        </div>
    </div>
<?php require_once('include/footer.php'); ?>
