<?php

// Check if the script is accessed via POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the email and password sent through the form
    $email = $_POST['email'] ?? 'Undefined';
    $password = $_POST['parola'] ?? 'Undefined';

    // Initialize session and store data in session variables
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options for POST request
    curl_setopt($ch, CURLOPT_URL, "https://example.com/login"); // URL of the login page
    curl_setopt($ch, CURLOPT_POST, true); // Set method to POST
    curl_setopt($ch, CURLOPT_POSTFIELDS, "login=$email&password=$password"); // Data being posted
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
    curl_setopt($ch, CURLOPT_COOKIEJAR, session_id()); // Use current session ID for cookies

    // Execute POST request
    $result = curl_exec($ch);

    // Close cURL session
    curl_close($ch);

    // Check the result and respond accordingly
    if ($result === false) {
        echo "Failed to connect to the login page.";
    } else {
        echo "Logged in successfully. Response from server: " . htmlspecialchars($result);
    }
} else {
    // If the script is not accessed via POST method, display an error message
    echo "This page must be accessed via POST method.";
}

?>
