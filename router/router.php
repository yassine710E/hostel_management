<?php

require __DIR__."/routes/routes.php";



class Router
{
    static $controller;

    static $method;

    static $args=[];

    
    static function route()
    {
         $URI=$_SERVER['REQUEST_URI'];

         if (strpos($URI,"/public")===0) 
         {
             $URI=substr($URI,strlen("/public"));
         }


         if (isset(ROUTES[$URI])) 
         {
                  self::$controller=ROUTES[$URI][0];

                  self::$method=ROUTES[$URI][1];
                 
                 
                  require __DIR__."/../app/controller/".self::$controller.".php";

                  if (method_exists(self::$controller,self::$method)) 
                  { 
                
                    call_user_func_array([new(self::$controller),self::$method],self::$args);
                  
                  }
                  
         }
         else
         {
             header("location:/public/error");
         }

        
    }

}

