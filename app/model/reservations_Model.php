<?php

// Require the base model class
require __DIR__."/../../core/Model.php";

class reservations_Model extends Model
{
    static function update_reservations()
    {
        $PDO=self::database_connection();
        if ($PDO) 
        {
            $currentDate = date("Y-m-d");
            $var=$PDO->prepare("UPDATE reservation SET Etat=? WHERE date_arrivee>? AND date_depart>? ");
            $tab=["Planifiee",$currentDate,$currentDate];
            $var->execute($tab);
            
            $var1=$PDO->prepare("UPDATE reservation SET Etat=? WHERE date_arrivee<=? AND date_depart>=? ");
            $tab1=['En cours',$currentDate,$currentDate];
            $var1->execute($tab1);
            
            $var2=$PDO->prepare("UPDATE reservation SET Etat=? WHERE date_arrivee<? AND date_depart<? ");
            $tab2=["Terminee",$currentDate,$currentDate];
            $var2->execute($tab2);
        }

    }

    static function get_data()
    {
        $PDO=self::database_connection();

        if ($PDO) 
        {
            $data=[];

            $stmt=$PDO->prepare("SELECT * FROM reservation 
                                 INNER JOIN chambre ON reservation.id_chambre=chambre.id_chambre 
                                 INNER JOIN client ON reservation.id_client=client.id_client");
            $stmt->execute();
            
            $data['reservations']=$stmt->fetchAll(PDO::FETCH_OBJ);
            
            //select chambre
            $chambre=$PDO->prepare("SELECT * FROM chambre");
            $chambre->execute();
            
            $data['chambres']=$chambre->fetchAll(PDO::FETCH_OBJ);
            
            //select client
            $client=$PDO->prepare("SELECT * FROM client");
            $client->execute();
            
            $data['clients']=$client->fetchAll(PDO::FETCH_OBJ);

            //select type_chambre
            $type_chambre=$PDO->prepare("SELECT * FROM type_chambre");
            $type_chambre->execute();

            $data['type_chambre']=$type_chambre->fetchAll(PDO::FETCH_OBJ);

            return $data;

        }
    }
    static function search_reservation($data)
    {
       $PDO=self::database_connection();

       if ($PDO) 
       {
        $querie="SELECT * FROM reservation 
                INNER JOIN chambre ON reservation.id_chambre=chambre.id_chambre 
                INNER JOIN client ON reservation.id_client=client.id_client WHERE 1=1 ";

        $table=[];

        if (isset($data['date_debut'])) 
        {
            
            $querie.="AND (reservation.date_arrivee BETWEEN ? AND ?) AND (reservation.date_depart BETWEEN ? AND ?) ";
            
            array_push($table,$data['date_debut'],$data['date_fin'],$data['date_debut'],$data['date_fin']);

        }
        if (isset($data['numero_chambre'])) 
        {
            $querie.="AND chambre.numero_chambre LIKE ?";
            
            array_push($table,"%".$data['numero_chambre']."%");
        }
        if (isset($data['nom_complet'])) 
        {
            $querie.="AND client.nom_complet LIKE ?";

            array_push($table,"%".$data['nom_complet']."%");
        }

        $stmt=$PDO->prepare($querie);
        $stmt->execute($table);

        if ($stmt->rowCount()>0) 
        {
          $search_results=[];
          
          $search_results['chambres']=(self::get_data())['chambres'];
          
          $search_results['clients']=(self::get_data())['clients'];
          
          $search_results['reservations']=$stmt->fetchAll(PDO::FETCH_OBJ);

          return $search_results;
        }
        else 
        {
            return false;
        }
                    

        
       }
    }

    static function add_reservation($data)
    {
        $PDO=self::database_connection();
        if ($PDO) {
        $chambre=$PDO->prepare("
        SELECT * 
        FROM chambre 
        INNER JOIN type_chambre 
        ON chambre.id_type_chambre=type_chambre.id_type_chambre 
        WHERE chambre.id_chambre NOT IN (
            SELECT reservation.id_chambre 
            FROM reservation 
            WHERE NOT (
                reservation.date_arrivee > ? OR reservation.date_depart < ?
            )
        ) 
        AND type_chambre.id_type_chambre = ? 
        AND (
            (chambre.nombre_adultes_enfants_ch >= ? AND chambre.renfort_chambre = ?) 
            OR 
            (chambre.nombre_adultes_enfants_ch >= ? )
        )
    ");            

        $chambre->execute($data);
        if ($chambre->rowCount()>0) 
        {
            $table_chambre=$chambre->fetchAll(PDO::FETCH_OBJ);
            $add_data=self::get_data();
            $add_data['table_chambre']=$table_chambre;
            $add_data['date_arrivee']=$data[0];
            $add_data['date_depart']=$data[1];
            $add_data['nombre_adulted_enfants']=$data[5];
            
        
           
           return $add_data;
        }
        else{
          
            print "<pre>CHAMBRE AUCUNE TROUVÉE </pre>";
          
          return false;
        }}
    }

    static function get_chambre_and_tarif($id)
    {
        $PDO=self::database_connection();
        if ($PDO) 
        {
            $var=$PDO->prepare("SELECT * FROM chambre INNER JOIN tarif_chambre ON chambre.id_tarif=tarif_chambre.id_tarif WHERE chambre.id_chambre=?");
            $tab=[$id];
            $var->execute($tab);
    
            $obj_chambre_and_son_tarif=$var->fetch(PDO::FETCH_OBJ);
        
            return $obj_chambre_and_son_tarif;
        }

    }

    static function insert_reservation($data)
    {
        $PDO=self::database_connection();
        if ($PDO) 
        {
            $var1=$PDO->prepare("INSERT INTO reservation VALUES (null,?,?,?,?,?,?,?,?,?,?)");
            
            $var1->execute($data);
        }
 
    }
}


?>