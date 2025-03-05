<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$database = "felhasznalok";

// Kapcsolódás az adatbázishoz
$conn = new mysqli($servername, $username, $password, $database);

// Kapcsolódási hiba ellenőrzése
if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}

// Ha a kérés metódusa POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // SQL lekérdezés előkészítése
    $sql = "INSERT INTO uzenetek (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    // Lekérdezés futtatása és eredmény ellenőrzése
    if ($conn->query($sql) === TRUE) {
        // Sikeres mentés esetén JavaScript alert és átirányítás
        echo "<script>
                alert('Az üzenet sikeresen elküldve!');
                window.location.href = 'kapcsolat.html'; // Vagy a kapcsolat oldal URL-je
              </script>";
    } else {
        echo "Hiba: " . $sql . "<br>" . $conn->error;
    }
}

// Kapcsolat bezárása
$conn->close();
?>