<?php

// Require the base controller class
require __DIR__."/../../core/Controller.php";

// Require the model for managing room capacities
require __DIR__."/../model/capaciter_chambre_Model.php";

// Controller class for managing room capacities
class capacite_chambre_Controller extends Controller
{    
    public $error='';
    // Method to display the list of room capacities
    function index_capacite_chambre()
    {    
        // Verify user session for accessing the home page
        parent::verifyHomeSession();

        // Load the view and pass the list of room capacities from the model
        parent::load_view(__FUNCTION__, capaciter_chambre_Model::get_capacity_rooms());
    }

    // Method to delete a room capacity by its ID
    function delete_capacite_chambre($id)
    {
        // Attempt to delete the capacity
        if (capaciter_chambre_Model::delete_capacite($id)) 
        {
            // Redirect to the capacities page if successful
            header("location:/public/capacite_chambre");
        } else {
            // If deletion is not allowed, show an alert and redirect
            echo "<script>
                    alert('Operation not allowed: Capacity already linked to a room');
                    window.location.href = '/public/capacite_chambre';
                  </script>";
        }
    }

    // Method to add a new room capacity
    function add_capacite_chambre()
    {
        // Verify user session for accessing the home page
        parent::verifyHomeSession();


        // Validate the form input
        if ($this->form_validation()) 
        {
            // Insert the new capacity if the form is valid
            capaciter_chambre_Model::insert_capacite($this->form_validation()[0], $this->form_validation()[1]);

            // Redirect to the capacities page
            header("location:/public/capacite_chambre");
        }

                // Load the add capacity view
                parent::load_view(__FUNCTION__,['error'=>$this->error]);

    }

    // Method to modify an existing room capacity
    function modify_capacite_chambre($id)
    {
        // Verify user session for accessing the home page
        parent::verifyHomeSession();

        // Load the modify capacity view with the capacity details

        // Validate the form input
        if ($this->form_validation()) 
        {
            // Update the capacity details if the form is valid
            capaciter_chambre_Model::modify_capacite($id, $this->form_validation()[0], $this->form_validation()[1]);

            // Redirect to the capacities page
            header("location:/public/capacite_chambre");
        }
        $room_info['info_id']=capaciter_chambre_Model::get_capacity_room($id);
        
        $room_info['error']=$this->error;
        
         parent::load_view(__FUNCTION__, $room_info);

    }

    // Method to validate the form input for adding or modifying capacities
    function form_validation()
    {
        // Check if the form submission button was clicked
        if (isset($_POST['go'])) 
        {
            // Validate that the capacity number is provided
            if ($_POST['numero_capacite'] <> "") 
            {
                // Return the validated capacity title and number
                return [$_POST['titre_capacite'], $_POST['numero_capacite']];
            } else {
                // Print an error message if validation fails
                $this->error="not valid: The following information is required: Capacity number";
                
                // Return false indicating validation failure
                return false;
            }
        }
    }
}
