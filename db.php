<?php
$serverName = "DESKTOP-B52FCBN"; // De exemplu, "localhost\SQLEXPRESS"

$database = "MAGAZIN";

try {
    $conn = new PDO("sqlsrv:server=$serverName;Database=$database");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexiunea a fost stabilită";
}
catch(PDOException $e) {
    echo "Eroare la conexiune: " . $e->getMessage();
}

?>
