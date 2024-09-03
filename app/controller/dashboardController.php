<?php

// Require the base controller class
require __DIR__."/../../core/Controller.php";

// Require the model for managing dashboard data
require __DIR__."/../model/dashboardModel.php";

// Controller class for managing the dashboard
class dashboardController extends Controller
{
    // Method to display statistics on the dashboard
    function statistics()
    {
        // Verify user session for accessing the home page
        parent::verifyHomeSession();

        // Load the statistics view with data from the model
        parent::load_view(__FUNCTION__, dashboardModel::get_statistics());
    }
}
