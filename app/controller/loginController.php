<?php

require __DIR__."/../../core/Controller.php";

require __DIR__."/../model/loginModel.php";

class loginController extends Controller
{
    function login()
    {
        parent::verifySession();

        parent::load_view(__FUNCTION__);   
       
       if ($this->form_validation()) 
       {
           if (loginModel::data_validation($this->form_validation()[0],$this->form_validation()[1]))
           {
              parent::set_session($this->form_validation()[0]);
              
              header("location:/public/dashboard");
           }
       }

  
    }

    function form_validation()
    {
        if (isset($_POST['go'])) 
        {
                if ($_POST['username']<>"" and $_POST['password']<>"") 
                {
                         return [$_POST['username'],$_POST['password']];
                }else{
                    
                    print "<pre>not valid :fill all info </pre>";
                    
                    return false;
                }    
        }
    }
}