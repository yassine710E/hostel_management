<?php


define("ROUTES",
[
    "/"=>["loginController","_login"],

    "/login"=>['loginController',"_login"],

    "/logout"=>['logoutController',"logout"],

    "/error"=>['errorController',"not_found"],

    "/dashboard"=>['dashboardController','dashboard_statistics'],

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
    
    "/types_chambres/consulter"=>['types_chambres_Controller',"consulter_types_chambres"],

    
    //tarifs Chambres
    
    "/tarifs_chambres"=>['tarifs_chambres_Controller',"index_tarifs_chambres"],

    "/tarifs_chambres/add"=>['tarifs_chambres_Controller',"add_tarifs_chambres"],

    "/tarifs_chambres/delete"=>['tarifs_chambres_Controller',"delete_tarifs_chambres"],

    "/tarifs_chambres/modify"=>['tarifs_chambres_Controller','modify_tarifs_chambres'],

    //clients

    "/clients"=>["clients_Controller","index_clients"],

    "/clients/add"=>['clients_Controller',"add_clients"],

    "/clients/delete"=>['clients_Controller',"delete_clients"],

    "/clients/modify"=>['clients_Controller',"modify_clients"],

    "/clients/register"=>['clients_Controller',"register_clients"],

    //chambres
    
    "/chambres"=>['chambres_Controller',"index_chambres"],

    "/chambres/add"=>['chambres_Controller','add_chambres'],

    "/chambres/delete"=>['chambres_Controller',"delete_chambre"],

    "/chambres/modify"=>['chambres_Controller','modify_chambres'],

    //reservations
    
    "/reservations"=>['reservations_Controller',"index_reservations"],
    
    "/reservations/add"=>['reservations_Controller',"add_reservations"],

    "/reservations/validee"=>['reservations_Controller','valider_reservations'],
    
    "/reservations/modify"=>['reservations_Controller','modify_reservations'],

    "/reservations/delete"=>['reservations_Controller','delete_reservations'],

    //error
    "/error"=>['errorController',"_Notfound"]

    



]);

