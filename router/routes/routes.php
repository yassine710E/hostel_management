<?php


define("ROUTES",
[
    "/"=>["loginController","login"],

    "/login"=>['loginController',"login"],

    "/logout"=>['logoutController',"logout"],

    "/error"=>['errorController',"not_found"],

    "/dashboard"=>['dashboardController','statistics'],
    
    "/capacite_chambre"=>['capacite_chambre_Controller',"index_capacite_chambre"],

    "/capacite_chambre/delete"=>['capacite_chambre_Controller','delete_capacite_chambre'],

    "/capacite_chambre/add"=>['capacite_chambre_Controller','add_capacite_chambre'],

    "/capaciter_chambre/modify"=>["capacite_chambre_Controller","modify_capacite_chambre"]


]);

