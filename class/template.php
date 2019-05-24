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

class Template {

    private $baseView;
    private $content;
    private $params;
    
    public function __construct($content = "404 - Seite nicht gefunden!",$baseView = "view/base.php") {
        $this->baseView = $baseView;
        $this->content = $content;
    }

    public function render() {
        require_once $this->baseView;
    }
    
    public function addParam($key, $value) {
        $this->params[$key] = $value;
        
    }
    
    public function getParam($key) {
        return $this->params[$key];
        
    }
    
    public function getBaseView() {
        return $this->baseView;
    }

    public function setBaseView($baseView) {
        $this->baseView = $baseView;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getParams() {
        return $this->params;
    }

    public function setParams($params) {
        $this->params = $params;
    }



}

?>