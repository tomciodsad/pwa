<?php
class Produkt {
   private $conn;
   private $table='Produkt';
   public $Id_produktu;
   public $Producent;
   public $Nazwa;
   public $Dzial;
   public $Cena;
   public $Okres_gwarancji;
   public $KategoriaId;
   public $IloscId;

   public function __construct($db)
   {
      $this->conn=$db;
   }

   public function read()
   {
     $query="SELECT c.Nazwa as category_name,p.Id_produktu,p.Cena,p.Producent , p.Nazwa, c.Id_kategori
     FROM produkt p LEFT JOIN kategoria c ON p.KategoriaId=c.Id_kategori ORDER BY p.Nazwa DESC";
    //  $query="SELECT Nazwa, Cena From Produkt ORDER BY Nazwa DESC";
      $stmt=$this->conn->prepare($query);
      $stmt->execute();
      return $stmt;
   }

   public function read_single(){
    $query="SELECT c.Nazwa as category_name,p.Id_produktu,p.Cena,p.Producent , p.Nazwa, c.Id_kategori
     FROM produkt p LEFT JOIN kategoria c ON p.KategoriaId=c.Id_kategori WHERE p.Id_produktu=? LIMIT 0,1";

     $stmt=$this->conn->prepare($query);
     $statement->bindParam(1,$this->id);
     $stmt->execute();
   }
}
?>