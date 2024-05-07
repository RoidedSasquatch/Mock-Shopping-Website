<?php
/*
    Dan Blais, Imed Eddine Cherabi, Prince Apau
    CST8285
    Assignment 2
    Due Apr 07, 2024
*/
/*
    cart.php
    This php file contains php and html code that will create the cart page of the website.
    This page can only be accessed once a session has been created and a user is logged in. The 
    page contains a table which will hold products that the user has added to their cart. The table
    also provides functionality to update quantities of items in the cart and to remove items in the 
    cart.
*/
?>

<?php
require __DIR__ . '/../private/cart.php';

/*
  If user not logged in set session global "current" element to this page.
  This will allow the user to be redirected back to this page after loggin in. Also
  redirects the user to the login page to login. 
*/
if (!isUserLoggedIn()) {
    $_SESSION['current'] = $_SERVER['REQUEST_URI'];
    header('Location: index.php?page=login');
}
?>

<?php view('header', ['title' => 'My Cart']) ?>

<div id="spacer"></div>
<div id="cart-container">
    <h3>My Cart</h3>
    <span id="total-price">Subtotal: &dollar;
        <?= $subtotal ?>
    </span>
    <div id="table-container">
        <form action="index.php?page=cart" method="post">
            <table id="cart-table" aria-label="Cart">
                <tr id="table-header">
                    <th class="header-item" scope="col">Image</th>
                    <th class="header-item" scope="col">Product</th>
                    <th class="header-item" scope="col">Category</th>
                    <th class="header-item" scope="col">Price</th>
                    <th class="header-item" scope="col">Quantity</th>
                    <th class="header-item" scope="col">Total</th>
                    <th class="header-item" scope="col">Action</th>
                </tr>
                <!--
                    Php if statetment which will check if the cart is empty. If empty display a "cart empty"
                    message. If not empty, a php foreach will iterate through an array of product info and create
                    html elements containing this data.
                 -->
                <?php if (empty($productsA)): ?>
                    <tr id="table-data">
                        <td id="table-empty" colspan="7" style="text-align:center;">Your cart is empty.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($productsA as $product): ?>
                        <tr class="table-data">
                            <td class="data-item">
                                <img src="web/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="cart-image">
                            </td>
                            <td class="data-item">
                                <?= $product['name'] ?>
                            </td>
                            <td class="data-item">
                                <?php if($product['category'] == 1) echo 'Beverage' ?>
                                <?php if($product['category'] == 2) echo 'Clothing' ?>
                                <?php if($product['category'] == 3) echo 'Electronics' ?>
                                <?php if($product['category'] == 4) echo 'Food' ?>
                                <?php if($product['category'] == 5) echo 'Gaming' ?>
                            </td>
                            <td class="data-item">&dollar;
                                <?= $product['price'] ?>
                            </td>
                            <td class="data-item">
                                <input type="number" id="quantity" name="quantity-<?= $product['product_id'] ?>"
                                    value="<?= $products_in_cart[$product['product_id']] ?>" min="1"
                                    max="<?= $product['quantity'] ?>" placeholder="Quantity" required>
                            </td>
                            <td class="price">&dollar;
                                <?= $product['price'] * $products_in_cart[$product['product_id']] ?>
                            </td>
                            <td class="data-item">
                                <div class="action-div">
                                    <button type="button" class="delete-button"
                                        onclick="window.location.href = 'index.php?page=cart&remove=<?= $product['product_id'] ?>'">Remove</button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
            <div id="cart-button-container">
                <button type="submit" class="add-products-button" name="update">Update Cart</button>
            </div>
        </form>
    </div>
</div>

<?php view('footer') ?>