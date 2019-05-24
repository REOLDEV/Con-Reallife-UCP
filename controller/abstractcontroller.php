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

abstract class AbstractController {
    
    protected $template; 
    public function __construct($template) {
        $this->template = $template;
    }
    
    public abstract function execute();
}
?>