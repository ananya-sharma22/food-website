<?php
session_start();

// Initialize the cart if it is not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Define items
$items = [
    ['id' => 1, 'name' => 'Cold Coffee', 'price' => 120, 'url' => 'cold coffee.webp'],
    ['id' => 2, 'name' => 'Soft Drinks', 'price' => 100, 'url' => 'soft drinks.jpg'],
    ['id' => 3, 'name' => 'Cappuccino', 'price' => 160, 'url' => 'cappuccino.webp'],
    ['id' => 4, 'name' => 'Espresso', 'price' => 150, 'url' => 'espresso.webp'],
    ['id' => 5, 'name' => 'Shakes', 'price' => 100, 'url' => 'shakes.webp'],
    ['id' => 6, 'name' => 'Latte and Americano', 'price' => 160, 'url' => 'latte.jpg'],
    ['id' => 7, 'name' => 'French Fries', 'price' => 100, 'url' => 'fries.webp'],
    ['id' => 8, 'name' => 'Peri-Peri Fries', 'price' => 130, 'url' => 'peri fries.jpg'],
    ['id' => 9, 'name' => 'Hone-chilly Cauliflower', 'price' => 150, 'url' => 'honey cauliflower.jpg'],
    ['id' => 10, 'name' => 'Hone-chilly potato', 'price' => 150, 'url' => 'honeypotato.jpg'],
    ['id' => 11, 'name' => 'Paneer Tikka', 'price' => 160, 'url' => 'paneer tikka.jpg'],
    ['id' => 12, 'name' => 'Mashroom Tikka', 'price' => 160, 'url' => 'mashroom tikka.jpg'],
    ['id' => 13, 'name' => 'Corn Cheese Pizza', 'price' => 100, 'url' => 'corn pizza.webp'],
    ['id' => 14, 'name' => 'Veggie Paradise', 'price' => 140, 'url' => 'veggie paradise.jpg'],
    ['id' => 15, 'name' => 'Loaded Farmhouse', 'price' => 160, 'url' => 'loaded farmhouse.jpg'],
    ['id' => 16, 'name' => 'Red-Sause Pasta', 'price' => 130, 'url' => 'red-sauce.jpg'],
    ['id' => 17, 'name' => 'White-Sause Pasta', 'price' => 130, 'url' => 'white-sauce.jpg'],
    ['id' => 18, 'name' => 'Spaghetti Pasta', 'price' => 150, 'url' => 'spaghetti pasta.jpg'],
    ['id' => 19, 'name' => 'Butter Naan', 'price' => 50, 'url' => 'naan.jpg'],
    ['id' => 20, 'name' => 'Tandoori Roti', 'price' => 60, 'url' => 'tandoori roti.jpg'],
    ['id' => 21, 'name' => 'Jeera Rice', 'price' => 120, 'url' => 'jeera rice.jpg'],
    ['id' => 22, 'name' => 'Fried Rice', 'price' => 150, 'url' => 'fried rice.jpg'],
    ['id' => 23, 'name' => 'Veg Biryani', 'price' => 180, 'url' => 'veg biryani.jpg'],
    ['id' => 24, 'name' => 'Schezwan Fried Rice', 'price' => 160, 'url' => 'schezwan rice.jpg'],
    ['id' => 25, 'name' => 'Butter Mushroom Masala', 'price' => 130, 'url' => 'mashroom masala.jpg'],
    ['id' => 26, 'name' => 'Paneer butter Masala', 'price' => 160, 'url' => 'paneer masala.jpg'],
    ['id' => 27, 'name' => 'Kadai Paneer', 'price' => 140, 'url' => 'kadai paneer.jpg'],
    ['id' => 28, 'name' => 'Shahi Paneer', 'price' => 150, 'url' => 'shahi paneer.webp'],
    ['id' => 29, 'name' => 'Manchurian', 'price' => 120, 'url' => 'manchurian.jpg'],
    ['id' => 30, 'name' => 'Dal Tadka', 'price' => 100, 'url' => 'dal.jpg'],
    ['id' => 25, 'name' => 'Ice-Creams', 'price' => 120, 'url' => 'ice-creams.jpg'],
    ['id' => 26, 'name' => 'Chocolate Brownie', 'price' => 150, 'url' => 'image9.png'],
    ['id' => 27, 'name' => 'Puddings', 'price' => 140, 'url' => 'pudding.jpg'],
    ['id' => 28, 'name' => 'Brownie with Ice-Cream', 'price' => 170, 'url' => 'image8.jpg'],
    ['id' => 29, 'name' => 'Pasteries', 'price' => 120, 'url' => 'pasteries.jpg'],
    ['id' => 30, 'name' => 'Custards', 'price' => 150, 'url' => 'custard.jpg']
];

// Handle order action
if (isset($_POST['order'])) {
    $itemId = $_POST['item_id'];
    $quantity = $_POST['quantity'];

    // Find the item from the list
    $item = null;
    foreach ($items as $i) {
        if ($i['id'] == $itemId) {
            $item = $i;
            break;
        }
    }

    // Add to cart (or update if already in cart)
    if ($item && $quantity > 0) {
        $totalPrice = $item['price'] * $quantity;
        if (isset($_SESSION['cart'][$itemId])) {
            $_SESSION['cart'][$itemId]['quantity'] += $quantity;
            $_SESSION['cart'][$itemId]['total'] += $totalPrice;
        } else {
            $_SESSION['cart'][$itemId] = [
                'name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $quantity,
                'total' => $totalPrice,
            ];
        }
    }
}

// Decrease item quantity
if (isset($_POST['decrease'])) {
    $itemId = $_POST['item_id'];

    // Decrease quantity in the cart if greater than 1
    if ($_SESSION['cart'][$itemId]['quantity'] > 1) {
        $_SESSION['cart'][$itemId]['quantity'] -= 1;
        $_SESSION['cart'][$itemId]['total'] -= $_SESSION['cart'][$itemId]['price'];
    } else {
        // Remove item from cart if quantity is 1
        unset($_SESSION['cart'][$itemId]);
    }
}

// Handle place order action
if (isset($_POST['place_order'])) {
    // Clear the cart after placing the order
    unset($_SESSION['cart']);

    // Set a session variable for order success message
    $_SESSION['order_message'] = "Order has been placed successfully!";

    // Redirect to the same page (with message displayed)
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

// Check if cart exists before calculating total
$totalAmount = 0;
$totalItems = 0;
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $cartItem) {
        $totalAmount += $cartItem['total'];
        $totalItems += $cartItem['quantity'];
    }
}

// Show the order placed message only if the order was just placed
$orderMessage = isset($_SESSION['order_message']) ? $_SESSION['order_message'] : '';

// Clear the order message after it has been shown
if ($orderMessage !== "") {
    unset($_SESSION['order_message']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Cart System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>

    <!-- <p class="container mb-3 text-end sticky-top bg-light" style="top: 0px;">
        <button class="btn btn-outline-danger my-3" onclick="document.location='index.php'">
            Cancel Order <i class="bi bi-x-lg mx-1"></i>
        </button>
    </p> -->
    <?php
    // Show the order placed message only once
    if ($orderMessage !== "") {
        echo "<div class='container alert alert-success alert-dismissible fade show my-4' role='alert '>$orderMessage<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div></div>";
    }
    ?>
    <div class="container p-3">
        <h4 class="mb-3">Our Items</h4>

        <div class="row justify-content-center g-5">
            <div class="col-md-5 col-lg-4 order-md-last sticky-top bg-light p-3 rounded">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Your Cart</span>
                    <span class="badge bg-primary rounded-pill"><?php echo $totalItems; ?></span>
                </h4>

                <ul class="list-group mb-3 shadow-sm">
                    <?php if (empty($_SESSION['cart'])): ?>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <span>No items in cart</span>
                        </li>
                    <?php else: ?>
                        <?php foreach ($_SESSION['cart'] as $cartItemId => $cartItem): ?>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0"><?php echo $cartItem['name']; ?></h6>
                                    <small class="text-body-secondary">Quantity: <?php echo $cartItem['quantity']; ?> <i class="bi bi-x"></i> ₹<?php echo $cartItem['price']; ?>/per item</small>
                                </div>
                                <div>
                                    <span class="text-body-secondary">₹<?php echo $cartItem['total']; ?></span>
                                    <form method="POST" class="d-inline-block">
                                        <input type="hidden" name="item_id" value="<?php echo $cartItemId; ?>">
                                        <button type="submit" name="decrease" class="btn btn-outline-danger rounded-circle btn-sm mx-2"><i class="bi bi-dash-lg"></i></button>
                                    </form>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <li class="list-group-item d-flex justify-content-between">
                        <div>
                            <h6 class="my-0">Total Amount</h6>
                            <small class="text-body-secondary">Total Items: <?php echo $totalItems; ?></small>
                        </div>
                        <strong>₹<?php echo $totalAmount; ?></strong>
                    </li>
                </ul>

                <?php if ($totalItems > 0): ?>

                    <form method="POST" action="orderHandler.php" class="mt-3">
                        <button type="submit" name="place_order" class="btn btn-success w-100">Place Order</button>
                    </form>
                <?php endif; ?>
                <button class="btn btn-outline-danger my-3 w-100" onclick="showAlert()">
                    Cancel Order <i class="bi bi-x-circle mx-1"></i>
                </button>

                <script> 
                function showAlert() {
                    // Show an alert box
                    alert("Order Cancel Successfully!");
                
                    // Redirect to index.php after OK button is pressed
                    window.location.href = "index.php"; 
                
                    // Return false to prevent form submission (we handle it with JavaScript)
                    return false;
                  }
                </script>
            </div>
            <div class="col-lg-8 col-md-7 overflow-y-auto" style="max-height:90vh;">
                <div class="row justify-content-center">
                    <?php foreach ($items as $item): ?>
                        <div class="col-md-4 col-lg-4"> <!-- Responsive design for various screen sizes -->
                            <div class="card shadow-sm rounded mb-4">
                                <img src="<?php echo $item['url']; ?>" class="card-img-top rounded-top" alt="..." height="180">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $item['name']; ?></h5>
                                    <p class="card-text text-muted">Price: ₹<?php echo $item['price']; ?></p>
                                    <form method="POST">
                                        <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                                        <div class="mb-3">
                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="number" name="quantity" id="quantity" class="form-control" min="0" max="10" value="0">
                                        </div>
                                        <button type="submit" name="order" class="btn btn-primary w-100">Order</button> <!-- Full width button -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>


        <!-- <h3 class="mt-5">Cart Summary</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($_SESSION['cart'])): ?>
                    <tr>
                        <td colspan="5">No items in cart</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($_SESSION['cart'] as $cartItemId => $cartItem): ?>
                        <tr>
                            <td><?php echo $cartItem['name']; ?></td>
                            <td><?php echo $cartItem['quantity']; ?></td>
                            <td>₹<?php echo $cartItem['price']; ?></td>
                            <td>₹<?php echo $cartItem['total']; ?></td>
                            <td>
                                <form method="POST" class="d-inline-block">
                                    <input type="hidden" name="item_id" value="<?php echo $cartItemId; ?>">
                                    <button type="submit" name="decrease" class="btn btn-warning btn-sm">Decrease</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <p><strong>Total Items: </strong><?php echo $totalItems; ?></p>
        <p><strong>Total Amount: </strong>₹<?php echo $totalAmount; ?></p>

        <?php if ($totalItems > 0): ?>
            <form method="POST">
                <button type="submit" name="place_order" class="btn btn-success mt-3">Place Order</button>
            </form>
        <?php endif; ?> -->
    </div>

</body>

</html>