<?php
include "db_conn.php";
$id = $_GET['id'];

if(isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "UPDATE `newcrud` SET `first_name`='$first_name',`last_name`='$last_name',
    `email`='$email',`gender`='$gender' WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if($result) {
        //echo "successfull";
       header("Location: index.php?msg=Data Updated successfully");
    }
    else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:#00ff5573;">
    PHP Complete CRUD Application
  </nav>  

  <div class="conatiner">
    <div class="text-center mb-4">
        <h3>Edit User Information</h3>
        <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php 
    
    $sql = "SELECT * FROM `newcrud` WHERE id=$id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    
    <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width:50vh; min-width:300px;">
            <div class="row">
                <div class="col">
                    <label class="form-label">First Name:</label>
                    <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name']?>">
                </div>

                <div class="col">
                    <label class="form-label">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name'] ?>">
                </div>
            </div>

            <div class="mb-3">
                   <label class="form-label">Email:</label>
                   <input type="email" class="form-control" name="email" value="<?php echo $row['email']?>">
            </div>

            <div class="form-group-mb-3">
                <label>Gender</label>&nbsp;
                <input type="radio" class="form-check-input" name="gender" id="male" value="male" <?php echo($row['gender']=='male')?"checked":"";?>>
                <label for="male" class="form-input-label">Male</label>
                &nbsp;
                <input type="radio" class="form-check-input" name="gender" id="female" value="female" <?php echo($row['gender']=='female')?"checked":"";?>>
                <label for="female" class="form-input-label">Female</label>
            </div>
                
            <div>
                <button type="submit" class="btn btn-success" name="submit">UPDATE</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>

        </form>
    </div>
  </div>

























<!--bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
