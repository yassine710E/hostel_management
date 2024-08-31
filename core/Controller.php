<?php


class Controller
{
    static function load_view($page,$data=[])
    {
          //self::session_verification();
          
          require __DIR__."/../app/view/".$page.".php";

         
    }


    static function set_session($username)
    {
        session_start();
    
        $_SESSION["user"]=$username;
    }


    static function verifySession()
    {
        session_start();

        // If the user is already logged in, redirect to the dashboard or any other protected page
        
        if (isset($_SESSION['user'])) 
        {

            header("location:/public/dashboard");
            
            exit();
        }
    }

    static function verifyHomeSession()
    {
            // Start the session
            session_start();
            
            // Check if the user session is set
            if (!isset($_SESSION['user'])) 
            {
                // If the session is not set, redirect to the login page
                header("Location:/public/login");
                exit(); // Stop further script execution
            }
    }

    
}