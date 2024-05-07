ergs<?php
/*
    Dan Blais, Imed Eddine Cherabi, Prince Apau
    CST8285
    Assignment 2
    Due Apr 07, 2024
*/
/*
    private/auth.php
    This php file contains php code that defines several utility functions for use in this website.
    It is included in the index.php file so it can be accessed by all pages. Code on this page was
    written following the referenced tutorial, code has been modified and adapted to the need of the website.

    References

    PHPTutorial. PHP Registration Form. phptutorial.net. (2023). https://www.phptutorial.net/php-tutorial/php-registration-form/
    Retrieved April 1, 2024
*/
?>

<?php
/*
  This function allows users to register using an insert SQL query. The passed paramaters are used as the
  values to insert.
*/
function registerUser(string $fullName, string $email, string $password, string $address, string $city, string $province, string $postalCode, bool $isAdmin = false): bool {
    $sql = 'INSERT INTO users(full_name, email, password, address, city, province, postal_code, is_admin)
            VALUES(:fullName, :email, :password, :address, :city, :province, :postalCode, :isAdmin);';

    $stmt = connectDB()->prepare($sql);

    $stmt->bindValue(':fullName', $fullName, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', password_hash($password, PASSWORD_BCRYPT), PDO::PARAM_STR);
    $stmt->bindValue(':address', $address, PDO::PARAM_STR);
    $stmt->bindValue(':city', $city, PDO::PARAM_STR);
    $stmt->bindValue(':province', $province, PDO::PARAM_STR);
    $stmt->bindValue(':postalCode', $postalCode, PDO::PARAM_STR);
    $stmt->bindValue(':isAdmin', $isAdmin, PDO::PARAM_STR);

    return $stmt->execute();
}

/*
  This function is used to update user details via an update query to the database. The paramaters
  are used as the data to be update.
*/
function updateUser(string $fullName, string $email, string $address, string $city, string $province, string $postalCode): bool {
    $sql = "UPDATE users
            SET full_name = '$fullName', email = '$email', address = '$address', city = '$city', province = '$province', postal_code = '$postalCode'
            WHERE email = '".$_SESSION['email']."';";
    $stmt = connectDB()->prepare($sql);
    return $stmt->execute();
}

/*
  This function is used to delete a user
*/
function deleteUser(): bool {
  $sql = "DELETE FROM users WHERE email = '".$_SESSION['email']."';";
  $stmt = connectDB()->prepare($sql);
  if(isUserLoggedIn()) {
    unset($_SESSION['email']);
    session_destroy();
  }
  $result = $stmt->execute();
  redirectTo('index.php?page=home');
  return $result;
}

/*
  This function will query the database to find a database record that matches the email paramater's value.
  This is used to determine which user is logged in.
*/
function getUserByEmail(string $email) {
    $sql = 'SELECT email, password FROM users
            WHERE email=:email;';

    $stmt = connectDB()->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

/*
  This function will call the getUserByEmail function. If the paramaters passed into this function
  match the values of the getUserByEmail function, the session is regenerated and the user is
  logged in.
*/
function login(string $email, string $password): bool {
    $user = getUserByEmail($email);

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id();
        $_SESSION['email'] = $user['email'];
        return true;
    }
    return false;
}

/*
  This function will log the user out by first checking if they are logged in. If so, the session
  is then unset and destroyed and the user is redirected to the login page.
*/
function logout(): void {
    if(isUserLoggedIn()) {
        unset($_SESSION['email']);
        session_destroy();
        redirectTo('index.php?page=login');
    }
}

/*
  This function will check if the user is logged in by checking if the "email" element
  of the session global is set.
*/
function isUserLoggedIn(): bool {
    return isset($_SESSION['email']);
}
