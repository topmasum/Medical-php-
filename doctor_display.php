<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "doctor_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch doctor data from database
$sql = "SELECT * FROM doctors";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors Information</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1 class="page-title">Our Doctors</h1>
    <div class="doctor-cards-container">
        <?php if ($result->num_rows > 0) { 
            while ($row = $result->fetch_assoc()) { ?>
            <div class="doctor-card">
                <div class="doctor-image-container">
                    <img src="uploads/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" class="doctor-image">
                </div>
                <div class="doctor-info">
                    <h3 class="doctor-name"><?php echo $row['name']; ?></h3>
                    <p><strong>Degree:</strong> <?php echo $row['degree']; ?></p>
                    <p><strong>Medical:</strong> <?php echo $row['medical']; ?></p>
                    <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                    <p><strong>Category:</strong> <?php echo $row['category']; ?></p>
                    <p><strong>Visiting Days:</strong> <?php echo $row['visiting_days']; ?></p>
                    <p><strong>Visiting Time:</strong> <?php echo $row['visiting_time']; ?></p>
                </div>
            </div>
        <?php } } else { ?>
            <p class="no-doctors">No doctors found!</p>
        <?php } ?>
    </div>

    <?php $conn->close(); ?>
</body>
</html>

