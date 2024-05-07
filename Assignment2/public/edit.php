<?php
/*
    Dan Blais, Imed Eddine Cherabi, Prince Apau
    CST8285
    Assignment 2
    Due Apr 07, 2024
*/
/*
    edit.php
    This php file contains php and html code that will create the edit page of the website.
    This page can only be accessed if a session is created and the user is logged in. The page 
    contains a form that will allow a user to edit their account details, as well as an account nav
    which links to the other account pages.
*/
?>

<?php
require __DIR__ . '/../private/edit.php';
?>

<?php view('header', ['title' => 'Edit Account']) ?>

<div id="spacer"></div>
<div id="account-container">
    <div id="account-nav">
        <a href="index.php?page=account" class="account-nav-item">My Account</a>
        <a href="index.php?page=edit" class="account-nav-item">Edit Account</a>
        <a href="index.php?page=logout" class="account-nav-item">Logout</a>
    </div>
    <div id="account-details-container">
        <h2 id="create-account-header">Edit Account</h2>
        <form action="index.php?page=edit" method="post" id="create-account-form"
            onsubmit="return validateEdit();">
            <div id="namefielddiv">
                <label name="name-label" for="namefield" id="name-label">Full Name:</label>
                <input type="text" name="fullName" id="namefield" value="<?= $loggedUser['full_name'] ?>">
            </div>
            <div id="emailfielddiv">
                <label name="email-label" for="emailfield" id="email-label">Email:</label>
                <input type="email" name="email" id="emailfield" value="<?= $loggedUser['email'] ?>">
            </div>
            <div id="addressfielddiv">
                <label name="address-label" for="addressfield" id="address-label">Address:</label>
                <input type="text" name="address" id="addressfield" value="<?= $loggedUser['address'] ?>">
            </div>
            <div id="cityfielddiv">
                <label name="city-label" for="cityfield" id="city-label">City:</label>
                <input type="text" name="city" id="cityfield" value="<?= $loggedUser['city'] ?>">
            </div>
            <label name="province-label" for="provincefield" id="province-label">Province:</label>
            <!--
                Store province in variable so that the appropriate select option can be pre-selected when the page
                is loaded. Based on results of query to database. PHP Ifs in select statements set selected attribute
                to selected if the option variable equals the value of the option.
             -->
            <?php $option = $loggedUser['province']; ?>
            <select name="province" id="provincefield" value="<?= $loggedUser['province'] ?>" selected>
                <option value="Alberta" <?php if($option == "Alberta") echo 'selected = "selected"'; ?>>Alberta</option>
                <option value="British Columbia" <?php if($option == "British Columbia") echo 'selected = "selected"'; ?>>British Columbia</option>
                <option value="Manitoba" <?php if($option == "Manitoba") echo 'selected = "selected"'; ?>>Manitoba</option>
                <option value="New Brunswick" <?php if($option == "New Brunswick") echo 'selected = "selected"'; ?>>New Brunswick</option>
                <option value="Newfoundland" <?php if($option == "Newfoundland") echo 'selected = "selected"'; ?>>Newfoundland</option>
                <option value="Northwest Territories" <?php if($option == "Northwest Territories") echo 'selected = "selected"'; ?>>Northwest Territories</option>
                <option value="Nova Scotia" <?php if($option == "Nova Scotia") echo 'selected = "selected"'; ?>>Nova Scotia</option>
                <option value="Nunavut" <?php if($option == "Nunavut") echo 'selected = "selected"'; ?>>Nunavut</option>
                <option value="Ontario"<?php if($option == "Ontario") echo 'selected = "selected"'; ?>>Ontario</option>
                <option value="Prince Edward Island" <?php if($option == "Prince Edward Island") echo 'selected = "selected"'; ?>>Prince Edward Island</option>
                <option value="Quebec" <?php if($option == "Quebec") echo 'selected = "selected"'; ?>>Quebec</option>
                <option value="Saskatchewan" <?php if($option == "Saskatchewan") echo 'selected = "selected"'; ?>>Saskathewan</option>
                <option value="Yukon Territories" <?php if($option == "Yukon Territories") echo 'selected = "selected"'; ?>>Yukon Territories</option>
            </select>
            <div id="postalfielddiv">
                <label name="postal-label" for="postalfield" id="postal-label">Postal Code:</label>
                <input type="text" name="postalCode" id="postalfield" value="<?= $loggedUser['postal_code'] ?>">
            </div>
            <div id="login-divider"></div>
            <button type="submit" id="create-button">Save Changes</button>
        </form>
        <a id="delete-account-link" href="index.php?page=delete" onclick="return confirmDeletion();">Delete Account</a>  
    </div>
</div>

<?php view('footer') ?>