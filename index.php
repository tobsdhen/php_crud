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

  <div class="container">
    <!-- Checks if a message (msg) is passed via the URL (GET method).
    Displays the message in a Bootstrap alert box, if present.-->
    <?php 
    if(isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
             '.$msg.'
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>';
    }
    ?>
    <!--A button that links to add_new.php to add a new record.-->
    <a href="add_new.php" class="btn btn-dark mb-3">Add New</a>
   
    <!--A table with headers for ID, First Name, Last Name, Email, Gender, and Action.-->
        <table class="table table-hover text-center">
        <thead class="table-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Gender</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
 
        <?php 
        //Includes the database connection file (db_conn.php).
        include "db_conn.php";
        //Executes an SQL query to fetch all records from the newcrud table.
           $sql = "SELECT * FROM `newcrud`";
           //Iterates over the result set, generating a table row for each record with columns for ID, First Name, Last Name, Email, and Gender.
           $result = mysqli_query($conn, $sql);
           while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['first_name'] ?></td>
                <td><?php echo $row['last_name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['gender'] ?></td>
                <!--Provides action buttons for editing and deleting each record, linking to edit.php and delete.php respectively with the record's ID as a URL parameter.-->
                <td>
                    <a href="edit.php?id=<?php echo $row['id'] ?>"
                     class="line-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                    <a href="delete.php?id=<?php echo $row['id'] ?>"
                     class="line-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                </td>
                </tr>
            <?php
           }
        ?>

            
        </tbody>
        </table>

  </div>
  
<!--bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
