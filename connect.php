<?php
// Database connection variables
$servername = "localhost";
$username = "root";         // or your db username
$password = "";             // or your db password
$dbname = "booking_db";     // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get and sanitize form data
$firstname      = $conn->real_escape_string($_POST['firstname']);
$lastname       = $conn->real_escape_string($_POST['lastname']);
$email          = $conn->real_escape_string($_POST['email']);
$phone          = $conn->real_escape_string($_POST['phone']);
$check_in       = $conn->real_escape_string($_POST['check-in-date']);
$check_out      = $conn->real_escape_string($_POST['check-out-date']);
$accomodation   = $conn->real_escape_string($_POST['accomodation']);
$number_of_room = $conn->real_escape_string($_POST['age']);
$room_type      = isset($_POST['room-type']) ? $conn->real_escape_string($_POST['room-type']) : '';
$additional     = $conn->real_escape_string($_POST['additional']);

// Prepare the SQL insert statement
$sql = "INSERT INTO bookings (firstname, lastname, email, phone, check_in, check_out, accomodation, number_of_room, room_type, additional_requests)
        VALUES ('$firstname', '$lastname', '$email', '$phone', '$check_in', '$check_out', '$accomodation', '$number_of_room', '$room_type', '$additional')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Booking successfully saved!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>