<?php
session_start();

// Step 1: Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "BALMEYONG_Cafe";  // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Create the orders table if it doesn't exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS orders (
        id INT AUTO_INCREMENT PRIMARY KEY,
        orderId INT NOT NULL,
        item_id INT NOT NULL,
        name VARCHAR(255) NOT NULL,
        PerItemPrice DECIMAL(10, 2) NOT NULL,
        NuofItems INT NOT NULL,
        OrderAmount DECIMAL(10, 2) NOT NULL,
        CreatedDateTime DATETIME DEFAULT CURRENT_TIMESTAMP,
        IsDeleted BOOLEAN DEFAULT 0
    );
";

if ($conn->query($createTableQuery) !== TRUE) {
    die("Error creating table: " . $conn->error);
}

// Step 3: Handle Place Order Action
if (isset($_POST['place_order'])) {
    // Generate a unique order ID (based on current timestamp or you can use UUID)
    $orderId = time();

    // Step 4: Insert the cart items into the database
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $cartItemId => $cartItem) {
            // Prepare the SQL statement to insert the cart item into the orders table
            $stmt = $conn->prepare("INSERT INTO orders (orderId, item_id, name, PerItemPrice, NuofItems, OrderAmount) VALUES (?, ?, ?, ?, ?, ?)");
            if ($stmt === false) {
                die("Error preparing statement: " . $conn->error);
            }

            // Bind the parameters to the SQL statement
            $stmt->bind_param("iissii", $orderId, $cartItemId, $cartItem['name'], $cartItem['price'], $cartItem['quantity'], $cartItem['total']);

            // Execute the query and check for errors
            if (!$stmt->execute()) {
                die("Error executing statement: " . $stmt->error);
            }
        }
    } else {
        die("Cart is empty or not set.");
    }

    // Step 5: Clear the cart after placing the order
    unset($_SESSION['cart']);

    // Step 6: Set a session variable for an order success message
    $_SESSION['order_message'] = "Order has been placed successfully!";

    // Step 7: Redirect to the cart page (or you could redirect to an order confirmation page)
    header('Location: addToCart.php'); // Redirect to cart.php (or another page for order confirmation)
    exit();
} else {
    // If no place_order action was triggered, redirect back to the cart page
    header('Location: index.php');
    exit();
}
?>
