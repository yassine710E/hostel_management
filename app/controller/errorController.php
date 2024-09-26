<?php

// Require the base controller class
require __DIR__."/../../core/Controller.php";


class errorController extends Controller
{
  function _Notfound()
  {
    parent::load_view(__FUNCTION__);


  }
}