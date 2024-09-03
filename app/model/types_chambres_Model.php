<?php


require __DIR__."/../../core/Model.php";


class types_chambres_Model extends Model
{
    static function get_types_chambres()
    {
        $PDO=self::database_connection();


        if ($PDO) 
        {
            // Prepare the SQL query to select all room capacities
            $stmt = $PDO->prepare("SELECT * FROM type_chambre");

            // Execute the query
            $stmt->execute([]);

            // Fetch all results as objects
            $table = $stmt->fetchAll(PDO::FETCH_OBJ);

            // Return the results
            return $table;
        }
    }

    static function insert_types_chambres($type_chambre,$description_type_chambre,$photo_type_chambre)
    {
        $PDO=self::database_connection();
        
        if ($PDO) 
        {
                $stmt=$PDO->prepare("INSERT INTO type_chambre VALUES (null,?,?,?)");

                $stmt->execute([$type_chambre,$description_type_chambre,$photo_type_chambre]);
        }
    }

    static function delete_types_chambres($id){
             // Get a database connection
             $PDO = self::database_connection();
             if ($PDO) 
             {
                // Check if the type is linked to any room
                $stmt1 = $PDO->prepare("SELECT * FROM chambre WHERE id_type_chambre=?");
                $stmt1->execute([$id]);

                // If the type is not linked to any room, delete it
                if ($stmt1->rowCount() == 0) 
                {
                    // Prepare the SQL query to delete the room type
                    $stmt = $PDO->prepare("DELETE FROM type_chambre WHERE id_type_chambre=?");
                    $stmt->execute([$id]);
    
                      // Return true indicating successful deletion
                      return true;
                  } 
                  else 
                  {
                      // Return false if the type is linked to a room
                      return false;
                  }
               } 
    }

    static function get_type_chambre($id)
    {
        $PDO=self::database_connection();


        if ($PDO) 
        {
            // Prepare the SQL query to select all room capacities
            $stmt = $PDO->prepare("SELECT * FROM type_chambre WHERE id_type_chambre=?");

            // Execute the query
            $stmt->execute([$id]);

            // Fetch all results as objects
            $obj = $stmt->fetch(PDO::FETCH_OBJ);

            // Return the results
            return $obj;
        } 
    }

    static function modify_types_chambres($id,$type_chambre,$description_type_chambre,$photo_type_chambre)
    {
                   // Get a database connection
        $PDO = self::database_connection();

        if ($PDO) 
        {
            // Prepare the SQL query to update the room capacity
            $stmt = $PDO->prepare("UPDATE type_chambre SET type_chambre = ?, description_type = ? , photo_type_chambre = ? WHERE id_type_chambre =?");

            // Execute the query with the new values and the specified ID
            $stmt->execute([$type_chambre,$description_type_chambre,$photo_type_chambre, $id]);
        }
    }


    static function consulter_type_chambre($id){
         // Get a database connection
         $PDO = self::database_connection();
         $table=[];
         if ($PDO) 
         {
                 
                $stmt1=$PDO->prepare("SELECT * FROM chambre WHERE id_type_chambre=?");
    
                $stmt1->execute([$id]);

                if ($stmt1->rowCount()>0) 
                {
                    $table_chambre=$stmt1->fetchAll(PDO::FETCH_OBJ);

                    $table['table_objs_chambre']=$table_chambre; 

                     $stmt = $PDO->prepare("SELECT * FROM type_chambre WHERE id_type_chambre=?");

                     $stmt->execute([$id]);
            

                     $obj = $stmt->fetch(PDO::FETCH_OBJ);
            
                     $table['obj_type_chambre']=$obj;


                     return $table;
                }else
                {
                    return false;
                }










                

                
         }
    }
}