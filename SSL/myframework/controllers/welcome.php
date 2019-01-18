<?php

    class welcome extends Appcontroller {

        public function __construct($parent) {

            // var_dump($parent);

            // $this->parent=$parent;
            //$this->parent->getView('test');

            $this->parent=$parent;
            $data = array();
            $data["pagename"] = "Home";
            $data["url"] = $parent->urlPathParts[0];
            $data["navigation"] = array("Home" => "/", "Modal" => "/modals", "Carousel" => "/carousels", "Progress" => '/progess', "Contact" => "/contact");
            $this->parent->getView('header');
            $this->parent->getView("navigation", $data);
            $this->parent->getView("body");
            // echo 'home';
            $this->parent->getView("footer");

            

            //var_dump($this->parent); 

        }

        public function about() {

            // echo "Hello"; 
            // $data = array();
            // $data["pagename"] = "about";
            // $data["navigation"] = array("Home" => "/", "About" => "/about");
            // $this->parent->getView("header", $data);
            $this->parent->getView("body");
            // echo 'home';
            $this->parent->getView("footer");

        }

        public function day2() {

            $this->parent->getView("day2");
            $this->parent->getView("footer");

        }

    }

?>