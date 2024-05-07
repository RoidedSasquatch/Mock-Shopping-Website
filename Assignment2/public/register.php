<?php
/*
    Dan Blais, Imed Eddine Cherabi, Prince Apau
    CST8285
    Assignment 2
    Due Apr 07, 2024
*/
/*
    register.php
    This php file contains php and html code that will create the register page of the website.
    This page can be accessed if a user is not logged in. The page contains a form that will allow
    the user to create an account. This is done through a sql insert query which will insert
    the inputs into the webprogramazon database. Javascript validation functions are also used
    to ensure that valid inputs are provided. 
*/
?>

<?php
require __DIR__ . '/../private/register.php';
?>

<?php view('header', ['title' => 'Register']) ?>

<div id="spacer"></div>
<div id="create-account-container">
    <h2 id="create-account-header">Create Account</h2>
    <form action="index.php?page=register" method="post" id="create-account-form"
        onsubmit="return validateRegistration()">
        <div id="namefielddiv">
            <label name="name-label" for="namefield" id="name-label">Full Name:</label>
            <input type="text" name="fullName" id="namefield" placeholder="Full Name">
        </div>
        <div id="emailfielddiv">
            <label name="email-label" for="emailfield" id="email-label">Email:</label>
            <input type="email" name="email" id="emailfield" placeholder="User Email">
        </div>
        <div id="passfielddiv">
            <label name="pass-label" for="passfield" id="pass-label">Password:</label>
            <input type="password" name="password" id="passfield" placeholder="Password">
        </div>
        <div id="pass2fielddiv">
            <label name="pass2-label" for="pass2field" id="pass2-label">Confirm Password:</label>
            <input type="password" name="password2" id="pass2field" placeholder="Confirm Password">
        </div>
        <div id="addressfielddiv">
            <label name="address-label" for="addressfield" id="address-label">Address:</label>
            <input type="text" name="address" id="addressfield" placeholder="Street Address">
        </div>
        <div id="cityfielddiv">
            <label name="city-label" for="cityfield" id="city-label">City:</label>
            <input type="text" name="city" id="cityfield" placeholder="City">
        </div>
        <label name="province-label" for="provincefield" id="province-label">Province:</label>
        <select name="province" id="provincefield">
            <option value="Alberta">Alberta</option>
            <option value="British Columbia">British Columbia</option>
            <option value="Manitoba">Manitoba</option>
            <option value="New Brunswick">New Brunswick</option>
            <option value="Newfoundland">Newfoundland</option>
            <option value="Northwest Territories">Northwest Territories</option>
            <option value="Nova Scotia">Nova Scotia</option>
            <option value="Nunavut">Nunavut</option>
            <option value="Ontario">Ontario</option>
            <option value="Prince Edward Island">Prince Edward Island</option>
            <option value="Quebec">Quebec</option>
            <option value="Saskatchewan">Saskathewan</option>
            <option value="Yukon Territories">Yukon Territories</option>
        </select>
        <div id="postalfielddiv">
            <label name="postal-label" for="postalfield" id="postal-label">Postal Code:</label>
            <input type="text" name="postalCode" id="postalfield" placeholder="Postal Code">
        </div>
        <div id="terms">
            <input type="checkbox" name="terms" id="termsfield">
            <label for="termsfield">I agree to the terms and conditions</label>
        </div>
        <div id="login-divider"></div>
        <button type="submit" id="create-button">Create My Account</button>
    </form>
</div>

<?php view('footer') ?>