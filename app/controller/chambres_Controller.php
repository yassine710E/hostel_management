<?php

use function PHPSTORM_META\type;

require __DIR__."/../../core/Controller.php";

require __DIR__.'/../model/chambres_Model.php';

class chambres_Controller extends Controller
{
    function index_chambres()
    {
       
        parent::verifyHomeSession();

        $chambres=chambres_Model::get_chambres();

        

        $searchData=self::search_validation_form();

        if ($searchData) 
        {
          if(chambres_Model::search_chambre($searchData))
          {
             
            $chambres=chambres_Model::search_chambre($searchData);

          };
        
        


        }

        parent::load_view(__FUNCTION__,$chambres);

    }

    function add_chambres()
    {
       parent::verifyHomeSession();
       
       parent::load_view(__FUNCTION__,chambres_Model::get_capacite_prix_and_type());

       if ($this->form_validation()) 
       {
          chambres_Model::insert_chambre($this->form_validation());
          
          header("location:/chambres");
       }


    }

    function delete_chambre($id)
    {

       parent::verifyHomeSession();

       if (chambres_Model::delete_chambre($id)) 
       {
        header("location:/chambres");
       }else 
       {
        echo "<script>
              alert('Operation not allowed: chambre already linked to a rservation');
              window.location.href = '/public/chambres';
              </script>";
       }
    }

    function modify_chambre($id)
    {
       
      parent::verifyHomeSession();

       
      parent::load_view(__FUNCTION__,chambres_Model::get_chambre($id));

       
      $chambre=(chambres_Model::get_chambre($id))['chambre'];

     


       if ($this->form_validation($chambre->photo_chambre)) 
       {
           
        chambres_Model::modify_chambre($id,$this->form_validation($chambre->photo_chambre));

        header("location:/chambres");   
       }


    }





    function form_validation($old_photo = "")
    {
        if (isset($_POST['go'])) {

            if (!empty($_POST['numero_chambre']) && !empty($_POST['nombre_adultes_enfants_ch']) && 
                !empty($_POST['etage_chambre']) && !empty($_POST['nbr_lits_chambre']) && 
                (!empty($_FILES['photo_chambre']['name']) || $old_photo !== null)) 
                {
                
                // Check if a new photo has been uploaded
                if (!empty($_FILES['photo_chambre']['name'])) 
                {
                    $uploadDir = 'C:\xampp\htdocs\hostel_management\public\pictures\chambres\\';

                    $old_photo = basename($_FILES['photo_chambre']['name']);
                    
                    $uploadFile = $uploadDir . $old_photo;
    
                    // Attempt to upload the file
                    move_uploaded_file($_FILES['photo_chambre']['tmp_name'], $uploadFile);
                }
                // If no new photo is uploaded, keep the old photo name
                $renfort_chambre = isset($_POST['renfort_chambre']) ? $_POST['renfort_chambre'] : 0;
    
                // Return all form data as an array
                return [
                    $_POST['id_type_chambre'],
                    $_POST['id_capacite'],
                    $_POST['id_tarif'],
                    $_POST['numero_chambre'],
                    $_POST['nombre_adultes_enfants_ch'],
                    $renfort_chambre,
                    $_POST['etage_chambre'],
                    $_POST['nbr_lits_chambre'],
                    $old_photo,  // Keep the old photo if a new one is not uploaded
                ];
            } else {
                // If required fields are not filled in, print an error message
                print "<pre>Not valid: The following information is required: Numéro de la chambre, Type de la chambre, Capacité de la chambre, Nombre
                    de lits, Etage, Nombre des personnes de la chambre (Adultes /Enfants), Prix de
                    la chambre</pre>";
                return false;
            }
        }
    }

        
    static  function search_validation_form()
    {
        if (isset($_POST['search'])) 
        {    
            $data_return = [];


        
            // Collect search criteria
            if (!empty($_POST['numero_chambre'])) 
            {
                $data_return["numero_chambre"] = $_POST['numero_chambre'];
            }
    
            if (!empty($_POST['type_chambre'])) 
            {
                $data_return["type_chambre"] = $_POST['type_chambre'];
            }

            if ($_POST['numero_capacite']<>"") 
            {
                $data_return['numero_capacite']=$_POST['numero_capacite'];
            }
    

    
            // Return search criteria if any is provided, otherwise return false
            if (count($data_return) > 0) 
            {
                return $data_return;
            } 
            else 
            {
                return false;
            }
        }
    }
    
    
    
}
