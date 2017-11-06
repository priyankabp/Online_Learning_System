<?php
class quizDao
{

    private $db;

    function __construct($db) {
        $this->db = $db;
    }

    function createAssessment($assessmentName, $module, $userId) {

        $sql = "INSERT INTO registration.assessments (name, id_module, id_user)
             VALUES ('$assessmentName','$module', '$userId')";

        if ($this->db->query($sql) === TRUE) {
//            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error;
        }
    }

    /*
    * ${_GET['question_content']} -> question
    * $_GET['correct_input'] -> $correctInput  (r1, r2, r3, r4)
    * ${_GET['mc_1,2,3,4']} -> answers
     */

    function createMultiChoice($assessmentName, $question, $points, $correctInput, $answers) {

        if (empty($points)) {
            $points = 0;
        }

        $sql = "INSERT INTO registration.questions (content, type, assessment_id, points)
    SELECT '$question','mc', assmnt.id, $points
    from registration.assessments assmnt where name= '$assessmentName'";

        if ($this->db->query($sql) === TRUE) {
//            echo "New record created successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error;
        }
        $question_id = $this->db->insert_id;

        if (array_key_exists(0, $answers)) {
            $correct_answer = $correctInput == 'r1' ? "y" : "n";
            $sql_answer = "INSERT INTO registration.answers (answer, correct, question_id, assessment_id)
    SELECT '${answers[0]}', '$correct_answer', $question_id, assmnt.id
    from registration.assessments assmnt where name= '$assessmentName'";
            if ($this->db->query($sql_answer) === TRUE) {
//            echo "New record created successfully";
            } else {
                echo "Error: " . $sql_answer . "<br>" . $this->db->error;
            }
        }

        if (array_key_exists(1, $answers)) {
            $correct_answer = $correctInput == 'r2' ? "y" : "n";
            $sql_answer = "INSERT INTO registration.answers (answer, correct, question_id, assessment_id)
    SELECT '${answers[1]}', '$correct_answer', $question_id, assmnt.id
    from registration.assessments assmnt where name= '$assessmentName'";
            if ($this->db->query($sql_answer) === TRUE) {
//            echo "New record created successfully";
            } else {
                echo "Error: " . $sql_answer . "<br>" . $this->db->error;
            }
        }


        if (array_key_exists(2, $answers)) {
            $correct_answer = $correctInput == 'r3' ? "y" : "n";
            $sql_answer = "INSERT INTO registration.answers (answer, correct, question_id, assessment_id)
    SELECT '${answers[2]}', '$correct_answer', $question_id, assmnt.id
    from registration.assessments assmnt where name= '$assessmentName'";
            if ($this->db->query($sql_answer) === TRUE) {
//            echo "New record created successfully";
            } else {
                echo "Error: " . $sql_answer . "<br>" . $this->db->error;
            }
        }

        if (array_key_exists(3, $answers)) {
            $correct_answer = $correctInput == 'r4' ? "y" : "n";
            $sql_answer = "INSERT INTO registration.answers (answer, correct, question_id, assessment_id)
    SELECT '${answers[3]}', '$correct_answer', $question_id, assmnt.id
    from registration.assessments assmnt where name= '$assessmentName'";
            if ($this->db->query($sql_answer) === TRUE) {
//            echo "New record created successfully";
            } else {
                echo "Error: " . $sql_answer . "<br>" . $this->db->error;
            }
        }
    }


    // ${_GET['option_blank']} ->  $answer
    function createFillIn($assessmentName, $question, $points, $answer ) {

        if (empty($points)) {
            $points = 0;
        }

        $sql = "INSERT INTO registration.questions (content, type, assessment_id, points)
    SELECT '$question','fi', assmnt.id, $points
    from registration.assessments assmnt where name= '$assessmentName'";
        //echo $sql;
        if ($this->db->query($sql) === TRUE) {
            #echo "New record created successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error;
        }
        //$this->db->close();
        $question_id= $this->db->insert_id;
        #echo "question id: ", $question_id, "<br>";

        $sql_answer = "INSERT INTO registration.answers (answer, correct, question_id, assessment_id)
    SELECT '$answer','y', $question_id, assmnt.id
    from registration.assessments assmnt where name= '$assessmentName'";
        //echo $sql_answer;
        //echo $sql;
        if ($this->db->query($sql_answer) === TRUE) {
//            echo "New record created successfully";
        } else {
            echo "Error: " . $sql_answer . "<br>" . $this->db->error;
        }
    }
}

?>