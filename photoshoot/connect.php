<?php

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$type = $_POST['type'];

$conn = new mysqli('localhost', 'root','', 'register');

// Check the connection
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO registration( name, email, phone, date, type) VALUES (?, ?, ?, ?, ?)");
    
    // Bind the parameters
    $stmt->bind_param("ssiis", $name, $email, $phone, $date, $type);
    
    // Execute the query
    $stmt->execute();
    
    echo "Registration successful!";
    
    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>