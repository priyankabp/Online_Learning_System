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
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error;
        }
    }
}

?>