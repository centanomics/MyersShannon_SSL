<?php

    class about extends Appcontroller {

        public function __construct($parent) {

            $this->parent=$parent;
            $this->parent->getView('test');

            $this->parent=$parent;
            $data = array();
            $data["pagename"] = "About";
            $data["navigation"] = array("Home" => "/welcome/about", "Form" => "/forms", "About" => "/about");
            $this->parent->getView('header');
            $this->parent->getView("navigation", $data);

            //var_dump($this->parent); 

            // echo 'About Page';
            $this->parent->getView("body");
            // echo 'about';
            $this->parent->getView("footer");

        }

        

    }

?>