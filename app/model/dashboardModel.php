<?php

require __DIR__."/../../core/Model.php";


class dashboardModel extends Model
{
    static function get_statistics(){

        $PDO=self::database_connection();
          
        if ($PDO)
        {
            $stmt=$PDO->prepare("SELECT * FROM capacite_chambre");
            $stmt->execute([]);
            $num_capaciter_chambre=$stmt->rowCount();


            $stmt=$PDO->prepare("SELECT * FROM chambre");
            $stmt->execute([]);
            $num_chambre=$stmt->rowCount();

           
            $stmt=$PDO->prepare("SELECT * FROM client");
            $stmt->execute([]);
            $num_client=$stmt->rowCount();


            $stmt=$PDO->prepare("SELECT * FROM reservation");
            $stmt->execute([]);
            $num_reservation=$stmt->rowCount();

            
            $stmt=$PDO->prepare("SELECT * FROM tarif_chambre");
            $stmt->execute([]);
            $num_tarif_chambre=$stmt->rowCount();

            
            $stmt=$PDO->prepare("SELECT * FROM type_chambre");
            $stmt->execute([]);
            $num_type_chambre=$stmt->rowCount();

         
            return     [
                
                'capaciter_chambre'=>$num_capaciter_chambre,

                "chambre"=>$num_chambre,

                "client"=>$num_client,
                
                "reservation"=>$num_reservation,
                
                "tarif_chambre"=>$num_tarif_chambre,
                
                "type_chambre"=>$num_type_chambre

            ];



        } 
    }
}