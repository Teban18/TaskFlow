<?php

include("db.php");

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "SELECT * FROM task WHERE id= $id";
  $result = mysqli_query($conn, $query);

  if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_array($result);
    $title = $row['title'];
    $description = $row['description'];
  }
}

if(isset($_POST['Update'])){
  $id = $_GET['id'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $query = "UPDATE task set title= '$title', description= '$description' WHERE id= '$id'";
  mysqli_query($conn, $query);
  $_SESSION[message]='Task Updated Succesfully';
  $_SESSION[message_type]='info';
  header("location: index.php");
}

 ?>

 <?php include("Includes/header.php"); ?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="edit_task.php?id=<?php echo $_GET['id']; ?>" method="POST">
          <div class="form-group">
            <input type="text" name="title" value="<?php echo $title; ?>"
            class = "form-control" placeholder = "Update Title">
          </div>
          <div class="form-group">
            <textarea name="description" rows="2" class="form-control" placeholder="Update Description"><?php echo $description; ?></textarea>
          </div>
          <button class="btn btn-success" name="Update">
            Update
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

