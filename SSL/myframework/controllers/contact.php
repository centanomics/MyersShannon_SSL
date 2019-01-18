<?php

    class contact extends Appcontroller {

        public function __construct($parent) {

            // var_dump($parent);

            // $this->parent=$parent;
            //$this->parent->getView('test');

            $this->parent=$parent;
            $data = array();
            $data["pagename"] = "Contact";
            $data["url"] = $parent->urlPathParts[0];
            $data["navigation"] = array("Home" => "/", "Modal" => "/modals", "Carousel" => "/carousels", "Progress" => '/progess', "Contact" => "/contact");
            $this->parent->getView('header');
            $this->parent->getView("navigation", $data);
            // $this->parent->getView("body");
            // echo 'home';
            

            

            //var_dump($this->parent); 

        }

        public function index() {
            $this->getView('registerForm');
            // var_dump($_REQUEST);
            $this->getView("footer");
        }

        public function processForm() {
            echo "<h1 class='mt-4'>&nbsp;</h1>";
            // echo $_REQUEST;
            // foreach($_REQUEST as $key=>$forminput){
                
                //can also use echo $_POST(names)
                // echo $forminput.'<br/>';
                // echo $_POST('name');

                // $bio = $_POST('bio');
                // if (!preg_match("/^[a-zA-Z ]*$/",$bio) && $bio=="") {
                // $nameErr = "Only letters and white space allowed"; 
                // echo $nameErr;
                // } else {
                //     echo 'valid text';
                // }
                // echo $forminput;

                if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format"; 
                    echo $emailErr;
                } else {
                    echo 'valid email';
                }
            // }
        }

    }

?>