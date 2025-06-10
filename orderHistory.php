<?php
session_start();

// Step 1: Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "BALMEYONG_Cafe";  // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Fetch order data from the database
$query = "
    SELECT * FROM orders 
    WHERE IsDeleted = 0
    ORDER BY orderId DESC
";
$result = $conn->query($query);

// Step 3: Group the items by orderId
$orders = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $orders[$row['orderId']][] = $row;  // Group by orderId
    }
} else {
    echo "No orders found.";
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

<div class="container mt-5">
<a href="index.php" class="text-decoration-none my-3 fs-5"> <i class="bi bi-arrow-left-short"></i> Back</a>

    <h2>Order History</h2>
    <?php if (!empty($orders)): ?>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Amount</th>
                    <th scope="col">Order Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $orderId => $orderItems): ?>
                    <tr>
                        <td rowspan="<?php echo count($orderItems); ?>" class="align-middle"><?php echo $orderId; ?></td>
                        <?php
                        // Loop through each item for the same orderId
                        foreach ($orderItems as $index => $item):
                            // Display the first row of each order with its items
                            if ($index > 0) echo "<tr>";  // Start a new row for subsequent items
                        ?>
                            <td><?php echo $item['name']; ?></td>
                            <td>₹<?php echo $item['PerItemPrice']; ?></td>
                            <td><?php echo $item['NuofItems']; ?></td>
                            <td>₹<?php echo $item['OrderAmount']; ?></td>
                            <td><?php echo $item['CreatedDateTime']; ?>
                        </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No orders placed yet.</p>
    <?php endif; ?>
</div>


</body>
</html>
