<?php

require __DIR__."/../../core/Controller.php";

require __DIR__."/../model/dashboardModel.php";


class dashboardController extends Controller
{
    function statistics(){

       parent::verifyHomeSession();
       
       
       parent::load_view(__FUNCTION__,dashboardModel::get_statistics());
    }
}