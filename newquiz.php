<?php require_once('include/top.php'); ?>
<?php require_once('include/config.php'); ?>
<?php

echo "MODULE NAME GET : '", $_GET['assessment_name'], "'<BR> ";
echo "MODULE NAME GET : '", $_GET['module'], "'<BR> ";
$a =  $_GET['assessment_name'];
//$b =   $_GET['module'];
if ($_GET['assessment_name']) {
    $sql = "INSERT INTO registration.assessments (name, id_module, id_user)
    VALUES ('" . $a ."','". $_GET['module'] ."', '1')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //$conn->close();
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
              <li><a href="assessments.php">Assessments</li>
              <li class="active"><?php echo $_GET['assessment_name'] ?></li>
            </ol>
          </div>
        </div>
      </div>
  <?php require_once('include/footer.php'); ?>