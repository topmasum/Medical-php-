<?php
// Start PHP session
session_start();

// Include the database connection file
include 'database.php';

// Check if the form was submitted
if (isset($_POST['doctorType'], $_POST['doctorName'], $_POST['appointmentDate'], $_POST['appointmentTime'])) {
    // Sanitize form data
    $doctorType = mysqli_real_escape_string($conn, $_POST['doctorType']);
    $doctorName = mysqli_real_escape_string($conn, $_POST['doctorName']);
    $appointmentDate = mysqli_real_escape_string($conn, $_POST['appointmentDate']);
    $appointmentTime = mysqli_real_escape_string($conn, $_POST['appointmentTime']);

    // Check if the user is logged in
    if (isset($_SESSION['name'])) {
        $user_name = $_SESSION['name'];

        // Retrieve user ID based on the name
        $sql = "SELECT id FROM appoint WHERE name = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt === false) {
            die('<div class="container"><p>Error preparing SQL: ' . mysqli_error($conn) . '</p></div>');
        }

        mysqli_stmt_bind_param($stmt, "s", $user_name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $userid = $row['id'];

            // Construct SQL query to insert the request
            $sql_insert = "INSERT INTO request (doctortype, doctor_name, appointment_date, appointment_time, userid) VALUES (?, ?, ?, ?, ?)";
            $stmt_insert = mysqli_prepare($conn, $sql_insert);
            if ($stmt_insert === false) {
                die('<div class="container"><p>Error preparing SQL: ' . mysqli_error($conn) . '</p></div>');
            }

            mysqli_stmt_bind_param($stmt_insert, "ssssi", $doctorType, $doctorName, $appointmentDate, $appointmentTime, $userid);

            // Execute SQL query
            if (mysqli_stmt_execute($stmt_insert)) {
                // Redirect to a confirmation page
                header("Location: dashboard.php");
                exit();
            } else {
                // Error inserting data
                echo '<div class="container"><p>Error: ' . mysqli_error($conn) . '</p></div>';
            }

            mysqli_stmt_close($stmt_insert);
        } else {
            echo '<div class="container"><p>User not found.</p></div>';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo '<div class="container"><p>User not logged in.</p></div>';
    }
} else {
    // Form not submitted
    echo '<div class="container"><p>Form not submitted.</p></div>';
}

// Close database connection
mysqli_close($conn);
?>
