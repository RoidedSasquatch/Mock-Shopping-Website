<?php
/*
    Dan Blais, Imed Eddine Cherabi, Prince Apau
    CST8285
    Assignment 2
    Due Apr 07, 2024
*/
/*
    private/utilities.php
    This php file contains php code that defines several utility functions for use in this website.
    It is included in the index.php file so it can be accessed by all pages. Code on this page was
    written following the referenced tutorial, code has been modified and adapted to the need of the website.

    References

    PHPTutorial. PHP Registration Form. phptutorial.net. (2023). https://www.phptutorial.net/php-tutorial/php-registration-form/
    Retrieved April 1, 2024
*/
?>

<?php
//Define database constants for connection
const DB_HOST = 'localhost';
const DB_NAME = 'webprogramazon';
const DB_USER = 'root';
const DB_PASS = '';

/*
  Function which is used to display the footer and header php files on each of the site pages.
  The array stores the titles of the pages to be displayed on the browser tab. The title is supplied
  on each page within the function call. $$key is a reference variable as denoted by the $$ syntax.
*/
function view(string $file, array $data = []): void {
    foreach ($data as $key => $value) {
        $$key = $value;
    }
    require_once __DIR__ . '/inc/' . $file . '.php';
}

/*
  This function checks if the incoming form request is a post request.
*/
function isPostRequest(): bool {
    return strtoupper($_SERVER['REQUEST_METHOD']) === 'POST';
}

/*
  This function redirects the user to a webpage using the header method.
*/
function redirectTo(string $url) : void {
    header('Location:'. $url);
    exit;
}

/*
  This function is used to establish a database connection using the database constants defined
  at the top of this php file.
*/
function connectDB(): PDO {
    static $db;

    if(!$db) {
        $db = new PDO(sprintf("mysql:host=%s;dbname=%s;charset=UTF8", DB_HOST, DB_NAME),
                    DB_USER, DB_PASS,
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
    return $db;
}
