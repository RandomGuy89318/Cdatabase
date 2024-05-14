<?php 
include "conn.php";

// Check if the required parameters are received
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Sanitize the received values (optional but recommended)
    $uname = mysqli_real_escape_string($conn, $_POST['username']);
    $pword = mysqli_real_escape_string($conn, $_POST['password']);

    // SQL query to check if the username and password exist in the database
    $sql = "SELECT * FROM users WHERE Name = '$uname' AND Password = '$pword'";

    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Username and password matched, send back user details
        $user = $result->fetch_assoc();
        echo json_encode($user);
    } else {
        // Username and password don't match
        echo "Login failed. Invalid username or password.";
    }
} else {
    // Required parameters not received
    echo "Login failed. Required parameters missing.";
}

$conn->close();
?>
