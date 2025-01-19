<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userregistrationdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // SQL query to check if user exists
  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // User exists, redirect to dashboard or any other page
    header("Location: homepage.html");
    exit();
  } else {
    // User doesn't exist or credentials are incorrect
    echo "Invalid email or password";
  }
}

$conn->close();
?>
