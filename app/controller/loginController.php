<?php

// Require the base controller class
require __DIR__."/../../core/Controller.php";

// Require the model for managing login data
require __DIR__."/../model/loginModel.php";

// Controller class for handling user login
class loginController extends Controller
{
    public $error;
    // Method to handle user login
    function _login()
    {
        // Verify if the user session already exists
        parent::verifySession();

        
         // Validate form input
        if ($this->form_validation() ) 
        {
            // Check credentials using the login model
            if (loginModel::data_validation($this->form_validation()[0], $this->form_validation()[1]))
            {
                // Set the user session upon successful login
                parent::set_session($this->form_validation()[0]);

                // Redirect to the dashboard after login
                header("location:/public/dashboard");
            }
            else
            {
                $this->error="User Not Found";
;    
            }
        }
  

       
         // Load the login view
         parent::load_view(__FUNCTION__,["error"=>$this->error]);              
 
    }

    // Method to validate form inputs
    function form_validation()
    {
        // Check if the form has been submitted
        if (isset($_POST['go'])) 
        {
            // Ensure that both username and password fields are filled
            if ($_POST['username'] <> "" && $_POST['password'] <> "") 
            {
                // Return the validated username and password
                return [$_POST['username'], $_POST['password']];
            } else {
                $this->error ="Fill All Info";
                // Return false indicating validation failure
                return false;
            }    
        }
    }
}
