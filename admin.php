<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "doctor_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete request
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Delete image file from server
    $sqlImage = "SELECT image FROM doctors WHERE id = $delete_id";
    $resultImage = $conn->query($sqlImage);
    if ($resultImage->num_rows > 0) {
        $imageRow = $resultImage->fetch_assoc();
        $imagePath = "uploads/" . $imageRow['image'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    // Delete doctor record
    $sqlDelete = "DELETE FROM doctors WHERE id = $delete_id";
    if ($conn->query($sqlDelete) === TRUE) {
        echo "<script>alert('Doctor deleted successfully!'); window.location.href='admin.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch doctor data
$sql = "SELECT * FROM doctors";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Information</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Doctor Information</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Degree</th>
                    <th>Medical</th>
                    <th>Email</th>
                    <th>Category</th>
                    <th>Visiting Days</th>
                    <th>Visiting Time</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['degree']; ?></td>
                    <td><?php echo $row['medical']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['visiting_days']; ?></td>
                    <td><?php echo $row['visiting_time']; ?></td>
                    <td>
                        <?php if ($row['image']): ?>
                            <img src="uploads/<?php echo $row['image']; ?>" alt="Doctor Image">
                        <?php endif; ?>
                    </td>
                    <td>
                        <form action="delete_doctor.php" method="POST">
                            <input type="hidden" name="doctor_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="delete-btn">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php $conn->close(); ?>
