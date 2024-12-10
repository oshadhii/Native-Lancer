<!DOCTYPE html>
<html>
<head>
    <title>Job Advertisement Details</title>
    <link rel="stylesheet" href="showads.css"> <!-- Add your stylesheet link here -->
</head>
<body>
    <h1>Job Advertisement Details</h1>

    <?php
    // Connect to the database
    $connection = new mysqli('localhost', 'root', '', 'native_lancer');
    if ($connection->connect_error) {
        die('Connection failed: ' . $connection->connect_error);
    }

    // Retrieve job advertisement details
    $result = $connection->query("SELECT * FROM adv");

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='advertisement'>";
            echo "<h2>" . $row['job_name'] . "</h2>";
            echo "<p>" . $row['job_description'] . "</p>";
            echo "<p>Email: " . $row['email'] . "</p>";
            echo "<p>Contact No: " . $row['contact_no'] . "</p>";
            echo "<p>Job Type: " . $row['job_type'] . "</p>";
            echo "<p>Date: " . $row['date'] . "</p>";
            echo "<p>Company: " . $row['company_name'] . "</p>";
            echo "<p>Company Email: " . $row['company_email'] . "</p>";
            echo "<p>Company Address: " . $row['company_address'] . "</p>";
            echo "<p>Company Description: " . $row['company_description'] . "</p>";

            // Add edit and delete buttons (you can link these to the appropriate edit and delete pages)
            
// Your existing code to retrieve and display advertisements here

// Modify the "Edit" and "Delete" links as follows:
echo "<a href='edit.php?id=" . $row['id'] . "'>Update</a>";
echo "<a href='delete.php?id=" . $row['id'] . "'>Delete</a>";

            echo "</div>";
        }
    } else {
        echo "No job advertisements found.";
    }

    $connection->close();
    ?>
    <br>
    <a href="createAdvNew.php"><button>Back</button></a>
</body>
</html>
