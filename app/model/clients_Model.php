<?php

//require to the base Model Class
require __DIR__."/../../core/Model.php";

class clients_Model extends Model
{
    static function get_clients()
    {
        $PDO=self::database_connection();

        if ($PDO) 
        {
           $stmt=$PDO->prepare("SELECT * FROM client");

           $stmt->execute([]);

           $data=$stmt->fetchAll(PDO::FETCH_OBJ);
           
           return $data;
        }
    }

    static function search_client($data)
    {
        $query = "SELECT * FROM client WHERE ";
        $table = [];
        
        // Construct the query and parameters
        foreach ($data as $key => $value) 
        {
            $query .= "$key LIKE ? AND ";
            array_push($table, "%" . $value . "%");
        }
    
        // Remove the trailing 'AND'
        $query = rtrim($query, " AND ");
    
        $PDO = self::database_connection();
    
        if ($PDO) 
        {
            $stmt = $PDO->prepare($query);
            
            $stmt->execute($table);
            
            $clients = $stmt->fetchAll(PDO::FETCH_OBJ);
    
            if (!empty($clients)) 
            {
                return $clients;
            }
            else 
            {
                return false;
            }
            
        }
    }
    
    static function insert_client($client)
    {
         $PDO=self::database_connection();

         if ($PDO) 
         {
            $stmt=$PDO->prepare("INSERT INTO client VALUES (null,?,?,?,?,?,?,?,?,?,?)");
            
            $stmt->execute([$client['nom_complet'],$client['sexe'],$client['date_naissance'],$client['age'],$client['pays'],$client['ville'],$client['adresse'],$client['telephone'],$client['email'],$client['autres_details']]);

         }
    }

    static function delete_client($id)
    {
        $PDO=self::database_connection();

        if ($PDO) 
        {
            $stmt1 = $PDO->prepare("SELECT * FROM reservation WHERE id_client=?");
           
            $stmt1->execute([$id]);

            // If the capacity is not linked to any room, delete it
            if ($stmt1->rowCount() == 0) 
            {
                $stmt=$PDO->prepare("DELETE FROM client WHERE id_client=?");

                $stmt->execute([$id]);

                return true;
            }else 
            {
                return false;
            }


        }  
    }

    static function get_client($id)
    {
        $PDO=self::database_connection();

        if ($PDO) 
        {
           $stmt=$PDO->prepare("SELECT * FROM client WHERE id_client=?");

           $stmt->execute([$id]);

           $data=$stmt->fetch(PDO::FETCH_OBJ);
           
           return $data;
        }
    }

    static function modify_client($client,$id)
    {
        $PDO=self::database_connection();

        if ($PDO) {
             $stmt=$PDO->prepare("
              UPDATE client
              SET 
              nom_complet = ?,
              sexe = ?,
              date_naissance = ?,
              age = ?,
              pays = ?,
              ville = ?,
              adresse = ?,
              telephone = ?,
              email = ?,
              autres_details = ?
              WHERE 
              id_client = ?");

              $stmt->execute([$client['nom_complet'],$client['sexe'],$client['date_naissance'],$client['age'],$client['pays'],$client['ville'],$client['adresse'],$client['telephone'],$client['email'],$client['autres_details'],$id]);

        } 
    }

    static function get_register_of_clients()
    {
        $PDO=self::database_connection();

        if ($PDO) 
        {
            $stmt=$PDO->prepare("
            SELECT * 
            FROM client 
            INNER JOIN reservation ON client.id_client = reservation.id_client 
            INNER JOIN chambre ON reservation.id_chambre = chambre.id_chambre 
            INNER JOIN tarif_chambre ON chambre.id_tarif = tarif_chambre.id_tarif;
            
            ");

            $stmt->execute([]);

            $data=$stmt->fetchAll(PDO::FETCH_OBJ);

            return $data;

        }

    }


    static function search_client_register($data)
    {
        $query = "SELECT * 
            FROM client 
            INNER JOIN reservation ON client.id_client = reservation.id_client 
            INNER JOIN chambre ON reservation.id_chambre = chambre.id_chambre 
            INNER JOIN tarif_chambre ON chambre.id_tarif = tarif_chambre.id_tarif  WHERE ";
        $table = [];
    
        if (isset($data['nom_complet']) && isset($data['date_debut'])) 
        {
            $query .= "client.nom_complet LIKE ? 
                       AND (reservation.date_arrivee BETWEEN ? AND ?) 
                       AND (reservation.date_depart BETWEEN ? AND ?)";
            $table = ["%" . $data['nom_complet'] . "%", $data['date_debut'], $data['date_fin'], $data['date_debut'], $data['date_fin']];
        } 
        elseif (isset($data['nom_complet'])) 
        {
            $query .= "client.nom_complet LIKE ?";
            $table = ["%" . $data['nom_complet'] . "%"];
        } 
        else 
        {
            $query .= "(reservation.date_arrivee BETWEEN ? AND ?) 
                       AND (reservation.date_depart BETWEEN ? AND ?)";
            $table = [$data['date_debut'], $data['date_fin'], $data['date_debut'], $data['date_fin']];
        }
    
        $PDO = self::database_connection();
    
        if ($PDO) 
        {
            $stmt = $PDO->prepare($query);
            $stmt->execute($table);
            $results = $stmt->fetchAll(PDO::FETCH_OBJ);
    
            if (!empty($results)) 
            {
                return $results;
            } 
            else 
            {
                return false;
            }
        }
    }

    

    
}