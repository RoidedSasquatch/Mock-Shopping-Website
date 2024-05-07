<?php
/*
    Dan Blais, Imed Eddine Cherabi, Prince Apau
    CST8285
    Assignment 2
    Due Apr 07, 2024
*/
/*
    account.php
    This php file contains php and html code that will create the account page of the website.
    This page can only be accessed once a session has been created and a user is logged in. The 
    page contains a nav for the different account functions and displays the user's account details.
*/
?>

<?php
require __DIR__ . '/../private/account.php';
?>

<?php view('header', ['title' => 'Account']) ?>

<div id="spacer"></div>
<div id="account-container">
    <div id="account-nav">
        <a href="index.php?page=account" class="account-nav-item">My Account</a>
        <a href="index.php?page=edit" class="account-nav-item">Edit Account</a>
        <a href="index.php?page=logout" class="account-nav-item">Logout</a>
    </div>
    <div id="account-details-container">
        <h3 id="account-header">My Account</h3>
        <span class="account-item"><b class="account-category">Name:</b>
            <?= $currentUser['full_name'] ?>
        </span>
        <span class="account-item"><b class="account-category">Email:</b>
            <?= $currentUser['email'] ?>
        </span>
        <span class="account-item"><b class="account-category">Street Address:</b>
            <?= $currentUser['address'] ?>
        </span>
        <span class="account-item"><b class="account-category">City:</b>
            <?= $currentUser['city'] ?>
        </span>
        <span class="account-item"><b class="account-category">Province:</b>
            <?= $currentUser['province'] ?>
        </span>
        <span class="account-item"><b class="account-category">Postal Code:</b>
            <?= $currentUser['postal_code'] ?>
        </span>
    </div>
</div>

<?php view('footer') ?>