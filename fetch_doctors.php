<?php
// fetch_doctors.php
include 'doctor_database';  // Include your database connection file

// Query to get all doctors from the database
$sql = "SELECT Name, Degree, Medical, Email, Category, Visiting_Days, Visiting_Time, Image FROM doctors";
$result = mysqli_query($conn, $sql);

// Initialize an array to store doctor data
$doctors = [];

// Fetch data from the database and store it in the array
while ($row = mysqli_fetch_assoc($result)) {
    $doctors[] = $row;
}

// Close the database connection
mysqli_close($conn);

// Return the doctor data as JSON
echo json_encode($doctors);
?>
