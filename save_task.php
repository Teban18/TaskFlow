<?php

include("db.php");

if  (isset($_POST['save_task'])){
      $title = $_POST['title'];
      $description = $_POST['description'];

      if ($title!=null && $description!=null ){

        $query = "INSERT INTO task (title,description) VALUES ('$title','$description')";
        $result = mysqli_query($conn, $query);
        if (!$result){
          die("Query Failed");

        }
        $_SESSION['message'] = 'Task Saved Succesfully';
        $_SESSION['message_type'] = 'success';
      }else{
        $_SESSION['message'] = 'Campos vacios';
        $_SESSION['message_type'] = 'danger';
      }

      

      header("location: index.php");
}

 ?>
