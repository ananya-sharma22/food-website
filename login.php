<?php 
// Database connection details
$servername = "localhost";  // Database host
$username = "root";         // Database username
$password = "";             // Database password (for localhost it's usually empty)
$dbname = "login_form";     // Database name

// Create a connection (with the database selected)
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Create the database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS login_form";
if ($conn->query($sql) === TRUE) {
    // Database created successfully or already exists
} else {
    echo "Error creating database: " . $conn->error;
}

// Step 3: Select the database (this is not needed anymore since we did it in the connection above)
// $conn->select_db($dbname); // No need to call this anymore

// Step 4: Create the table if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS login_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    passkey VARCHAR(255) NOT NULL
)";
if ($conn->query($table_sql) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Step 1: Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and collect the form data
    $user_input = $_POST['username'];
    $passkey_input = $_POST['passkey'];
    
    // Step 2: Prepare the SQL query to fetch the stored credentials
    $sql = "SELECT * FROM login_table WHERE username = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Error preparing the statement: " . $conn->error);
    }
    
    // Bind the input parameters
    if (!$stmt->bind_param("s", $user_input)) {
        die("Error binding parameters: " . $stmt->error);
    }

    // Execute the query
    if (!$stmt->execute()) {
        die("Error executing the query: " . $stmt->error);
    }
    
    // Get the result
    $result = $stmt->get_result();
    
    // Check if user exists
    if ($result->num_rows > 0) {
        // Fetch the row
        $row = $result->fetch_assoc();
        
        // Verify the passkey (assuming plain text, but use hashing in production!)
        if (password_verify($passkey_input, $row['passkey'])) {  // Use password_verify for hashed passkeys
            echo "Login successful!";
            // Redirect to the dashboard or another page if successful
            // header("Location: dashboard.php");
            exit();
        } else {
            echo "Incorrect passkey.";
        }
    } else {
        echo "No user found with that username.";
    }
    
    // Close the prepared statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>