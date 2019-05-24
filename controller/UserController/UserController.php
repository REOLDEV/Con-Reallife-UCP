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

class UserController extends AbstractController { 
    public function execute() {    
        
        $player = Player::bySession($_SESSION["ID"]);
        $userdata = Userdata::byName($player->getName());
    
        if (!isset($_GET["page"])) {
            $_GET["page"] = 'index';
        }
    
        $action = $_GET["page"];
    
        switch ($action) {
            case 'index' : {
                $this->template->addParam("titel", "Startseite");
                $this->template->setContent("view/user/home.php");
                $this->template->render();
                break;
            }
            case 'logout' : {
                session_destroy();
                header("Location: index.php");
                break;
            }
            case 'account' : {

                $this->template->addParam("player", $player);
                $this->template->addParam("userdata", $userdata);
          
                $this->template->addParam("titel", "Accountverwaltung");
                $this->template->setContent("view/user/account.php");
                $this->template->render();                
            }    
            case 'top' : {
                
                if (!isset($_GET["action"])) {
                    $_GET["action"] = "money";
                }
                
                switch ($_GET["action"]) {
                    case "played" : {
                        $this->template->addParam("top",Userdata::topPlayed());
                        $this->template->addParam("desc", "Spielzeit");
                        break;
                    }   
                    case "points" : {
                        $this->template->addParam("top",Userdata::topPoints());
                        $this->template->addParam("desc", "Bonuspunkte");
                        break;
                    }   
                    case "money" : {
                        $this->template->addParam("top",Userdata::topMoney());
                        $this->template->addParam("desc", "Geld");
                        break;
                    }
					default : {
					
					}
				
				}
                
                $this->template->addParam("player", $player);
                $this->template->addParam("userdata", $userdata);
				$this->template->addParam("titel", "Rangliste - ".$this->template->getParam("desc"));
                $this->template->setContent("view/user/top.php");
                $this->template->render();                
            }
			case 'start': {
				$this->template->addParam("titel", "Serveradministration: Start");
                $this->template->setContent("view/admin/start.php");
                $this->template->render();  
			}
			case 'stop': {
				$this->template->addParam("titel", "Serveradministration: Stop");
                $this->template->setContent("view/admin/stop.php");
                $this->template->render();  
			}
            default : {
                $this->template->addParam("titel", "Startseite");
                $this->template->setContent("view/user/home.php");
                $this->template->render();
                break;
            }
        }
    }
}

?>
