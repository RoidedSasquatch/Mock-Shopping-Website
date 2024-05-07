<?php
/*
    Dan Blais, Imed Eddine Cherabi, Prince Apau
    CST8285
    Assignment 2
    Due Apr 07, 2024
*/
/*
    index.php
    This php file contains php and html code that will create the index page of the website.
    This page can be accessed regardless of whether a user is logged in and acts as an index for the site.
    This page sets up site routing so that pages are displayed when the correct variable is passed through the url
    for index.php. Example: assignment2/index.php?page=home will take users to the home page. The page
    variable keeps reference to the variable being passed through the url.
*/
?>

<?php
session_start();
include '../private/utilities.php';
include '../private/auth.php';
// Page is set to home (home.php) by default, so when the visitor visits, that will be the page they see.
$page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'home';
// Include and show the requested page
include $page . '.php';