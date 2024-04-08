<?php

// Check if the script is accessed via POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the data sent through the form
    $email = $_POST['email'] ?? 'Undefined'; // Correctly assign 'email'
    $password = $_POST['parola'] ?? 'Undefined'; // Correctly assign 'parola' to a variable

    // Set cookies for email and password
    setcookie("email", $email, time() + (86400 * 30), "/"); // Cookie for email expires in 30 days
    setcookie("password", $password, time() + (86400 * 30), "/"); // Cookie for password expires in 30 days

    // Create a text line with the received data
    $text = "Email: " . strip_tags($email) . ", Password: " . strip_tags($password) . PHP_EOL;

    // Open or create the file 'date.txt' to append the received text
    $file = fopen("C:\Users\BANU\Desktop\Tehnologii_WEB_proiect\date.txt", "a"); // 'a' means append mode

    // Check if the file was opened successfully
    if ($file === false) {
        echo "Error opening file!";
    } else {
        // Write the text to the file and close it
        fwrite($file, $text);
        fclose($file);

        echo "Data and cookies have been successfully saved.";
    }
} else {
    // If the script is not accessed via POST method, display an error message
    echo "This page must be accessed via POST method.";
}

?>
