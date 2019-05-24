<?php

/*
 * Objektorientiertes, Model View Controll Framework
 * OOP, MVC, PDO Framework
 * Written by Danny T (ReWrite)
 * All rights reserved!
 * 
 * 
 * Please do not remove this Copyrights. The endusers will not see them.
 * Thank you !
 */
 
require_once 'controller/UserController/UserController.php';

class AdminController extends AbstractController{   
    public function execute() {
        if (isset ($_GET["page"])) {
            $action = $_GET["page"];
        }
        else {
            $action = "home";
        }
    
        
        switch ($action) {
            case "check" : {              
                if (isset($_POST["checkname"])) {
                    $check_player = Player::byName($_POST["checkname"]);
                    $check_userdata = Userdata::byName($_POST["checkname"]);
                    if (is_Object($check_player) ) {
                        $this->template->addParam("check_player", $check_player);
                        $this->template->addParam("check_userdata",$check_userdata);
                        $this ->template->addParam("check_multiaccounts", Player::allBySerial($check_player->getSerial()));
                    }                
                    else{
                        $this->template->addParam("errormessage", "Dieser Spieler existiert nicht! Versuchen sie es erneut!");
                    }
                }
                $this->template->addParam("titel", "Spieler überprüfen");
                $this->template->setContent('view/admin/check.php');
                $this->template->render();
                break;
             }
            default : {
                $controller = new UserController($this->template);
                $controller->execute();
            }    
                break;
        }
    }
}

?>
