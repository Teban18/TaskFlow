<?php

include("db.php");

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "SELECT * FROM task WHERE id= $id";
  $result_task = mysqli_query($conn, $query);

  if(mysqli_num_rows($result_task) == 1){
    $row = mysqli_fetch_array($result_task);
    $title = $row['title'];
    $description = $row['description'];
  }
}


if (isset($_POST['Search'])){
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $query = "SELECT * FROM task WHERE title= '$title' OR description= '$description'" ;
    $result_task = mysqli_query($conn, $query);
}

?>

<?php include("Includes/header.php"); ?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="search_task.php?id=<?php echo $_GET['id']; ?>" method="POST">
          <div class="form-group">
            <input type="text" name="title" value=""
            class = "form-control" placeholder = "Search Title">
          </div>
          <div class="form-group">
            <textarea name="description" rows="2" class="form-control" style="display: none" placeholder="Search Description"></textarea>
          </div>
          <button class="btn btn-secondary" name="Search">
            Search
          </button>
        </form>

        <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created AT</th>
                    </tr>
                </thead>
                <tbody>

                      <?php
                      while($row = mysqli_fetch_array($result_task)) { ?>
                        
                        <tr>
                            <td> <?php  echo $row['title']; ?></td>
                            <td> <?php  echo $row['description']; ?></td>
                            <td> <?php  echo $row['created_at']; ?></td>
                        </tr>

                    <?php } ?>
                </tbody>
                </table>        

      </div>
    </div>
  </div>
</div>