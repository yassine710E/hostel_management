<?php

// Require the base controller class
require __DIR__."/../../core/Controller.php";

//require the clients  Model
require __DIR__.'/../model/clients_Model.php';


class clients_Controller extends Controller
{

    public $error='';
    function index_clients()
    {
        parent::verifyHomeSession();
    
        // Initialize clients with the default full list
        $clients = clients_Model::get_clients();
    
        // Perform the search if the form is validated
        $searchCriteria = $this->search_validation_form();
        
        if ($searchCriteria) 
        {
            // If there are search results, update the $clients with search results
            $searchResults = clients_Model::search_client($searchCriteria);
            
            if ($searchResults) 
            {
                $clients = $searchResults;
            }
        }
    
        // Load the view with either the full list or the search results
        parent::load_view(__FUNCTION__, $clients);
    }
    
    
    function search_validation_form()
    {
        if (isset($_POST['search'])) 
        {    
            $data_return = [];
        
            // Collect search criteria
            if (!empty($_POST['nom_complet'])) 
            {
                $data_return["nom_complet"] = $_POST['nom_complet'];
            }
    
            if (!empty($_POST['pays'])) 
            {
                $data_return["pays"] = $_POST['pays'];
            }
    
            if (!empty($_POST['ville'])) 
            {
                $data_return["ville"] = $_POST['ville'];
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

    function add_clients()
    {
        parent::verifyHomeSession();


        if ($this->form_validation()) 
        {
            clients_Model::insert_client($this->form_validation());
        
            header('location:/clients');
        }

        parent::load_view(__FUNCTION__,['error'=>$this->error]);

         
    }

    function form_validation()
    {

        if (isset($_POST['go'])) 
        {
            if ($_POST['nom_complet']<>"" and $_POST['pays']<>"" and $_POST['ville']<>"" and $_POST['telephone']<>"") 
            {
               if (is_numeric($_POST['telephone'])) 
               {
                $table=$_POST;
                unset($table['go']);

                return $table;
               }
               else
               {
                $this->error="telephone est un numero";
                return false;
               }
            }
            else
            {
                $this->error="Les infos suivantes sont obligatoire : Nom du client, Pays de client, Ville de client, Numéro de téléphone de client.";
                return false;
            }
        }

    }

    function delete_clients($id)
    {
       parent::verifyHomeSession();

       if (clients_Model::delete_client($id))
       {
        header('location:/clients');
       }else 
       {
        echo "<script>
        alert('Operation not allowed: client already linked to a reservation');
        window.location.href = '/public/clients';
      </script>";
       }
       

    }

    function modify_clients($id)
    {
        parent::verifyHomeSession();

 


        if ($this->form_validation()) 
        {
            clients_Model::modify_client($this->form_validation(),$id);
            header('location:/clients');

        }
        $page_data['info_id'] = clients_Model::get_client($id);
        $page_data['error'] = $this->error ;
        parent::load_view(__FUNCTION__,$page_data);


    }

    function register_clients()
    {
        parent::verifyHomeSession();
    
        // Get the initial list of clients
        $clients = clients_Model::get_register_of_clients();
    
        // Validate the search form data
        $formSearchData = $this->register_validation_form();
    
        if ($formSearchData) 
        {
            
            if (clients_Model::search_client_register($formSearchData)) 
            {
                $clients =clients_Model::search_client_register($formSearchData)  ;           
            }
        }
    
        // Load the view with the resulting clients data
        parent::load_view(__FUNCTION__, $clients);
    }
    
    function register_validation_form()
    {
        if (isset($_POST['search'])) 
        {
            $data_returned = [];
    
            $_POST['date_debut'] = $_POST['date_debut'] == "" ? date('Y-m-d') : $_POST['date_debut'];
            $_POST['date_fin'] = $_POST['date_fin'] == "" ? date('Y-m-d') : $_POST['date_fin'];
    
            if ($_POST['nom_complet'] != "") 
            {
                $data_returned['nom_complet'] = $_POST['nom_complet'];
            }
    
            if ($_POST['date_debut'] < $_POST['date_fin']) 
            {
                $data_returned['date_debut'] = $_POST['date_debut'];
                $data_returned['date_fin'] = $_POST['date_fin'];
            }
    
            if (!empty($data_returned)) 
            {
                return $data_returned;
            } 
            else 
            {
                return false;
            }
        }
    }
}
