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
    $password = $_POST["password"];

    // Query to check if the user exists
    $sql = "SELECT * FROM account WHERE (username = '$username')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, verify password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            echo '<script>alert("Logged In.");</script>';
            echo "<script type='text/javascript'> document.location = 'personal.html';</script>"; 
            // Perform actions after successful login
        } else {
            echo '<script>alert("Incorrect password. Please try again.");</script>';
            echo'<script>document.write("");
            window.open("login.html", "_self");</script>'; 
        }
    } else {
        echo '<script>alert("User not found. Please check your username/email and try again.");</script>';
        echo'<script>document.write("");
        window.open("login.html", "_self");</script>';
    }

    // Close the database connection
    $conn->close();
}
?>