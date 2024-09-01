<?php

require __DIR__."/../../core/Model.php";

class capaciter_chambre_Model extends Model
{
  static function  get_capacity_rooms(){
    
    $PDO=self::database_connection();

    if ($PDO) 
    {
      $stmt=$PDO->prepare("SELECT * FROM capacite_chambre");
      
      $stmt->execute([]);

      $table=$stmt->fetchAll(PDO::FETCH_OBJ);

      return $table;

    }
  }

  static function delete_capacite($id){

    $PDO=self::database_connection();

    if ($PDO) 
    {
           $stmt1=$PDO->prepare("SELECT * FROM chambre WHERE id_capacite=?");

           $stmt1->execute([$id]);

           if ($stmt1->rowCount()==0) {
            
            $stmt=$PDO->prepare("DELETE FROM capacite_chambre WHERE id_capacite=?");
    
            $stmt->execute([$id]);

            return true;

           }else{
            return false;
           }



    }
  }

  static function insert_capacite($titre_capacite,$numero_capacite)
  {
    $PDO=self::database_connection();


    if ($PDO) 
    {

      $stmt=$PDO->prepare("INSERT INTO capacite_chambre VALUES (null,?,?) ");

      $stmt->execute([$titre_capacite,$numero_capacite]);


    }
  }


  static function  get_capacity_room($id){
    
    $PDO=self::database_connection();

    if ($PDO) 
    {
      $stmt=$PDO->prepare("SELECT * FROM capacite_chambre WHERE id_capacite=?");
      
      $stmt->execute([$id]);

      $obj=$stmt->fetch(PDO::FETCH_OBJ);

      return $obj;

    }
  }


  static function modify_capacite($id, $titre_capacite, $numero_capacite)
  {
      $PDO = self::database_connection();
  
      if ($PDO) 
      {
          // Prepare the SQL query to update the record
          $stmt = $PDO->prepare("UPDATE capacite_chambre SET titre_capacite = ?, numero_capacite = ? WHERE id_capacite = ?");
  
          // Execute the query with the new values and the specified id
          $stmt->execute([$titre_capacite, $numero_capacite, $id]);
      }
  }
  

  
}


