<?php
/*
    Dan Blais, Imed Eddine Cherabi, Prince Apau
    CST8285
    Assignment 2
    Due Apr 07, 2024
*/
/*
    private/cart.php
    This php file contains php code that will allow the user to add products to their cart.
    First the product is checked to see if it exists in the database. Then the cart element of
    the session gloabal (an array itself) is checked to see if it contains a product. If so, the 
    product exists in the cart so the quantity is updated, if not the product is added to the cart.
    Code is also provided to remove products from the cart and update products in the cart. This php
    code was written using the referenced tutorial and has been modified and adapted for the needs of 
    this website

    Reference
    D. Adams. Shopping cart system with PHP and MySQL. CodeShack.io. (2023) https://codeshack.io/shopping-cart-system-php-mysql/,
    accessed April 1, 2024.
*/
?>

<?php
// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['product_id']) && is_numeric($_POST['product_id'])) {
    // Set the post variables so we easily identify them, also make sure they are integer
    $product_id = (int)$_POST['product_id'];
    // Prepare the SQL statement, we basically are checking if the product exists in our databaser
    $sql = 'SELECT * FROM products WHERE product_id = ?';
    $stmt = connectDB()->prepare($sql);
    $stmt->execute([$_POST['product_id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if ($product > 0) {
        // Product exists in database, now we can create/update the session variable for the cart
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                // Product exists in cart so just update the quanity
                $_SESSION['cart'][$product_id] += 1;
            } else {
                // Product is not in cart so add it
                $_SESSION['cart'][$product_id] = 1;
            }
        } else {
            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($product_id => 1);
        }
    }
    // Prevent form resubmission...
    header('location: index.php?page=cart');
    exit;
}

// Remove product from cart, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the cart
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
}

// Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    // Loop through the post data so we can update the quantities for every product in cart
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            // Always do checks and validation
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                // Update new quantity
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    // Prevent form resubmission...
    header('location: index.php?page=cart');
    exit;
}

// Check the session variable for products in cart
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$productsA = array();
$subtotal = 0.00;
// If there are products in cart
if ($products_in_cart) {
    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $sql = 'SELECT * FROM products WHERE product_id IN (' . $array_to_question_marks . ')';
    $stmt = connectDB()->prepare($sql);
    // We only need the array keys, not the values, the keys are the id's of the products
    $stmt->execute(array_keys($products_in_cart));
    // Fetch the products from the database and return the result as an Array
    $productsA = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Calculate the subtotal
    foreach ($productsA as $product) {
        $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['product_id']];
    }
}