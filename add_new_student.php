<?php

include 'db_conn.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];

    $sql = "INSERT INTO student (name, dob, email) VALUES ('$name', '$dob', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New student added successfully')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: index.php");
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new student</title>
    <link rel="stylesheet" href="assets/CSS/style.css">

</head>

<body>

    <?php include 'components/nav_bar.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mt-5">
                    <div class="card-header fw-bold text-center">
                        Add new student
                    </div>
                    <div class="card-body">
                        <form action="add_new_student.php" method="POST">
                            <div class="form-group">

                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control mb-2" required>

                                <label for="dob">Date of Birth</label>
                                <input type="date" name="dob" class="form-control mb-2" required>
                            </div>

                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control mb-2" required>

                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" name="submit" class="btn btn-success  ">Add student</button>
                                <button type="reset" class="btn btn-danger ms-2"> Clear Form</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/JS/sctipt.js"></script>
</body>

</html>