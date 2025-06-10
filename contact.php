<?php
// Database connection parameters
$servername = "localhost";  // MySQL server (usually localhost)
$username = "root";         // MySQL username (default for XAMPP is 'root')
$password = "";             // MySQL password (default for XAMPP is an empty string)
$dbname = "BALMEYONG_Cafe";   // The name of the database

// Step 1: Create a connection to the MySQL server
$conn = new mysqli($servername, $username, $password);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Create the database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS BALMEYONG_Cafe";
if ($conn->query($sql) === TRUE) {
    // Database created successfully or already exists
} else {
    echo "Error creating database: " . $conn->error;
}

// Step 3: Select the database
$conn->select_db($dbname);

// Step 4: Create the table if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS contact_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($table_sql) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Step 5: Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'name', 'email', and 'message' keys are set in the POST data
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) { 
        // Collect the form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Prepare the SQL to insert data into the submissions table
        $insert_sql = "INSERT INTO contact_table (name, email, message) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param("sss", $name, $email, $message);

        // Execute the query
        if ($stmt->execute()) {
          echo '<script type="text/javascript">
                    alert("Thank you for your order. We will get back to you shortly!");
                    window.location.href = window.location.href; // Reload the page to clear the form
                  </script>';
            // Redirect to the same page to prevent form resubmission on refresh
            // header("Location: " . $_SERVER['PHP_SELF']);
            // exit;
        } else {
            // If there's an error inserting the data, show an alert
            echo '<script type="text/javascript">
                    alert("Error: ' . $stmt->error . '");
                  </script>';
        }

        // Close the statement
        $stmt->close();
    } else {
        // If form fields are missing, show an alert
        echo '<script type="text/javascript">
                alert("Please fill out all fields!");
              </script>';
                }
}

// Close the database connection
$conn->close();
?> 
