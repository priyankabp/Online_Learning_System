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
$quizDao = new quizDao($conn);

//$b =   $_GET['module'];
if ($_GET['page'] == "create_assessment") {
    $quizDao->createAssessment($asmnt_name, $_GET['module'], '1' );
}

if ($_GET['page'] == "mc")  {
    if ($_GET['question_content']) {
        //echo $_GET['question_content'];

        $sql = "INSERT INTO registration.questions (content, type, assessment_id)
    SELECT '${_GET['question_content']}','mc', assmnt.id
    from registration.assessments assmnt where name= '$asmnt_name'";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        //$conn->close();
        $question_id= $conn->insert_id;
        echo "question id: ", $question_id, "<br>";

        $correct_answer = $_GET['correct_input'] == 'r1' ? "y" : "n";
        $sql_answer = "INSERT INTO registration.answers (answer, correct, question_id, assessment_id)
    SELECT '${_GET['mc_1']}', '$correct_answer', $question_id, assmnt.id
    from registration.assessments assmnt where name= '$asmnt_name'";
        if ($conn->query($sql_answer) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql_answer . "<br>" . $conn->error;
        }

        $correct_answer = $_GET['correct_input'] == 'r2' ? "y" : "n";
        $sql_answer = "INSERT INTO registration.answers (answer, correct, question_id, assessment_id)
    SELECT '${_GET['mc_2']}', '$correct_answer', $question_id, assmnt.id
    from registration.assessments assmnt where name= '$asmnt_name'";
        if ($conn->query($sql_answer) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql_answer . "<br>" . $conn->error;
        }


        $correct_answer = $_GET['correct_input'] == 'r3' ? "y" : "n";
        $sql_answer = "INSERT INTO registration.answers (answer, correct, question_id, assessment_id)
    SELECT '${_GET['mc_3']}', '$correct_answer', $question_id, assmnt.id
    from registration.assessments assmnt where name= '$asmnt_name'";
        if ($conn->query($sql_answer) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql_answer . "<br>" . $conn->error;
        }

        $correct_answer = $_GET['correct_input'] == 'r4' ? "y" : "n";
        $sql_answer = "INSERT INTO registration.answers (answer, correct, question_id, assessment_id)
    SELECT '${_GET['mc_4']}', '$correct_answer', $question_id, assmnt.id
    from registration.assessments assmnt where name= '$asmnt_name'";
        if ($conn->query($sql_answer) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql_answer . "<br>" . $conn->error;
        }
    }
}
else if ($_GET['page'] == "fill")   {
    if ($_GET['question_content']) {
        //echo $_GET['question_content'];

        $sql = "INSERT INTO registration.questions (content, type, assessment_id)
    SELECT '${_GET['question_content']}','fi', assmnt.id
    from registration.assessments assmnt where name= '$asmnt_name'";
        //echo $sql;
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        //$conn->close();
        $question_id= $conn->insert_id;
        echo "question id: ", $question_id, "<br>";

        $sql_answer = "INSERT INTO registration.answers (answer, correct, question_id, assessment_id)
    SELECT '${_GET['option_blank']}','y', $question_id, assmnt.id
    from registration.assessments assmnt where name= '$asmnt_name'";
        //echo $sql_answer;
        //echo $sql;
        if ($conn->query($sql_answer) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql_answer . "<br>" . $conn->error;
        }
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
            <table class="table">
                <tbody>
                <tr>
                    <td>
                        <form action="mc_q.php">
                            <input type="submit" value="Multiple Choice" name="submit_mc" class="btn btn-primary">
                            <input type="hidden" name="assessment_name" value= "<?php echo $_GET['assessment_name'] ?>" >
                        </form>
                    </td>
                    <td>
                        <form action="fill_in.php">
                            <input type="submit" value="Fill in the blank" name="submit_fill_in" class="btn btn-primary">
                            <input type="hidden" name="assessment_name" value= "<?php echo $_GET['assessment_name'] ?>" >
                        </form>
                    </td>
                </tr>
                <tr>
                    <td colspan=2 align="center">
                        <form action="allreports.php">
                            <input type="submit" value="Done" name="submit_done" class="btn btn-primary">
                        </form>
                    </td>

                </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-9">
            <?php
            $query = "select module_name from registration.modules where id = ".$_GET['module'].";";
            if ($result = $conn->query($query)) {
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
                <li><a href="home.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                <li><a href="assessments.php">Assessments</a></li>
                <li class="active"><?php echo $_GET['assessment_name'] ?></li>
            </ol>
        </div>
        <div class="col-md-6">
            <form action="test_result.php">
            <?php
                $assessment_id = 0;
            $i=0;
            $query = "select a.name, q.content, q.type, q.assessment_id, q.id  from registration.questions
                    q join registration.assessments a on a.id = q.assessment_id where a.name ='$asmnt_name'";
            if ($result = $conn->query($query)) {
                /* fetch associative array */
                while ($row = $result->fetch_assoc()) {
                    $i++;
                    ?>
                    <div class="form-group">
                    <label for="num"><?=$i?>.</label>
                    <label for="question"><?=$row['content']?></label>
                    <?php
                    // checking what type of questions mc or fill_in
                    $answer_query = "select id, answer, correct from registration.answers where question_id=$row[id]";
                    if ($answer_result = $conn->query($answer_query)) {
                        /* fetch associative array */
                        while ($answer_row = $answer_result->fetch_assoc()) {
                            if ($row['type'] == "mc") {?>
                                <div class="radio">
                                    <label><input type="radio" name="question_<?=$row['id']?>"
                                        <?=$answer_row['correct']=='y'?"checked=\"true\"":"" ?> value="<?=$answer_row['answer']?>">
                                        <?=$answer_row['answer']?>
                                    </label>
                                </div>
                            <?php }
                            else if ($row['type'] == "fi"){?>
                                <input type="text" name="question_<?=$row['id']?>" class="form-control" id="q1">
                            <?php }
                        }
                    }
                    $answer_result->free();?>
                    </div>

                <?php
                    $assessment_id = $row['assessment_id'];
                }
                /* free result set */
                $result->free();
            }
            ?>
            <input type="submit" value="Submit Test" name="submit_test" class="btn btn-primary">
            <input type="hidden" name="assessment_name" value= "<?php echo $_GET['assessment_name'] ?>" >
            <input type="hidden" name="assessment_id" value= "<?php echo $assessment_id ?>" >

            </form>
        </div>
    </div>
<?php require_once('include/footer.php'); ?>