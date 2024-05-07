<?php
/*
    Dan Blais, Imed Eddine Cherabi, Prince Apau
    CST8285
    Assignment 2
    Due Apr 07, 2024
*/
/*
    private/login.php
    This php file contains php code that will query user data from the webprogramazon database.
    This query is used to check if incoming form data submitted by the user matches a record in the 
    database. The error variable is used to output an error message if an invalid login is detected.
    Additionally code is included to check which page the user was redirected to the login page from.
    If they successfully login, they are redirected back to that page with a session set.
*/
?>

<?php
$error = "Invalid Username or Password.";

if(isUserLoggedIn()) {
    redirectTo("index.php?page=account");
}

if(isPostRequest()) {
    if(!login($_POST['email'], $_POST['password'])) {
        $_SESSION['message'] = $error;
        redirectTo('index.php?page=login');
    }

    if(isset($_SESSION['current']))
        redirectTo('index.php?page=cart');
    else
        redirectTo('index.php?page=account');

}
