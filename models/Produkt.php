<?php
class Produkt {
   private $conn;
   private $table='Produkt';
   public $Id_produktu;
   public $Producent;
   public $Nazwa;
   public $Dzial;
   public $Cena;
   public $Okres_gwaracji;
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
   public function read_single() {
    // Create query
    //$query="SELECT c.Nazwa as category_name,p.Id_produktu,p.Cena,p.Producent , p.Nazwa, c.Id_kategori
    $query="SELECT Id_produktu,Nazwa, Cena, Producent From Produkt
     where Id_Produktu = ? LIMIT 0,1";

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $this->Id_Produktu);

    // Execute query
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Set properties
    $this->Nazwa = $row['Nazwa'];
    $this->Producent = $row['Producent'];

}


public function create()
{
  $query="INSERT INTO PRODUKT SET
  Id_produktu=:Id_produktu,
  Producent=:Producent,
  Nazwa=:Nazwa,
  Dzial=:Dzial,
  Cena=:Cena,
  Okres_gwaracji=:Okres_gwaracji,
  KategoriaId=:KategoriaId,
  IloscId=:IloscId";
  $stmt=$this->conn->prepare($query);
  $this->Id_produktu=htmlspecialchars(strip_tags($this->Id_produktu));
  $this->Producent=htmlspecialchars(strip_tags($this->Producent));
  $this->Nazwa=htmlspecialchars(strip_tags($this->Nazwa));
  $this->Dzial=htmlspecialchars(strip_tags($this->Dzial));
  $this->Cena=htmlspecialchars(strip_tags($this->Cena));
  $this->Okres_gwaracji=htmlspecialchars(strip_tags($this->Okres_gwaracji));
  $this->KategoriaId=htmlspecialchars(strip_tags($this->KategoriaId));
  $this->IloscId=htmlspecialchars(strip_tags($this->IloscId));

  $stmt->bindParam(':Id_produktu',$this->Id_produktu);
  $stmt->bindParam(':Producent',$this->Producent);
  $stmt->bindParam(':Nazwa',$this->Nazwa);
  $stmt->bindParam(':Dzial',$this->Dzial);
  $stmt->bindParam(':Cena',$this->Cena);
  $stmt->bindParam(':Okres_gwaracji',$this->Okres_gwaracji);
  $stmt->bindParam(':KategoriaId',$this->KategoriaId);
  $stmt->bindParam(':IloscId',$this->IloscId);

  if($stmt->execute())
  {
    return true;
  }
  else
  //printf("Error: %s.\n", stmt->error);
  return false;
}
}
?>