<?php

    class welcome extends Appcontroller {

        public function __construct($parent) {

            // var_dump($parent);

            // $this->parent=$parent;
            //$this->parent->getView('test');

            $this->parent=$parent;

            

            //var_dump($this->parent); 

        }

        public function index() {

            $data = array();
            $data["pagename"] = "Home";
            $data["navigation"] = array("Home" => "/", "Modal" => "/modals", "Carousel" => "/carousels", "Progress" => '/progess', "Contact" => "/contact");
            $this->parent->getView('header');
            $this->parent->getView("navigation", $data);
            $this->parent->getView("body");
            // echo 'home';
            $this->parent->getView("footer");

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

        public function ajaxPars() {
            // echo "<h1 class='mt-4'>&nbsp;</h1>";
            // var_dump($_REQUEST);

            if (@$_REQUEST['username']==''&&@$_REQUEST['password']=='') {
                echo 'bad user and pass';
            } else if(@$_REQUEST['username']==''){
                echo 'bad user';
            } else if(@$_REQUEST['password']=='') {
                echo 'bad pass';
            } else if(@$_REQUEST['username']!=''&&@$_REQUEST['password']!=''){
                echo 'welcome';
            }
        }

    }

?>