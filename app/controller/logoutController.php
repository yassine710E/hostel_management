<?php

class logoutController 
{
    function logout(){

         session_start();
        
         session_destroy();
        
         header("location:/public/");
        
         exit();

    }
}