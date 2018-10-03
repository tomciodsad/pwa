<?php
$db_obj = new mysqli("localhost", "root", "inzynierka", "sklep_internetowy");
if($db_obj->connect_errno){
echo 'Błąd podczas próby połączenia z serwerem MySQL...<br>';
echo 'Komunikat: ' . $db_obj->connect_error;
exit;
}
else{
echo 'Połączenie z bazą danych zostało nawiązane...<br>';
}
//Tutaj instrukcje wykonujące operacje na bazie danych
if($db_obj->close()){
echo 'Połączenie z serwerem MySQL zostało zamknięte...<br>';
}
else{
echo 'Błąd podczas zamykania połączenia z serwerem MySQL...<br>';
}
?>