<?php

// Check if the user has submitted their log in information
if (isset($_POST['username']) && isset($_POST['password'])) {

  // Store the username and password that the user entered
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Connect to the database
  $db = mysqli_connect('host', 'user', 'password', 'database');

  // Check if the username and password are valid
  $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = mysqli_query($db, $query);

  // If the username and password are valid, log the user in
  if (mysqli_num_rows($result) == 1) {
    // Set a session variable to indicate that the user is logged in
    $_SESSION['logged_in'] = true;

    // Redirect the user to the home page
    header('Location: index.html');
  }
  else {
    // If the log in is unsuccessful, display an error message
    echo "Sorry, your username or password is incorrect. Please try again.";
  }
}

?>