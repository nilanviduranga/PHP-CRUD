<?php
include 'db_conn.php';

$name = "";
$dob = "";
$email = "";

if (isset($_POST['student_id'])) {
    $id = $_POST['student_id'];

    // Fetch student data for pre-filling the form
    $sql_get_student = "SELECT * FROM student WHERE id=$id";
    $result = $conn->query($sql_get_student);

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        $name = $student['name'];
        $dob = $student['dob'];
        $email = $student['email'];
    }
}

if (isset($_POST['submit'])) {
    // Get updated values from the form
    $id = $_POST['student_id'];  // Make sure to pass this hidden input in the form
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];

    // Update query
    $sql = "UPDATE student SET name='$name', dob='$dob', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Student details updated successfully')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: index.php");
    exit();
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit student</title>
    <link rel="stylesheet" href="assets/CSS/style.css">
</head>

<body>

    <?php include 'components/nav_bar.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mt-5">
                    <div class="card-header fw-bold text-center">
                        Edit Student
                    </div>
                    <div class="card-body">
                        <form action="edit_student.php" method="POST">
                            <!-- Hidden field to store student ID -->
                            <input type="hidden" name="student_id" value="<?php echo $id; ?>">

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control mb-2" value="<?php echo $name; ?>" required>

                                <label for="dob">Date of Birth</label>
                                <input type="date" name="dob" class="form-control mb-2" value="<?php echo $dob; ?>" required>
                            </div>

                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control mb-2" value="<?php echo $email; ?>" required>

                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" name="submit" class="btn btn-success">Update Student</button>
                                <button type="reset" class="btn btn-danger ms-2">Clear Form</button>
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