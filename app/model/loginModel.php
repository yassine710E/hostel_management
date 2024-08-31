<?php

require __DIR__."/../../core/Model.php";


class loginModel extends Model
{
    static function data_validation($username,$password)
    {
          $PDO=self::database_connection();
          
          if ($PDO) 
          {
            $stmt=$PDO->prepare("SELECT *  FROM  user_app WHERE username=? and password=?");
            
            $stmt->execute([$username,$password]);

            if ($stmt->rowCount()>0) 
            {
                    return true;                
            }
            else{
                print "<pre>not valid :User Not Found Try Again</pre>";

                return false;
            }
          }
    }
}