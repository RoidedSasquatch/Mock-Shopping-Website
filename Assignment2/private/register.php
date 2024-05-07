<?php
/*
    Dan Blais, Imed Eddine Cherabi, Prince Apau
    CST8285
    Assignment 2
    Due Apr 07, 2024
*/
/*
    private/register.php
    This php file contains php code that will allow the user to create an account.
    If the user is already logged in, they will be redirected to the account page. This is checked
    through the isUserLoggedIn function. If a post request is detected, the registerUser function is
    called hich will create a new user. The user is then redirected to the login page to login.
*/
?>

<?php
if(isUserLoggedIn()) {
    redirectTo("index.php?page=account");
}
if (isPostRequest()) {
    if(registerUser($_POST['fullName'], $_POST['email'], $_POST['password'], $_POST['address'], $_POST['city'], $_POST['province'], $_POST['postalCode'])) {
        redirectTo('index.php?page=login');
    }
}