<?php require_once('include/top.php'); 
  if (!isset($_SESSION['username'])) {
      header('Location: login.php');
    }
?>
<?php require_once('server.php');?>
  </head>
  <body>
    <div id="wrapper">
      <?php require_once('include/header.php'); ?>

      <?php
      if (isset($_GET['topic_id'])) {
        $topic_id = $_GET['topic_id'];
        $query = "SELECT topic_name,topic_description FROM topics WHERE id = '$topic_id' LIMIT 1";
        $run = mysqli_query($db,$query);
        if(mysqli_num_rows($run) > 0){
          $row = mysqli_fetch_array($run);
          $id = $row['id'];
          $topic_name = $row['topic_name'];
          $topic_description = $row['topic_description'];
        }
        else{
          header('Location : topics.php');
        }
      }
    ?>

      <div class="container-fluid body-section">
        <div class="row">
          <div class="col-md-3">
            <?php require_once('include/left-sidebar.php'); ?>
          </div>
          <div class="col-md-9">
            <h1><i class="fa fa-file-text-o" aria-hidden="true"></i> <?php echo $topic_name;?></h1><hr>
            <ol class="breadcrumb">
              <li><a href="home.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
              <li><a href="topics.php"><i class="fa fa-folder-open"></i> Topics</a></li>
              <li class="active"> <?php echo $topic_name;?></li>
            </ol>

            <div>
              <p class="description">
                 <?php echo $topic_description;?>
              </p>
            </div>
          </div>
        </div>
      </div>
  <?php require_once('include/footer.php'); ?>