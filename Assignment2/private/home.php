<?php
/*
    Dan Blais, Imed Eddine Cherabi, Prince Apau
    CST8285
    Assignment 2
    Due Apr 07, 2024
*/
/*
    private/home.php
    This php file contains php code that will query product data from the webprogramazon database.
    This query is used to populate html elements in public/home.php with the 9 most recently added
    products in the webprogramazon database, sorted in descending order.
*/
?>

<?php
//Get 9 most recently added products
$sql = 'SELECT * FROM products ORDER BY created DESC LIMIT 9';
$stmt = connectDB()->prepare($sql);
$stmt->execute();
//Return result as array
$recentlyAddedProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);