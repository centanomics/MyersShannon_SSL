<?

    class auth extends Appcontroller{

        public function __construct($parent) {

            $this->parent = $parent;

        }

        public function login() {

            // $data = array();
            // $data["pagename"] = "Assignment 7";
            // $data["navigation"] = $this->parent->nav;
            // $this->getView('header');
            // $this->getView("navigation", $data);
            // echo '<br><br><br>';

            if($_REQUEST["captcha"]==$_SESSION['captchas']){
                if($_REQUEST['email'] && $_REQUEST['password']) {
                    $data = $this->parent->getModel("users")->select(
                        "SELECT * FROM users WHERE email = :email AND password = :password",
                    array(":email" => $_REQUEST['email'], ":password" => sha1($_REQUEST['password'])));

                    if($data) {
                        $_SESSION["loggedin"]=1;
                        header('Location:/carousels');
                    } else {
                        $_SESSION['loggedin'] = 0;
                        echo "<br><br><br>Invalid email and/or password";
                
                        echo "<br><a href='/assn7'>Click here to go back</a>";
                    }
                } else {
                    $_SESSION['loggedin'] = 0;
                    echo "<br><br><br>You didn't enter anything into the email and password inputs";
            
                    echo "<br><a href='/assn7'>Click here to go back</a>";
                }
            } else {
                $_SESSION['loggedin'] = 0;
                echo "<br><br><br>Invalid captcha";
                
                echo "<br><a href='/assn7'>Click here to go back</a>";
            }
        }


    }

?>