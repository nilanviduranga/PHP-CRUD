<?php
include 'db_conn.php';

$sql_get_students = "SELECT * FROM student";
$result = $conn->query($sql_get_students);
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
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header ">
                        <div class="row fw-bold text-center">
                            <div class="col-10">
                                Registered Students
                            </div>
                            <div class="col-2 fw-bold text-center">
                                <a href="add_new_student.php" class="btn btn-success btn-sm">Add New Student</a>
                            </div>
                        </div>

                    </div>

                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Name</th>
                                <th scope="col">DOB</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">

                            <?php

                            $index = 1;  // Initialize the index counter
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<th scope='row'>" . $index . "</th>";  // Display the index
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['dob'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>";

                                    // Edit Button
                                    echo "<form action='edit_student.php' method='POST' style='display:inline;'>";
                                    echo "<input type='hidden' name='student_id' value='" . $row['id'] . "'>";  // Pass the student ID dynamically
                                    echo "<button type='submit' class='btn p-0' title='Edit'>";
                                    echo "<i class='bi bi-pencil-fill text-black fw-bold me-2'></i>";
                                    echo "</button>";
                                    echo "</form>";

                                    // Delete Button
                                    echo "<form action='delete_student_process.php' method='POST' style='display:inline;' onsubmit='return confirm(\"Are you sure you want to delete this student?\");'>";
                                    echo "<input type='hidden' name='student_id' value='" . $row['id'] . "'>";  // Pass the student ID dynamically
                                    echo "<button type='submit' class='btn p-0' title='Delete'>";
                                    echo "<i class='bi bi-trash-fill text-black fw-bold'></i>";
                                    echo "</button>";
                                    echo "</form>";

                                    echo "</td>";
                                    echo "</tr>";

                                    $index++;  // Increment the index counter for the next row
                                }
                            } else {
                                echo "<tr><td colspan='5' class='text-center'>No registered students found</td></tr>";
                            }


                            ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>





    <script src="assets/JS/sctipt.js"></script>
</body>

</html>