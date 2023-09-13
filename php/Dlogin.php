<?php
session_start();

// Initialize variables
$username = "";
$errors = array();

// Connect to the database (replace with your database configuration)
$db = mysqli_connect('localhost', 'username', 'password', 'database_name');

// Check if the "login_user" button is clicked
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // Validate form fields
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    // If there are no errors, attempt to log in
    if (count($errors) == 0) {
        // Hash the password before comparing it with the database
        $password = md5($password);
        
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
            // Login successful
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: welcome.php'); // Redirect to a welcome page
        } else {
            // Login failed
            array_push($errors, "Wrong username/password combination");
        }
    }
}

?>
