<?php
/*
    Dan Blais, Imed Eddine Cherabi, Prince Apau
    CST8285
    Assignment 2
    Due Apr 07, 2024
*/
/*
    private/account.php
    This php file contains php code that will query user data from the webprogramazon database.
    This query is used to populate html elements in public/account.php with user account data.
*/
?>

<?php
//Select all from users matching the logged in user, obtained through the Session superglobals email element.
$sql = "SELECT * FROM users WHERE email = '".$_SESSION['email']."'";
//Prepare sql statement
$stmt = connectDB()->prepare($sql);
//Execute statement
$stmt->execute();
//Store result in variable
$currentUser = $stmt->fetch(PDO::FETCH_ASSOC);