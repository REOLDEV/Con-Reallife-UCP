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
 
require_once 'controller/abstractcontroller.php';

require_once 'class/template.php';

require_once 'controller/AdminController/AdminController.php';
require_once 'controller/UserController/UserController.php';

/* Model Klassen */
require_once 'model/player.php';
require_once 'model/userdata.php';

class FrontController extends AbstractController {
    
    public function execute() {
        if (isset($_SESSION["ID"])) {
            $player = Player::bySession($_SESSION["ID"]);
            $userdata = Userdata::byName($player->getName());
            
            if ($userdata->getAdminlevel() > 0) {
                $controller = new AdminController($this->template);
                $controller->execute();
            }
            else
            {
                $controller = new UserController($this->template);           
                $controller->execute();                
            }                  
            
        }
        else
        {
            if (!isset($_POST["login"])) {
                $this->template->addParam("titel", "Login");
                $this->template->setContent('view/user/login.php');
                $this->template->render();
            } 
            else {
                $name = $_POST["login-uname"];
                $pass = $_POST["login-passwort"];
                $player = Player::byName($name);
	
                if(is_Object($player) ) {
                    if (strtoupper(md5($pass.$player->getSalt())) == strtoupper($player->getPasswort()) ) {
                        $_SESSION["ID"] = $player->getName();
                        $this->template->addParam("titel", "Startseite");
                        $this->template->setContent('view/user/home.php');
                        $this->template->render();
                        return;
                    }
                    else {
                        $error = 1;
                    }
                }               
                else {
                    $error = 1;
                }
                $this->template->addParam("titel", "Login");
                $this->template->addParam("errormessage", "Es wurde ein ungültiger Benutzername oder ein ungültiges Passwort angegeben!");
                $this->template->setContent('view/user/login.php');
                $this->template->render();
            }
        }
    }
    
}

?>