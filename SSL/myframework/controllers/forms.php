<?php

    class forms extends Appcontroller {

        public function __construct($parent) {

            $this->parent=$parent;
            $this->parent->getView('test');

            $this->parent=$parent;
            $data = array();
            $data["pagename"] = "Form";
            $data["navigation"] = $this->parent->nav;
            $this->parent->getView('header');
            $this->parent->getView("navigation", $data);

            //var_dump($this->parent); 

            
            $this->parent->getView("formbody");
            // echo 'FORMS';
            $this->parent->getView("footer");

        }

        

    }

?>