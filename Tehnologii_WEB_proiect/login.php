<?php
// Server connection information
$serverName = "DESKTOP-B52FCBN"; // You can also use an IP address
$connectionOptions = array(
    "Database" => "MAGAZIN",
    "Trusted_Connection" => true
);

// Establish the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn) {
    echo "Connected!";
} else {
    echo "Connection could not be established.<br />";
    die(print_r(sqlsrv_errors(), true));
}
?>
