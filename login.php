<?php

// Verifică dacă scriptul este accesat prin metoda POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Preia datele trimise prin formular
    $nume = $_POST['email'] ?? 'Nedefinit'; // Operatorul ?? este folosit pentru a returna 'Nedefinit' dacă indexul 'nume' nu există
    $email = $_POST['parola'] ?? 'Nedefinit';

    // Crează o linie de text cu datele primite
    $text = "Nume: " . strip_tags($nume) . ", Email: " . strip_tags($email) . PHP_EOL;

    // Deschide sau creează fișierul 'date.txt' pentru a adăuga textul primit
    $file = fopen("date.txt", "a"); // 'a' este modul pentru append, adaugă la sfârșitul fișierului

    // Verifică dacă fișierul a fost deschis cu succes
    if ($file === false) {
        echo "Eroare la deschiderea fișierului!";
    } else {
        // Scrie textul în fișier și închide fișierul
        fwrite($file, $text);
        fclose($file);

        echo "Datele au fost salvate cu succes.";
    }
} else {
    // Dacă scriptul nu este accesat prin metoda POST, afișează un mesaj de eroare
    echo "Această pagină trebuie accesată prin metoda POST.";
}

?>
