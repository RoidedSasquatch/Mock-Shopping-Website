<?php
/*
    Dan Blais, Imed Eddine Cherabi, Prince Apau
    CST8285
    Assignment 2
    Due Apr 07, 2024
*/
/*
    private/products.php
    This php file contains php code that will query product data from the webprogramazon database.
    This query is used to populate html elements in public/products.php with product data.
*/
?>

<?php
//Get all products
$sql = 'SELECT * FROM PRODUCTS ORDER BY created DESC';
$stmt = connectDB()->prepare($sql);
$stmt->execute();
//Return result as array
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Get total number of products to display on products page
$allProducts = connectDB()->query('SELECT * FROM products')->rowCount();

//[1]https://codeshack.io/shopping-cart-system-php-mysql/