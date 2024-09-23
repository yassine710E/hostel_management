<?php
require __DIR__."/../../core/Controller.php";

// Require the model for managing room capacities
require __DIR__."/../model/reservations_Model.php";

class reservations_Controller extends Controller
{

    static $error;
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



    function valider_reservations($id_chambre,$id_client,$Code_reservation,$date_depart,$date_arrivee,$nbr_adultes_enfants,$id_reservation=null)
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
                if ($id_reservation==null) 
                {
                    reservations_Model::insert_reservation($exe);
                }
                else {
                    array_push($exe,$id_reservation);
                    unset($exe[3]);
                    $exe=array_values($exe);
                

                    reservations_Model::modify_reservation($exe);
                    
                }
                header("location:/reservations");
            }
              
         
       
   
  

    function add_reservations()
    {
          parent::verifyHomeSession();


          $form_data=self::form_validation();

          $page_data['info']=reservations_Model::get_data();

          if ($form_data) 
          { 
         

            if (reservations_Model::find_room($form_data['execute'])) 
            {
       
                $page_data['info']=reservations_Model::find_room($form_data['execute']);

                

                
              
            }
          
          }

            
          $page_data['error']=self::$error;


          parent::load_view(__FUNCTION__,$page_data);

}

    static function form_validation($date_depart="" , $date_arrivee="" ,$nbr_adultes_enfants="" ,$id_type_chambre="")
    {
        if ($_SERVER['REQUEST_METHOD']=="POST") 
        {
            
            $today = date('Y-m-d');
            if ($_POST['date_depart']<>"" and $_POST['date_arrivee']<>"" and $_POST['nbr_adultes_enfants']<>"" and $_POST['Code_reservation']<>"" ){
            if($_POST['date_depart']<>$date_depart or $_POST['date_arrivee']<>$date_arrivee or $_POST['nbr_adultes_enfants']<>$nbr_adultes_enfants or $_POST['id_type_chambre']<>$id_type_chambre )  {
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
                   self::$error="LA DATE N'EST PAS LOGIQUE";
                   return false;
                }
            }
           else {
            self::$error="room not found ";
           }
        }
            else{
                   self::$error="LE FORMULAIRE EST OBLIGATOIRE";
                   return false;
            }

        }
    }

    function delete_reservations($id)
    {
      parent::verifyHomeSession();

      reservations_Model::delete_reservation($id);

      header("location:/reservations");
      
      
    }

    function modify_reservations($id)
    {
       parent::verifyHomeSession();

       $page_data['info']=reservations_Model::get_more_data($id);
       
       $obj=$page_data['info']['table_chambre'][0];

       $form_data=self::form_validation($obj->date_depart,$obj->date_arrivee,$obj->nbr_adultes_enfants,$obj->id_type_chambre);

       if ($form_data) 
       {
          if (reservations_Model::find_room($form_data['execute'])) 
          {
            $page_data['info']=reservations_Model::find_room($form_data['execute']);
            $page_data['info']['id']=$id;
          }
       }
       $page_data['error']=self::$error;
       parent::load_view(__FUNCTION__,$page_data);





    }



}

?>