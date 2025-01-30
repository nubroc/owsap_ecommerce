<?php
$page = $_GET['page'] ?? 'home' ; 


switch($page){
    case 'home':
        $homecontroller = new HomeController();
        $homecontroller->index();
        break;

     case 'inscription' :
         $registerController = new  RegisterController();
         break;


        default : echo " error 404 page " ; 
}
