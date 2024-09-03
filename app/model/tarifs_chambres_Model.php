<?php

require __DIR__ . "/../../core/Model.php";

class tarifs_chambres_Model extends Model
{
    static function get_tarifs_chambres()
    {
        $PDO = parent::database_connection();

        if ($PDO) {
            $stmt = $PDO->prepare("SELECT * FROM tarif_chambre");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        return null;
    }

    static function add_tarifs_chambres($prix_base_nuit, $prix_base_passage, $N_prix_nuit, $N_prix_passage)
    {
        $PDO = parent::database_connection();

        if ($PDO) {
            $stmt = $PDO->prepare("INSERT INTO tarif_chambre VALUES (null, ?, ?, ?, ?)");
            $stmt->execute([$prix_base_nuit, $prix_base_passage, $N_prix_nuit, $N_prix_passage]);
        }
    }

    static function delete_tarifs_chambres($id)
    {
        $PDO = self::database_connection();
        if ($PDO) {
            // Check if the type is linked to any room
            $stmt1 = $PDO->prepare("SELECT * FROM chambre WHERE id_tarif = ?");
            $stmt1->execute([$id]);

            if ($stmt1->rowCount() == 0) {
                // If the type is not linked to any room, delete it
                $stmt = $PDO->prepare("DELETE FROM tarif_chambre WHERE id_tarif = ?");
                $stmt->execute([$id]);

                return true; // Return true indicating successful deletion
            } else {
                return false; // Return false if the type is linked to a room
            }
        }
        return false;
    }

    static function get_tarif_chambre($id)
    {
        $PDO = self::database_connection();

        if ($PDO) {
            $stmt = $PDO->prepare("SELECT * FROM tarif_chambre WHERE id_tarif = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        return null;
    }

    static function modify_tarifs_chambres($id, $prix_base_nuit, $prix_base_passage, $N_prix_nuit, $N_prix_passage)
    {
        $PDO = self::database_connection();

        if ($PDO) {
            $stmt = $PDO->prepare("UPDATE tarif_chambre SET prix_base_nuit = ?, prix_base_passage = ?, N_prix_nuit = ?, N_prix_passage = ? WHERE id_tarif = ?");
            $stmt->execute([$prix_base_nuit, $prix_base_passage, $N_prix_nuit, $N_prix_passage, $id]);
        }
    }
}
