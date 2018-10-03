<?php
$dsn = "mysql:host=localhost;dbname=sklep_internetowy";
$uzytkownik = "root";
$haslo = "inzynierka";
try{
$dbo = new PDO($dsn, $uzytkownik, $haslo);
}
catch (PDOException $e){
echo 'Błąd podczas otwierania połączenia: ' . $e->getMessage();
exit;
}
echo 'Połączenie z bazą danych zostało nawiązane...<br>';
$dbo = null;
echo 'Połączenie z bazą danych zostało zamknięte...<br>';
?>