<?php

// Require the base controller class
require __DIR__."/../../core/Controller.php";


// Require the model for managing room capacities
require __DIR__."/../model/types_chambres_Model.php";

class types_chambres_Controller extends Controller
{
    function index_types_chambres(){

        parent::verifyHomeSession();

        parent::load_view(__FUNCTION__,types_chambres_Model::get_types_chambres());
    }

    function add_types_chambres(){

        parent::verifyHomeSession();

        parent::load_view(__FUNCTION__);

        if ($this->form_validation()) 
        {
           types_chambres_Model::insert_types_chambres($this->form_validation()[0],$this->form_validation()[1],$this->form_validation()[2]);
           
           header("location:/types_chambres");
        }

    }

    function delete_types_chambres($id)
    {
       
       parent::verifyHomeSession();
      
       if (types_chambres_Model::delete_types_chambres($id)) 
       {
        header("location:/public/types_chambres");
       } else
       {
        echo "<script>
        alert('Operation not allowed: type already linked to a room');
        window.location.href = '/types_chambres';
        </script>";
       }
    }

    function modify_types_chambres($id)
    {
        parent::verifyHomeSession();
        
        $obj_type_chambre=types_chambres_Model::get_type_chambre($id);
        
        parent::load_view(__FUNCTION__,$obj_type_chambre);

        $return_type_chambre=$this->form_validation_for_modification($obj_type_chambre->photo_type_chambre);

        if ($return_type_chambre) {

           types_chambres_Model::modify_types_chambres($id,$return_type_chambre[0],$return_type_chambre[1],$return_type_chambre[2]) ;
           
           header("location:/public/types_chambres");
        }




    }

    function consulter_type_chambre($id)
    {
        parent::verifyHomeSession();
        
        if (types_chambres_Model::consulter_type_chambre($id)) 
        {
            parent::load_view(__FUNCTION__,types_chambres_Model::consulter_type_chambre($id));

        }
        else{
            echo "<script>
            alert('Ce type n\'est pas utilisé dans les chambres.');
            window.location.href = '/types_chambres';
            </script>";        
    }}

    function form_validation()
    {
        // Check if the form submission button was clicked
        if (isset($_POST['go'])) 
        {
            // Validate that the capacity number is provided
            if ($_POST['type_chambre'] <> "" and !empty($_FILES['photo']['name'])) 
            {
                $uploadDir = 'C:\xampp\htdocs\hostel_management\public\pictures\types_chambres\\'; // Directory to save the uploaded image
                $fileName = basename($_FILES['photo']['name']);
                $uploadFile = $uploadDir . $fileName;
        
                // Move the uploaded file to the desired directory
                move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile);
                   
                return [
                    $_POST['type_chambre'],
                    $_POST['description_chambre'],
                    $fileName,
                   ];
                

            } else {
                // Print an error message if validation fails
                print "<pre>not valid: The following information is required: type chambre and image</pre>";
                
                // Return false indicating validation failure
                return false;
            }
        }
    }

    function form_validation_for_modification($old_photo){
      
              // Check if the form submission button was clicked
      if (isset($_POST['go'])) 
      {  
        if ($_POST['type_chambre']<>"") 
        {
           
            if (!empty($_FILES['photo']['name'])) {
                $uploadDir = 'C:\xampp\htdocs\hostel_management\public\pictures\types_chambres\\'; // Directory to save the uploaded image
                $old_photo = basename($_FILES['photo']['name']);
                $uploadFile = $uploadDir . $old_photo;
        
                // Move the uploaded file to the desired directory
                move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile);
            }

            return [
                $_POST['type_chambre'],
                $_POST['description_chambre'],
                $old_photo,
               ];
        }else {
                // Print an error message if validation fails
                print "<pre>not valid: The following information is required: type chambre </pre>";
                
                // Return false indicating validation failure
                return false;
            }}
    }
}
