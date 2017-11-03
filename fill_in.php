<?php require_once('include/top.php'); 
    if (!isset($_SESSION['username'])) {
      header('Location: login.php');
    }
?>
<?php require_once('include/config.php'); ?>
<?php require_once('server.php'); ?>
<?php

$asmnt_name = $_GET['assessment_name'];
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
                        <form action="newquiz.php">
                            <input type="hidden" name="page" value="fill">
                            <div class="form-group">
                                <label for="question">Question:</label>
                                <input type="text" name="question_content" placeholder="Type question here" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="option">Blank Answer(s)</label>
                                <input type="text" name="option_blank" placeholder="Type answer(s) here" class="form-control">
                                <label class="control-label col-md-12"></label>
                                <label for="points">Points:</label>
                                <input name = "points" type="text" class="form-control">
                            </div>
                            <label class="control-label col-md-12"></label>
                            <input type="submit" value="Save Question" name="submit_fill_question" class="btn btn-primary">
                            <input type="hidden" name="assessment_name" value= "<?php echo $_GET['assessment_name'] ?>" >
                        </form>
                 </div>
        </div>
    </div>
<?php require_once('include/footer.php'); ?>