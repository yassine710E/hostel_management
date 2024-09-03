<?php

// Require the base model class
require __DIR__."/../../core/Model.php";

// Model class for managing room capacities
class capaciter_chambre_Model extends Model
{
    // Static method to get all room capacities
    static function get_capacity_rooms()
    {
        // Get a database connection
        $PDO = self::database_connection();

        if ($PDO) 
        {
            // Prepare the SQL query to select all room capacities
            $stmt = $PDO->prepare("SELECT * FROM capacite_chambre");

            // Execute the query
            $stmt->execute([]);

            // Fetch all results as objects
            $table = $stmt->fetchAll(PDO::FETCH_OBJ);

            // Return the results
            return $table;
        }
    }

    // Static method to delete a room capacity by ID
    static function delete_capacite($id)
    {
        // Get a database connection
        $PDO = self::database_connection();

        if ($PDO) 
        {
            // Check if the capacity is linked to any room
            $stmt1 = $PDO->prepare("SELECT * FROM chambre WHERE id_capacite=?");
            $stmt1->execute([$id]);

            // If the capacity is not linked to any room, delete it
            if ($stmt1->rowCount() == 0) 
            {
                // Prepare the SQL query to delete the room capacity
                $stmt = $PDO->prepare("DELETE FROM capacite_chambre WHERE id_capacite=?");
                $stmt->execute([$id]);

                // Return true indicating successful deletion
                return true;
            } 
            else 
            {
                // Return false if the capacity is linked to a room
                return false;
            }
        }
    }

    // Static method to insert a new room capacity
    static function insert_capacite($titre_capacite, $numero_capacite)
    {
        // Get a database connection
        $PDO = self::database_connection();

        if ($PDO) 
        {
            // Prepare the SQL query to insert a new room capacity
            $stmt = $PDO->prepare("INSERT INTO capacite_chambre VALUES (null, ?, ?)");

            // Execute the query with the provided title and number
            $stmt->execute([$titre_capacite, $numero_capacite]);
        }
    }

    // Static method to get a specific room capacity by ID
    static function get_capacity_room($id)
    {
        // Get a database connection
        $PDO = self::database_connection();

        if ($PDO) 
        {
            // Prepare the SQL query to select the room capacity by ID
            $stmt = $PDO->prepare("SELECT * FROM capacite_chambre WHERE id_capacite=?");

            // Execute the query with the specified ID
            $stmt->execute([$id]);

            // Fetch the result as an object
            $obj = $stmt->fetch(PDO::FETCH_OBJ);

            // Return the result
            return $obj;
        }
    }

    // Static method to modify an existing room capacity
    static function modify_capacite($id, $titre_capacite, $numero_capacite)
    {
        // Get a database connection
        $PDO = self::database_connection();

        if ($PDO) 
        {
            // Prepare the SQL query to update the room capacity
            $stmt = $PDO->prepare("UPDATE capacite_chambre SET titre_capacite = ?, numero_capacite = ? WHERE id_capacite = ?");

            // Execute the query with the new values and the specified ID
            $stmt->execute([$titre_capacite, $numero_capacite, $id]);
        }
    }
}
