<?php

// Require the base controller class
require __DIR__ . "/../../core/Controller.php";

// Require the model for managing room capacities
require __DIR__ . "/../model/tarifs_chambres_Model.php";

class tarifs_chambres_Controller extends Controller
{
    public $error="";

    function index_tarifs_chambres()
    {
        parent::verifyHomeSession();
        parent::load_view(__FUNCTION__, tarifs_chambres_Model::get_tarifs_chambres());
    }

    function add_tarifs_chambres()
    {
        parent::verifyHomeSession();
        

        $formData = $this->form_validation();
        if ($formData) {
            tarifs_chambres_Model::add_tarifs_chambres($formData[0], $formData[1], $formData[2], $formData[3]);
            header("location:/tarifs_chambres");
        }
        parent::load_view(__FUNCTION__,['error'=>$this->error]);
    }

    function delete_tarifs_chambres($id)
    {
        parent::verifyHomeSession();
      
        if (tarifs_chambres_Model::delete_tarifs_chambres($id)) {
            header("location:/public/tarifs_chambres");
        } else {
            echo "<script>
                alert('Operation not allowed: type already linked to a room');
                window.location.href = '/tarifs_chambres';
            </script>";
        }
    }

    function modify_tarifs_chambres($id)
    {
        parent::verifyHomeSession();

        $formData = $this->form_validation();
        if ($formData) {
            tarifs_chambres_Model::modify_tarifs_chambres($id, $formData[0], $formData[1], $formData[2], $formData[3]);
            header("location:/public/tarifs_chambres");
        }
        
        $page_data['info_id']= tarifs_chambres_Model::get_tarif_chambre($id);
        
        $page_data['error']=$this->error;
        
        parent::load_view(__FUNCTION__,$page_data);


    }

    function form_validation()
    {
        if (isset($_POST['go'])) {
            if (
                is_numeric($_POST['prix_base_nuit']) &&
                is_numeric($_POST['prix_base_passage']) 
            ) {
                $_POST['N_prix_nuit']=$_POST['N_prix_nuit']==""?0:$_POST['N_prix_nuit'];

                $_POST['N_prix_passage']=$_POST['N_prix_passage']==""?0:$_POST['N_prix_passage'];
                

                return [
                    $_POST['prix_base_nuit'],
                    $_POST['prix_base_passage'],
                    $_POST['N_prix_nuit'],
                    $_POST['N_prix_passage']
                ];
            } else {
            $this->error= " Form not valid. Please try again. ";
                return false;
            }
        }
    }
}
