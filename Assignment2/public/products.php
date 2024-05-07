<?php
/*
    Dan Blais, Imed Eddine Cherabi, Prince Apau
    CST8285
    Assignment 2
    Due Apr 07, 2024
*/
/*
    products.php
    This php file contains php and html code that will create the products page of the website.
    This page can be accessed regardless of whether a user is logged in and contains a scrollable
    display of all the products available. A searchbar is also featured which allows users to search for
    products by name. Additionally, a combobox is also included which allows users to filter products
    by category. The searchbar is functionaly with the filter, that is if a filter is selected, the search
    will only search products within that category. This functionality is provided through javascript. 
    The products can be added to the users cart, and if the user is not logged in, clicking 
    the add to cart button will redirect them to the login page. Upon a successful login, the 
    product is added to the users cart. 
*/
?>

<?php
require __DIR__ . '/../private/products.php';
require __DIR__ . '/../private/cart.php';
?>

<?php view('header', ['title' => 'Shop Products']) ?>

<div id="spacer"></div>
<div id="all-products">
    <h3 id="products-header">All Products</h3>
    <div id="search-filter">
        <input type="text" id="search-products-field" placeholder="Search for Products" onkeyup="searchProducts()">
        <label for="filter-products-field" id="filter-products-label">Filter Products: </label>
        <select name="filter-products-field" id="filter-products-field" onclick="filterProducts()">
            <option value="0">All Products</option>
            <option value="1">Beverage</option>
            <option value="2">Clothing</option>
            <option value="3">Electronics</option>
            <option value="4">Food</option>
            <option value="5">Gaming</option>
        </select>
        <span id="total-products">Showing
            <?= $allProducts ?> of
            <?= $allProducts ?> products
        </span>
    </div>
    <div id="all-products-holder">
        <!--
            Iterate through array of producs from sql query in private/products.php. Create
            HTML elements with the values of the array. 
        !-->
        <?php foreach ($products as $product): ?>
            <div class="product-container">
                <span class="product-category">
                    <?=$product['category']?>
                </span>
                <img src="web/<?= $product['image'] ?>" class="products-image" alt="<?= $product['name'] ?>">
                <h4 class="products-name">
                    <?= $product['name'] ?>
                </h4>
                <span class="products-price">&dollar;
                    <?= $product['price'] ?>
                </span>
                <form action="index.php?page=cart" method="post">
                    <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                    <button type="submit" class="add-products-button">Add To Cart</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php view('footer') ?>