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
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the 'account' table
    $sql = "INSERT INTO account (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

    // Perform the query
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registered successfully');</script>";
        echo "<script type='text/javascript'> document.location = 'login.html';</script>";
    } else { 
        echo '<div class="alert alert-danger" role="alert">
        Registeration unsuccessfull please try again
      </div>';
    }

    // Close the database connection
    $conn->close();
}
?>