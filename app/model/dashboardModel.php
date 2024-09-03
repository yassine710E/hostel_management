<?php

// Require the base model class
require __DIR__."/../../core/Model.php";

// Model class for managing dashboard data
class dashboardModel extends Model
{
    // Static method to get statistics for the dashboard
    static function get_statistics()
    {
        // Get a database connection
        $PDO = self::database_connection();

        if ($PDO)
        {
            // Fetch the total number of capacities
            $stmt = $PDO->prepare("SELECT * FROM capacite_chambre");
            $stmt->execute([]);
            $num_capaciter_chambre = $stmt->rowCount();

            // Fetch the total number of rooms
            $stmt = $PDO->prepare("SELECT * FROM chambre");
            $stmt->execute([]);
            $num_chambre = $stmt->rowCount();

            // Fetch the total number of clients
            $stmt = $PDO->prepare("SELECT * FROM client");
            $stmt->execute([]);
            $num_client = $stmt->rowCount();

            // Fetch the total number of reservations
            $stmt = $PDO->prepare("SELECT * FROM reservation");
            $stmt->execute([]);
            $num_reservation = $stmt->rowCount();

            // Fetch the total number of room rates
            $stmt = $PDO->prepare("SELECT * FROM tarif_chambre");
            $stmt->execute([]);
            $num_tarif_chambre = $stmt->rowCount();

            // Fetch the total number of room types
            $stmt = $PDO->prepare("SELECT * FROM type_chambre");
            $stmt->execute([]);
            $num_type_chambre = $stmt->rowCount();

            // Return an associative array with all the statistics
            return [
                'capaciter_chambre' => $num_capaciter_chambre,
                'chambre' => $num_chambre,
                'client' => $num_client,
                'reservation' => $num_reservation,
                'tarif_chambre' => $num_tarif_chambre,
                'type_chambre' => $num_type_chambre
            ];
        }
    }
}
