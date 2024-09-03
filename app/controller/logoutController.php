<?php


// Controller class for handling user logout
class logoutController 
{
    // Method to handle user logout
    function logout()
    {
        // Start the session (required to access session data)
        session_start();
        
        // Destroy the session to log the user out
        session_destroy();
        
        // Redirect the user to the home page (or login page)
        header("location:/public/");
        
        // Ensure no further code is executed after redirection
        exit();
    }
}
