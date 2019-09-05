<?php

  include("db.php");

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM task WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Query Failed");
    }
    $_SESSION['message'] = 'Task Remove Succesfully';
    $_SESSION['message_type'] = 'danger';
    header("location: index.php");
  }

 ?>
