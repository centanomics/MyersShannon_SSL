<?php

    class assn7 extends Appcontroller {

        public function __construct($parent) {

            // var_dump($parent);

            // $this->parent=$parent;
            //$this->parent->getView('test');

            $this->parent=$parent;

            

            //var_dump($this->parent); 

        }

        public function index() {

            $data = array();
            $data["pagename"] = "Assignment 7";
            $data["navigation"] = $this->parent->nav;
            $this->getView('header');
            $this->getView("navigation", $data);
            $random = substr( md5(rand()), 0, 7);
            $this->getView("assn7", array("cap"=>$random));
            // echo 'home';
            $this->getView("footer");

            // public function contact(){

            //     $this->getView("header", array("pagename"=>"contact"));
                
            //     $random = substr( md5(rand()), 0, 7);
                
            //     $this->getView("contact",array("cap"=>$random));
                
            //     }

        }

        public function contactRecv(){

            $data = array();
            $data["pagename"] = "Assignment 7";
            $data["navigation"] = $this->parent->nav;
            $this->getView('header');
            $this->getView("navigation", $data);

            $_SESSION['files'] = file('./assets/loginInfo.txt');
            echo '<br><br><br>';
            // var_dump($_SESSION['files']);
            
            if($_POST["captcha"]==$_SESSION['captchas']){
            
                $index = 0;
                foreach($_SESSION['files'] as $test) {
                    $info = explode("|", $test);
                    $index++;
                    // echo '<br>';
                    // var_dump($info);
                    if($_POST['email'] === $info[0] && $_POST['password'] === $info[1]) {
                        $_SESSION['loggedin'] = 1;
                        $_SESSION['userInfo'] = $info[2];
                        header('Location:/carousels');
                    } else if (sizeof($info) == $index) {
                        $_SESSION['loggedin'] = 0;
                    }
                }
            
            }else{
            
                $_SESSION['loggedin'] = 0;
                echo "<br><br><br>Invalid captcha";
                
                echo "<br><a href='/assn7'>Click here to go back</a>";
            
            }
            
        }

    }

?>