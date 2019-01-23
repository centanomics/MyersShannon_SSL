<?php

    class modals extends Appcontroller {

        public function __construct($parent) {

            // var_dump($parent);

            // $this->parent=$parent;
            //$this->parent->getView('test');

            $this->parent=$parent;
            $data = array();
            $data["pagename"] = "Modal";
            // $data["url"] = $parent->urlPathParts[0];
            $data["navigation"] = $this->parent->nav;
            $this->parent->getView('header');
            $this->parent->getView("navigation", $data);
            
            $this->parent->getView("modals");
            $this->parent->getView("footer");

            

            

            //var_dump($this->parent); 

        }
    }

?>