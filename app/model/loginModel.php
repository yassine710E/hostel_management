<?php

// Require the base model class
require __DIR__."/../../core/Model.php";

// Model class for handling user login data
class loginModel extends Model
{
    // Static method to validate user credentials
    static function data_validation($username, $password)
    {
        // Get a database connection
        $PDO = self::database_connection();

        if ($PDO) 
        {
            // Prepare the SQL query to check for the user with the provided username and password
            $stmt = $PDO->prepare("SELECT * FROM user_app WHERE username=? AND password=?");

            // Execute the query with the provided username and password
            $stmt->execute([$username, $password]);

            // Check if any matching user is found
            if ($stmt->rowCount() > 0) 
            {
                // Return true if user exists
                return true;                
            }
            else
            {

                // Return false indicating the user was not found
                return false;
            }
        }
    }
}
