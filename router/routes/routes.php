<?php


define("ROUTES",
[
    "/"=>["loginController","login"],

    "/login"=>['loginController',"login"],

    "/logout"=>['logoutController',"logout"],

    "/error"=>['errorController',"not_found"],

    "/dashboard"=>['dashboardController','statistics'],

    //capacite chambre :
    
    "/capacite_chambre"=>['capacite_chambre_Controller',"index_capacite_chambre"],

    "/capacite_chambre/delete"=>['capacite_chambre_Controller','delete_capacite_chambre'],

    "/capacite_chambre/add"=>['capacite_chambre_Controller','add_capacite_chambre'],

    "/capacite_chambre/modify"=>["capacite_chambre_Controller","modify_capacite_chambre"],

    //types chambres

    "/types_chambres"=>['types_chambres_Controller',"index_types_chambres"],
    
    "/types_chambres/add"=>['types_chambres_Controller',"add_types_chambres"],

    "/types_chambres/delete"=>['types_chambres_Controller',"delete_types_chambres"],

    "/types_chambres/modify"=>['types_chambres_Controller',"modify_types_chambres"],
    
    "/types_chambres/consulter"=>['types_chambres_Controller',"consulter_type_chambre"],

    
    //tarifs Chambres
    
    "/tarifs_chambres"=>['tarifs_chambres_Controller',"index_tarifs_chambres"],

    "/tarifs_chambres/add"=>['tarifs_chambres_Controller',"add_tarifs_chambres"],

    "/tarifs_chambres/delete"=>['tarifs_chambres_Controller',"delete_tarifs_chambres"],

    "/tarifs_chambres/modify"=>['tarifs_chambres_Controller','modify_tarifs_chambres']

]);

