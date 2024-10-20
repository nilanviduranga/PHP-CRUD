<?php
include 'db_conn.php';

if (isset($_POST['student_id'])) {
    $id = $_POST['student_id'];

    $sql = "DELETE FROM student WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // You can use a session flash message if needed for success notification
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    header("Location: index.php");
    exit(); // Prevent further code execution
    
}

?>