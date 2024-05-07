<?php
/*
    Dan Blais, Imed Eddine Cherabi, Prince Apau
    CST8285
    Assignment 2
    Due Apr 07, 2024
*/
/*
    private/edit.php
    This php file contains php code that will query user data from the webprogramazon database.
    This query is used to populate html elements in public/edit.php with user account data. Code
    is also included which will check if a post request has been submitted and then call the updateUser
    function to update user account info. If updateUser returns true, the user is redirected back to
    the account page.
*/
?>

<?php
//Get Logged In User
$sql = "SELECT * FROM users WHERE email = '".$_SESSION['email']."'";
//Prepare statement
$stmt = connectDB()->prepare($sql);
//Execute statement
$stmt->execute();  
//Return Result As Array
$loggedUser = $stmt->fetch(PDO::FETCH_ASSOC);

if (isPostRequest()) {
    if(updateUser($_POST['fullName'], $_POST['email'], $_POST['address'], $_POST['city'], $_POST['province'], $_POST['postalCode'])) {
        $_SESSION['email'] = $_POST['email'];
        redirectTo('index.php?page=account');
    }
}