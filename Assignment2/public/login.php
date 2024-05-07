<?php
/*
    Dan Blais, Imed Eddine Cherabi, Prince Apau
    CST8285
    Assignment 2
    Due Apr 07, 2024
*/
/*
    login.php
    This php file contains php and html code that will create the login page of the website.
    This page can be accessed regardless of whether a user is logged in contains a form that allows
    users to login. This is done by checking if the post global variable data matches an email and password in the
    database. If a user is ogged in, a session is set. A button is also included which will redirect the
    user to the registration page if they do not have an account.
*/
?>

<?php
require __DIR__ . '/../private/login.php';
?>

<?php view('header', ['title' => 'Login']) ?>

<div id="spacer"></div>
<div id="login-container">
    <h2 id="login-header">Login to WebProgramazon</h2>
    <form action="index.php?page=login" method="post" id="login-form">
        <label name="email-label" for="email-field" id="email-label">Email:</label>
        <input type="email" name="email" id="emailfield" placeholder="User Email">
        <label name="pass-label" for="pass-field" id="pass-label">Password:</label>
        <input type="password" name="password" id="passfield" placeholder="Password">
        <!--
            Php if that will check if the "message" key of the session global has a value.
            If true this vaue will be displayed, resulting in an Invalid Username/Password message.
            A generic message is used for security purposes. 
         -->
        <?php if (isset($_SESSION['message'])): ?>
            <div class="login-error">
                <?= $error ?>
            </div>
        <?php endif ?>
        <button type="submit" id="login-button">Login</button>
    </form>
    <div id="login-divider"></div>
    <span id="no-account-dialogue">Don't have an account? Why not create one?</span>
    <button type="button" id="create-account-button" onclick="window.location.href = 'index.php?page=register'">Create
        Account</button>
</div>

<?php view('footer') ?>

<?php
unset($_SESSION["message"]);
?>