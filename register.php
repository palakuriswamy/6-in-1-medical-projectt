<?php
// Database connection
$servername = "localhost"; // Change this to your MySQL server name if needed
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "Userregistrationdb"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO Users (name, age, gender, email, password, contact_number) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sissss", $name, $age, $gender, $email, $password, $contact);

// Set parameters and execute
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = $_POST['password']; // Remember to hash the password in a real application
$contact = $_POST['contact'];

if ($stmt->execute()) {
    echo "Registration successful";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
