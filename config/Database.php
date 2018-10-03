<?php
class Database
{
   private $dsn = "mysql:host=localhost;dbname=sklep_internetowy";
   private $uzytkownik = "root";
   private $haslo = "inzynierka";
   private $conn;

    public function connect()
    {
       $this->conn=null;

       try {
        // $this->conn=new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name , $this->username, $this->password);
        $this->conn=new PDO($this->dsn, $this->uzytkownik, $this->haslo);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         echo "Polaczono z baza";
       }catch(PDOException $e) {
         echo 'Connection Error: '.$e->getMessage();
       }
       return $this->conn;
    }
}
?>

