<?php

    class uploads extends Appcontroller {

        public function __construct($parent) {

            // var_dump($parent);

            // $this->parent=$parent;
            //$this->parent->getView('test');

            $this->parent=$parent;

            

            //var_dump($this->parent); 

        }

        public function index() {

            $data = array();
            $data["pagename"] = "Uploads";
            $data["navigation"] = $this->parent->nav;
            $this->parent->getView('header');
            $this->parent->getView("navigation", $data);
            $this->parent->getView('uploads');
            // echo 'home';
            $this->parent->getView("footer");

        }

        public function uploadFile() {
            if($_FILES['myFile']['type'] == 'text/xml') {

                if (move_uploaded_file($_FILES["myFile"]["tmp_name"], 'assets/myFile.xml')) {

                } else {
                    // header("Location:/uploads/index?msg=something bad happened");
                }

            } else {
                header("Location:/uploads/index?msg=wrong file type");
            }

        }

    }

?>