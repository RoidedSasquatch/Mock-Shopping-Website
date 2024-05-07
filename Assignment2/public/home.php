<?php
/*
    Dan Blais, Imed Eddine Cherabi, Prince Apau
    CST8285
    Assignment 2
    Due Apr 07, 2024
*/
/*
    home.php
    This php file contains php and html code that will create the home page of the website.
    This page can be accessed regardless of whether a user is logged in and contains an about paragraph
    as well as a display of the nine most recently added products. The products are fetched through
    a SQL select * query to the webprogramazon database. The user can also add these items to their 
    cart.
*/
?>

<?php
require __DIR__ . '/../private/home.php';
?>

<?php view('header', ['title' => 'Welcome to WebProgramazon']) ?>

<div id="spacer"></div>
<div id="about">
    <h3 id="about-header">About WebProgramazon</h3>
    <p id="about-paragraph">
        WebProgramazon is a service that aims to provide you with the finest shopping experience the internet
        can bring. Want to skip the lines at the store? WebProgramazon. Want to never leave your house for
        anything
        ever again? WebProgramazon! It all comes right to your door, no effort required. WebProgramazon,
        enabling
        your inner laziness.
    </p>
</div>
<div id="recent-products">
    <h3 id="recently-added-header">Recently Added</h3>
    <div id="recent-products-holder">
        <!--
            Iterate through array of producs from sql query in private/home.php. Create
            HTML elements with the values of the array. 
        !-->
        <?php foreach ($recentlyAddedProducts as $product): ?>
            <div class="recently-added-container">
                <img src="web/<?= $product['image'] ?>" class="recent-products-image" alt="<?= $product['name'] ?>">
                <h4 class="recent-products-name">
                    <?= $product['name'] ?>
                </h4>
                <span class="recent-products-price">&dollar;
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