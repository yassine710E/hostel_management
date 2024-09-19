<?php
require __DIR__."/../../core/Controller.php";

// Require the model for managing room capacities
require __DIR__."/../model/reservations_Model.php";

class reservations_Controller extends Controller
{
    function index_reservations()
    {
        parent::verifyHomeSession();

        reservations_Model::update_reservations();

        $index_data=reservations_Model::get_data();
 
        if (self::search_validation_form()) 
        {
           if (reservations_Model::search_reservation(self::search_validation_form())) 
           {
            $index_data=reservations_Model::search_reservation(self::search_validation_form());
           }
        }

        parent::load_view(__FUNCTION__,$index_data);




        
    }

    static function search_validation_form()
    {
        if (isset($_POST['search'])) 
        {
            $search_data=[];



            $_POST['date_debut']=$_POST['date_debut']==""?date("Y-m-d"):$_POST['date_debut'];
           
            $_POST['date_fin']=$_POST['date_fin']==""?date("Y-m-d"):$_POST['date_fin'];

            if ($_POST['date_debut']<$_POST['date_fin']) 
            {
              
              $search_data['date_debut']=$_POST['date_debut'];

              $search_data['date_fin']=$_POST['date_fin'];
              
            }
            if (isset($_POST['numero_chambre'])) 
            {
                $search_data['numero_chambre']=$_POST['numero_chambre'];
  
            }
            if (isset($_POST['nom_complet'])) 
            {
                $search_data['nom_complet']=$_POST['nom_complet'];
  
            }
            
            if (count($search_data)>0) 
            {
                return $search_data;
            }else 
            {
                return false;
            }

        }

    }

    function valid_reservation()
    {
        if ($_POST['id_chambre']<>"") 
        {
          
           

          $_POST['id_chambre'];
        }
        else
        {
            return false;
        }
 
    }

    function valider_reservation($id_chambre,$id_client,$Code_reservation,$date_depart,$date_arrivee,$nbr_adultes_enfants)
    {
        
                $dateDepart = new DateTime($date_depart);
                $dateArrivee = new DateTime($date_arrivee);

                $interval = $dateDepart->diff($dateArrivee);

                $nombreDeJours = $interval->days;

                $currentDate = new DateTime();
                $etat = "";

                if ($currentDate < $dateDepart && $currentDate < $dateArrivee) {
                    $etat = "Planifiee";
                } elseif ($currentDate >=$dateArrivee  && $currentDate <= $dateDepart) {
                    $etat = "En cours";
                } elseif ($currentDate > $dateArrivee && $currentDate > $dateDepart ) {
                    $etat = "Terminee";
                }

                $obj_chambre_et_tarif=reservations_Model::get_chambre_and_tarif($id_chambre);
                $prix_nuit=$obj_chambre_et_tarif->N_prix_nuit>0?$obj_chambre_et_tarif->N_prix_nuit:$obj_chambre_et_tarif->prix_base_nuit;
                $mantant_total=$prix_nuit*$nombreDeJours;
                $exe=
                [
                    $id_chambre,
                    $id_client,
                    $Code_reservation,
                    date('Y-m-d H:i:s'),
                    $date_arrivee,
                    $date_depart,
                    $nombreDeJours,
                    $nbr_adultes_enfants,
                    $mantant_total,
                    $etat
                ];
                print "<pre>";
                print_r($exe);
                print "</pre>";
                reservations_Model::insert_reservation($exe);
                header("location:/reservations");
            }
              
         
       
   
  

    function add_reservations()
    {
          parent::verifyHomeSession();

          $page_data=reservations_Model::get_data();


          $form_data=self::form_validtion();


          if ($form_data) 
          { 
         

            if (reservations_Model::add_reservation($form_data['execute'])) 
            {
       
                $page_data=reservations_Model::add_reservation($form_data['execute']);

                

                
              
            }
          
          }

            


          parent::load_view(__FUNCTION__,$page_data);

                    


          


          


    }

    static function form_validtion()
    {
        if ($_SERVER['REQUEST_METHOD']=="POST") 
        {
            
            $today = date('Y-m-d');
            if ($_POST['date_depart']<>"" and $_POST['date_arrivee']<>"" and $_POST['nbr_adultes_enfants']<>"" and $_POST['Code_reservation']<>"" ) {
                if ($_POST['date_depart']> $_POST['date_arrivee'] and $_POST['date_arrivee']>=$today ) {
                         
                      return[
                        "execute"=>[$_POST['date_depart'],
                                    $_POST['date_arrivee'],
                                    $_POST['id_type_chambre'],
                                    $_POST['nbr_adultes_enfants']-1,
                                    1,
                                    $_POST['nbr_adultes_enfants']],

                        "id_client"=>$_POST['id_client'],

                        "Code_reservation"=>$_POST['Code_reservation'],
                        ] ;  

                  
                }
                else{
                   print "<pre>LA DATE N'EST PAS LOGIQUE</pre>";
                   return false;
                }
            }
            else{
                   print "<pre>LE FORMULAIRE EST OBLIGATOIRE</pre>";
                   return false;
            }

        }
    }




}

?>