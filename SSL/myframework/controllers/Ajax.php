<?php

    class Ajax extends Appcontroller {

        public function __construct($parent) {

            // var_dump($parent);

            // $this->parent=$parent;
            //$this->parent->getView('test');

            $this->parent=$parent;

            

            //var_dump($this->parent); 

        }

        public function index() {

            $data = array();
            $data["pagename"] = "Ajax";
            $data["navigation"] = array("Home" => "/", "Assignment 5" => "/assn5", "Carousel" => "/carousels", "Progress" => '/progess', "Contact" => "/contact", "Ajax" => "/Ajax");
            $this->parent->getView('header');
            $this->parent->getView("navigation", $data);
            $this->parent->getView("ajaxForm");
            // echo 'home';
            $this->parent->getView("footer");

            $random = '123';

            $_SESSION["wow"] = $random;

        }

        public function processForm() {
            // echo "<h1 class='mt-4'>&nbsp;</h1>";
            // var_dump($_REQUEST);
            if($_REQUEST["email"]=='mike' && $_REQUEST['password']=='1234') {
                echo 'good';
            } else {
                echo 'bad';
            }
            
        }

    }

?>