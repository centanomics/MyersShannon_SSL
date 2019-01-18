<?php

    class progess extends Appcontroller {

        public function __construct($parent) {

            // var_dump($parent);

            // $this->parent=$parent;
            //$this->parent->getView('test');

            $this->parent=$parent;
            $data = array();
            $data["pagename"] = "Progress";
            // $data["url"] = $parent->urlPathParts[0];
            $data["navigation"] = array("Home" => "/", "Modal" => "/modals", "Carousel" => "/carousels", "Progress" => '/progess', "Contact" => "/contact");
            $this->parent->getView('header');
            $this->parent->getView("navigation", $data);

            

            //var_dump($this->parent); 

        }

        public function index() {
            $this->parent->getView("progess");
            // echo 'test';
            $this->parent->getView("footer");
        }

        public function loginForm() {
            echo "<h1 class='mt-4'>&nbsp;</h1>";
            foreach($_REQUEST as $key=>$forminput){
                echo $forminput.'<br/>';
            }
            // $this->parent->getView("footer");
        }

    }

?>