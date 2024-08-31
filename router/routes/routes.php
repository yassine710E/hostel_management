<?php


define("ROUTES",
[
    "/"=>["loginController","login"],

    "/login"=>['loginController',"login"],

    "/logout"=>['logoutController',"logout"],

    "/error"=>['errorController',"not_found"],

    "/dashboard"=>['dashboardController','statistics']
]);

