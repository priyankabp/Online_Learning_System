<?php require_once('include/top.php'); ?>
<?php require_once('include/config.php'); ?>
<?php

$asmnt_name = $_GET['assessment_name'];
echo "ASSESSMENT NAME GET : '", $_GET['assessment_name'], "'<BR> ";
echo "ASSESSMENT NAME VAR : '", $asmnt_name, "'<BR> ";

if ($_GET['question_content']) {
    //echo $_GET['question_content'];

    $sql = "INSERT INTO registration.questions (content, type, assessment_id)
    SELECT '${_GET['question_content']}','mc', assmnt.id
    from registration.assessments assmnt where name= '$asmnt_name'";
    echo $sql;
    echo "<br>";
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
?>
    </head>
<body>
<?php print_r($_GET); ?>
<div id="wrapper">
<?php require_once('include/header.php'); ?>

    <div class="container-fluid body-section">
        <div class="row">

            <div class="col-md-3">
                <?php require_once('include/left-sidebar.php'); ?>
            </div>

            <div class="col-md-9">
                <h1><i class="fa fa-graduation-cap" aria-hidden="true"></i>  <?php echo $asmnt_name?> <small>Multiple choice</small></h1><hr>
                <ol class="breadcrumb">
                    <li><a href="home.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                    <li class="active"><i class="fa fa-folder-open"></i> Assessments</li>
                </ol>
            </div>
    <div class="col-md-8">
        <div class="row">
            <form action="">
                <div class="form-group">
                    <label for="question">Question:</label>
                    <input type="text" name="question_content" placeholder="Type question here" class="form-control">
                    <br>
                    <label for="answer">Type in possible options:</label>
                </div>
                <div class="col-lg-10">
                    <div class="input-group">
                        <span class="input-group-addon"><input value = "r1" type="radio" name="correct_input" aria-label="Radio button for following text input"></span>
                        <input name = "mc_1" type="text" class="form-control" aria-label="Text input with radio button" >
                    </div>
                    <label class="control-label col-md-12"></label>

                    <div class="input-group">
                        <span class="input-group-addon"><input value = "r2" type="radio" name="correct_input" aria-label="Radio button for following text input"></span>
                        <input name = "mc_2" type="text" class="form-control" aria-label="Text input with radio button">
                    </div>
                    <label class="control-label col-md-12"></label>

                    <div class="input-group">
                        <span class="input-group-addon"><input value = "r3" type="radio" name="correct_input" aria-label="Radio button for following text input"></span>
                        <input name = "mc_3" type="text" class="form-control" aria-label="Text input with radio button">
                    </div>
                    <label class="control-label col-md-12"></label>

                    <div class="input-group">
                        <span class="input-group-addon"><input value = "r4" type="radio" name="correct_input" aria-label="Radio button for following text input"></span>
                        <input name = "mc_4" type="text" class="form-control" aria-label="Text input with radio button">
                    </div>
                </div>
                <label class="control-label col-md-12"></label>

                <div class="col-md-8">
                <input type="submit" value="Save Question" name="submit_mc_question" class="btn btn-primary">
                <input type="hidden" name="assessment_name" value= <?php echo $_GET['assessment_name'] ?> >
                </div>
            </form>
        </div>
    </div>
    </div>

<?php require_once('include/footer.php'); ?>