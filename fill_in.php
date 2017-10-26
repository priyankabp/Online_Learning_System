<?php require_once('include/top.php'); ?>
<?php require_once('include/config.php'); ?>
<?php

$asmnt_name = $_GET['assessment_name'];
echo "ASSESSMENT NAME GET : '", $_GET['assessment_name'], "'<BR> ";
echo "ASSESSMENT NAME VAR : '", $asmnt_name, "'<BR> ";

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
                <h1><i class="fa fa-graduation-cap" aria-hidden="true"></i> <?php echo $asmnt_name?> <small>Fill in the blank</small></h1><hr>
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
                            </div>
                            <div class="form-group">
                                <label for="option">Blank Answer(s)</label>
                                <input type="text" name="option_blank" placeholder="Type answer(s) here" class="form-control">
                            </div>
                            <input type="submit" value="Save Question" name="submit_fill_question" class="btn btn-primary">
                            <input type="hidden" name="assessment_name" value= "<?php echo $_GET['assessment_name'] ?>" >
                        </form>
                 </div>
        </div>
    </div>
<?php require_once('include/footer.php'); ?>