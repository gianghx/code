<?php
class logout extends controller
{
   function __construct()
   {
       parent::__construct();
   }

   function index()
   {
       session_destroy();
       header('Location: ' . URL);
   }
}
?>
