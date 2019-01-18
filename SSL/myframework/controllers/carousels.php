<?php

    class carousels extends Appcontroller {

        public function __construct($parent) {

            // var_dump($parent);

            // $this->parent=$parent;
            //$this->parent->getView('test');

            $this->parent=$parent;
            $data = array();
            $data["pagename"] = "Carousel";
            // $data["url"] = $parent->urlPathParts[0];
            $data["navigation"] = array("Home" => "/", "Modal" => "/modals", "Carousel" => "/carousels", "Progress" => '/progess', "Contact" => "/contact");
            $this->parent->getView('header');
            $this->parent->getView("navigation", $data);

            $this->parent->getView("carousels");
            $this->parent->getView("footer");

            

            //var_dump($this->parent); 

        }
    }

?>