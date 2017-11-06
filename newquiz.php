<?php require_once('include/top.php');
  if (!isset($_SESSION['username'])) {
      header('Location: login.php');
  }
  elseif (isset($_SESSION['username']) && $_SESSION['role'] =='student'){
    header('Location: home.php');
   }
 ?>
<?php require_once('include/config.php'); ?>
<?php require_once('server.php'); ?>
<?php include_once('dao/quizDao.php');?>

<?php
$asmnt_name = $_GET['assessment_name'];
$quizDao = new quizDao($db);
function equalsIgnoreCase ( $s1, $s2) {
    return !strcasecmp ( $s1, $s2);
}
if ($_POST['page'] == "upload_file") {

}
else if ($_GET['page'] == "create_assessment") {
    $quizDao->createAssessment($asmnt_name, $_GET['module'], '1' );
}
else if ($_GET['page'] == "mc") {
    if ($_GET['question_content']) {
        /*
            $quizDao->createMultiChoice('Assessment1', 'Test question 1', 40, 'r2',
                array("Answer 1", "Answer 2", "Answer 3",  "Answer 4")
            );
         */
        $quizDao->createMultiChoice($asmnt_name, $_GET['question_content'], $_GET['points'], $_GET['correct_input'],
            array($_GET['mc_1'], $_GET['mc_2'], $_GET['mc_3'], $_GET['mc_4'])
        );
    }
} else if ($_GET['page'] == "fill") {
    if ($_GET['question_content']) {

        //$quizDao->createFillIn('Assessment1', 'Test question fill in', 25, 'fill in'); /
        $quizDao->createFillIn($asmnt_name, $_GET['question_content'], $_GET['points'], $_GET['option_blank']);
    }
}

if ($_POST['page'] == "upload_file") {
    $file = $_FILES['fileToUpload']['tmp_name'];

    echo " file = $file \n";
    if (($handle = fopen($file, "r")) !== FALSE) {

        $all_answers = array();
        $curr_mc_question = "";

        $row = 1;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            /*
             * csv upload template:
             * question type points answer correct
             */
            list ($question, $type, $points, $answer, $correct) = $data;

            if ( $row++ == 1 && !strcasecmp($question, "question")){
                //skip header row
                echo "<h5>skipping the first row </h5>\n";
                continue;
            }

            if (!strcasecmp($type, "fi")){
                echo "<h5>row : $row createFillIn($asmnt_name, $question, $points, $answer)</h5>";
                $quizDao->createFillIn($asmnt_name, $question, $points, $answer);
            }


            if (equalsIgnoreCase($type, "mc")) {
                //for multiple choice questions we need to collect all 4 answers before calling createMultiChoice()

                if (!equalsIgnoreCase($curr_mc_question, $question)) { //clear all temp vars for a new question
                    $all_answers = array();
                    $curr_mc_question = $question;
                    $correct_mc_answer = "";
                    $mc_points = "";
                }
                array_push($all_answers, $answer); //save answer

                if (equalsIgnoreCase($correct, "y")){
                    $correct_mc_answer = "r" . count($all_answers);
                    $mc_points = $points;
                }

                if (count($all_answers) == 4 ) {
                    $quizDao->createMultiChoice($asmnt_name, $question, $mc_points, $correct_mc_answer, $all_answers);
                    $all_answers = array();
                }
            }
        }
        fclose($handle);
    } else {
        echo "Error: no file handle for upload file\n";
    }
}

?>
    <script lang="javascript">
        function bs_input_file() {
            $(".input-file").before(
                function () {
                    if (!$(this).prev().hasClass('input-ghost')) {
                        var element = $("<input type='file' accept='.csv' class='input-ghost' style='visibility:hidden; height:0'>");
                        element.attr("name", $(this).attr("name"));
                        element.change(function () {
                            element.next(element).find('input').val((element.val()).split('\\').pop());
                            $("#submit_file").removeAttr("disabled");
                        });
                        $(this).find("button.btn-choose").click(function () {
                            element.click();
                        });
                        $(this).find("button.btn-reset").click(function () {
                            element.val(null);
                            $(this).parents(".input-file").find('input').val('');
                            $("#submit_file").attr("disabled", "disabled");
                        });
                        $(this).find('input').css("cursor", "pointer");
                        $(this).find('input').mousedown(function () {
                            $(this).parents('.input-file').prev().click();
                            return false;
                        });
                        return element;
                    }
                }
            );
        }
        $(function () {
            bs_input_file();
        });
    </script>
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
                              <input type="submit" value="Go to all reports" name="submit_done" class="btn btn-primary">
                          </form>
                      </td>

                  </tr>
                  <tr>
                      <td colspan=2 align="center">
                          <form method="POST" action="" enctype="multipart/form-data">
                              <div class="form-group">
                                  <div class="input-group input-file" name="fileToUpload">
                                    <span class="input-group-btn">
                                       <button class="btn btn-default btn-choose" type="button">Choose</button>
                                    </span>
                                    <input type="text" class="form-control" placeholder='Choose a file...'/>
                                      <span class="input-group-btn">
                                           <button class="btn btn-reset" type="button">Reset</button>
                                      </span>
                                  </div>
                              </div>
                              <!-- COMPONENT END -->
                              <div class="form-group">
                                  <button type="submit" id="submit_file" class="btn btn-primary" disabled>Submit</button>
                                  <input type="hidden" name="page" value="upload_file"/>
                              </div>
                          </form>
                      </td>
                  </tr>
                  </tbody>
              </table>
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
              <li><a href="home.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
              <li><a href="assessments.php">Assessments</a></li>
              <li class="active"><?php echo $_GET['assessment_name'] ?></li>
            </ol>
          </div>
            <div class="col-md-6">
                    <?php
                    $i=0;
                    $query = "select a.name, q.content, q.type, q.assessment_id, q.id  from registration.questions
                    q join registration.assessments a on a.id = q.assessment_id where a.name ='$asmnt_name'";
                    if ($result = $db->query($query)) {
                        /* fetch associative array */
                        while ($row = $result->fetch_assoc()) {
                            $i++;
                    ?>
                    <div class="form-group">
                        <label for="num"><?=$i?>.</label>
                        <label for="question"><?=$row['content']?></label>
                    <?php
                        // checking what type of questions mc or fill_in
                        $answer_query = "select answer, correct from registration.answers where question_id=$row[id]";
                            if ($answer_result = $db->query($answer_query)) {
                                /* fetch associative array */

                                while ($answer_row = $answer_result->fetch_assoc()) {

                                    if ($row['type'] == "mc") {?>
                                        <div class="radio">
                                            <label><input type="radio" name="optradio<?=$i?>" <?=$answer_row['correct']=='y'?"checked=\"true\"":"" ?> ><?=$answer_row['answer']?></label>
                                        </div>
                                    <?php }
                                    else if ($row['type'] == "fi"){?>
                                        <input type="text" class="form-control" id="q1">
                                        <label for="answer">Possible Answer(s): <?=$answer_row['answer']?></label>
                                    <?php }
                                }
                            }
                        $answer_result->free();?>
                            </div><?php
                       }
                        /* free result set */
                        $result->free();
                    }
                    ?>
        </div>
      </div>


  <?php require_once('include/footer.php'); ?>