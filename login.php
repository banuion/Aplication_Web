<?php

// Verifică dacă scriptul este accesat prin metoda POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Preia datele trimise prin formular
    $nume = $_POST['email'] ?? 'Nedefinit'; // Folosește 'email' pentru nume
    $email = $_POST['parola'] ?? 'Nedefinit'; // Folosește 'parola' pentru email

    // Setează cookie-uri pentru nume și email
    setcookie("nume", $nume, time() + (86400 * 30), "/"); // Cookie-ul pentru nume expiră în 30 de zile
    setcookie("email", $email, time() + (86400 * 30), "/"); // Cookie-ul pentru email expiră în 30 de zile

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
