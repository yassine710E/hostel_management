<?php

// Require the base controller class
require __DIR__ . "/../../core/Controller.php";

// Require the model for managing room types
require __DIR__ . "/../model/types_chambres_Model.php";

class types_chambres_Controller extends Controller
{

    public $error;
    function index_types_chambres()
    {
        parent::verifyHomeSession();
        parent::load_view(__FUNCTION__, types_chambres_Model::get_types_chambres());
    }

    function add_types_chambres()
    {
        parent::verifyHomeSession();

        $formData = $this->form_validation();
        if ($formData) {
            types_chambres_Model::insert_types_chambres($formData[0], $formData[1], $formData[2]);
            header("location:/types_chambres");
        }
        parent::load_view(__FUNCTION__,['error'=>$this->error]);
    }

    function delete_types_chambres($id)
    {
        parent::verifyHomeSession();
      
        if (types_chambres_Model::delete_types_chambres($id)) {
            header("location:/public/types_chambres");
        } else {
            echo "<script>
                alert('Operation not allowed: type already linked to a room');
                window.location.href = '/types_chambres';
            </script>";
        }
    }

    function modify_types_chambres($id)
    {
        parent::verifyHomeSession();
        
        $obj_type_chambre = types_chambres_Model::get_type_chambre($id);
 

        $formData = $this->form_validation($obj_type_chambre->photo_type_chambre);
        if ($formData) {
            types_chambres_Model::modify_types_chambres($id, $formData[0], $formData[1], $formData[2]);
            header("location:/public/types_chambres");
        }

        $data['info_id']=$obj_type_chambre;
        $data['error']=$this->error;
        parent::load_view(__FUNCTION__, $data);
    }

    function consulter_types_chambres($id)
    {
        parent::verifyHomeSession();
        
        $result = types_chambres_Model::consulter_type_chambre($id);
        if ($result) {
            parent::load_view(__FUNCTION__, $result);
        } else {
            echo "<script>
                alert('Ce type n\'est pas utilisé dans les chambres.');
                window.location.href = '/types_chambres';
            </script>";
        }
    }

    function form_validation($old_photo=null)
    {
        if (isset($_POST['go'])) {
            if ($_POST['type_chambre'] <> "" && (!empty($_FILES['photo']['name']) ||  $old_photo <> null )) {
                
                if (!empty($_FILES['photo']['name'])) 
                {
                    $uploadDir = 'C:\xampp\htdocs\hostel_management\public\pictures\types_chambres\\';
                
                    $old_photo = basename($_FILES['photo']['name']);
    
    
    
                    $uploadFile = $uploadDir . $old_photo;
            
                    move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile);                }
                

                   
                return [
                
                    $_POST['type_chambre'],
                
                    $_POST['description_chambre'],
                
                    $old_photo,
                ];
            } else {
                $this->error="Not valid: The following information is required: type chambre and image";
                
                return false;
            }
        }
    }

}
