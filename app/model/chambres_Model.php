<?php

require __DIR__.'/../../core/Model.php';

class chambres_Model extends Model
{
    static function get_chambres()
    {
        $PDO=parent::database_connection();

        if ($PDO) 
        {
            $stmt=$PDO->prepare("SELECT * FROM chambre 
            INNER JOIN capacite_chambre ON chambre.id_capacite=capacite_chambre.id_capacite
            INNER JOIN type_chambre ON chambre.id_type_chambre=type_chambre.id_type_chambre 
            INNER JOIN tarif_chambre ON chambre.id_tarif=tarif_chambre.id_tarif");
            

            $stmt->execute([]);

            $data=$stmt->fetchAll(PDO::FETCH_OBJ);

            return $data;
        }

    }

    static function get_capacite_prix_and_type()
    {
        $PDO=parent::database_connection();

        if ($PDO) 
        {
            $data=[];
            
            $stmt=$PDO->prepare("SELECT id_type_chambre,type_chambre,photo_type_chambre FROM type_chambre");
            $stmt->execute([]);
            $data['type_chambre']=$stmt->fetchAll(PDO::FETCH_OBJ);
            
            $stmt1=$PDO->prepare("SELECT id_capacite,numero_capacite FROM capacite_chambre ");
            $stmt1->execute([]);
            $data['capacite_chambre']=$stmt1->fetchAll(PDO::FETCH_OBJ);

            $stmt2=$PDO->prepare("SELECT * FROM tarif_chambre ");
            $stmt2->execute([]);
            $data['tarif_chambre']=$stmt2->fetchAll(PDO::FETCH_OBJ);


            return $data;




        }
    }

    static function get_chambre($id)
    {
         $PDO=parent::database_connection();

         if ($PDO) 
         {
            $stmt=$PDO->prepare("SELECT * FROM chambre WHERE id_chambre=?");
            
            $stmt->execute([$id]);

            $data=self::get_capacite_prix_and_type();

            $data['chambre']=$stmt->fetch(PDO::FETCH_OBJ);

            return $data;
         }
    }
    static function insert_chambre($data)
    {
        $PDO=self::database_connection();
        
        if ($PDO) 
        {
             $stmt=$PDO->prepare("INSERT INTO chambre VALUES (null,?,?,?,?,?,?,?,?,?)");

             $stmt->execute([$data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8]]);  
        
             
        }
    }

    static function delete_chambre($id)
    {
       $PDO=self::database_connection();

       if ($PDO) 
       {
        
        $stmt=$PDO->prepare("SELECT * FROM reservation WHERE id_chambre=?");
        
        $stmt->execute([$id]);

        if ($stmt->rowCount()==0) 
        {
            $stmt1=$PDO->prepare("DELETE FROM chambre WHERE id_chambre=?");

            $stmt1->execute([$id]);

            return true;

        }else 
        {
            return false;   
        }
       }
    }

    static function modify_chambre($id,$data)
    {
        $PDO=parent::database_connection();

        if ($PDO) 
        {
            $stmt=$PDO->prepare('UPDATE chambre SET 
                                id_type_chambre = ?, 
                                id_capacite = ?, 
                                id_tarif = ?, 
                                numero_chambre = ?, 
                                nombre_adultes_enfants_ch = ?, 
                                renfort_chambre = ?, 
                                etage_chambre = ?, 
                                nbr_lits_chambre = ?, 
                                photo_chambre = ? 
                                WHERE id_chambre = ?');
            
            $stmt->execute([$data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$id]);  

        }
    }

    static function search_chambre($data_return)
    {
        $table = [];
        $querie = "SELECT * FROM chambre 
            INNER JOIN capacite_chambre ON chambre.id_capacite = capacite_chambre.id_capacite
            INNER JOIN type_chambre ON chambre.id_type_chambre = type_chambre.id_type_chambre 
            INNER JOIN tarif_chambre ON chambre.id_tarif = tarif_chambre.id_tarif
            WHERE 1=1 ";
    
        // Build the query dynamically
        if (isset($data_return['numero_chambre'])) 
        {
            $querie .= "AND chambre.numero_chambre LIKE ? ";
            array_push($table, "%" . $data_return['numero_chambre'] . "%");
        }
        if (isset($data_return['type_chambre'])) 
        {
            $querie .= "AND  type_chambre.type_chambre LIKE ? ";
            array_push($table, "%" . $data_return['type_chambre'] . "%");
        }
        if (isset($data_return['numero_capacite'])) 
        {
            $querie .= "AND capacite_chambre.numero_capacite = ? ";
            array_push($table, $data_return['numero_capacite']);
        }

        
    
        $PDO = parent::database_connection();
    
        if ($PDO)
        {
            $stmt = $PDO->prepare($querie);
    
            $stmt->execute($table);
    
            if ($stmt->rowCount()) 
            {
                $data = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $data;
            }
            else 
            {
                return false;
            }
        }
    }
    

    
}