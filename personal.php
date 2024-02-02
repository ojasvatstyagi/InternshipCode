<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $usernamedb = "root";
    $password = "MOHIT1122334455";
    $dbname = "intern";

    // Create connection
    $conn = new mysqli($servername, $usernamedb, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $address = $_POST["address"];

    // Update data in the 'account' table

    $sql = "UPDATE account SET 
            firstName='$firstName', 
            lastName='$lastName', 
            email='$email', 
            phoneNumber='$phoneNumber', 
            address='$address' where username = '$username'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Personal details updated successfully!');</script>";
        echo "<script type='text/javascript'> document.location = 'End.html';</script>";
    } else {
        echo '<div class="alert alert-danger" role="alert"> Invalid credentials </div>';
        echo "<script type='text/javascript'> document.location = 'personal.html';</script>";
    }

    // Close the database connection
    $conn->close();
}
?>