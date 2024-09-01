<?php

require __DIR__."/../../core/Controller.php";

require __DIR__."/../model/capaciter_chambre_Model.php";


class capacite_chambre_Controller extends Controller
{
    function index_capacite_chambre()
    {    
         parent::verifyHomeSession();

         parent::load_view(__FUNCTION__,capaciter_chambre_Model::get_capacity_rooms());
    }

    function delete_capacite_chambre($id)
    {
        if (capaciter_chambre_Model::delete_capacite($id)) 
        {
            header("location:/public/capacite_chambre");
        
        } else {
        
            // Display the alert and then redirect using JavaScript
            echo "<script>
                    alert('Operation not allowed: Capacity already linked to a room');
                    window.location.href = '/public/capacite_chambre';
                  </script>";
        
                }
        
    }

    function add_capacite_chambre(){
        
        parent::verifyHomeSession();

        parent::load_view(__FUNCTION__);

        if ($this->form_validation()) 
        {
             
            capaciter_chambre_Model::insert_capacite($this->form_validation()[0],$this->form_validation()[1]);

            header("location:/public/capacite_chambre");

            
        }
    }

    function form_validation(){

        if (isset($_POST['go'])) 
        {
            if($_POST['numero_capacite']<>"")
            {
            
                return [$_POST['titre_capacite'],$_POST['numero_capacite']];
            }else {
                print "<pre>not valid :The following information is required: Capacity number</pre>";
                    
                return false;
            }

        }
    }

    function modify_capacite_chambre($id){
             parent::verifyHomeSession();

             parent::load_view(__FUNCTION__,capaciter_chambre_Model::get_capacity_room($id));


             if ($this->form_validation()) 
             {
                capaciter_chambre_Model::modify_capacite($id,$this->form_validation()[0],$this->form_validation()[1]);

                header("location:/public/capacite_chambre");

             }



    }
    

}
