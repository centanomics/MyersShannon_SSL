<?
    require_once './google-api-php-client-2.2.2/vendor/autoload.php';

    class api extends Appcontroller {
        public function __construct($parent) {
            $this->parent=$parent;
        }

        public function index() {

            

            $client = new Google_Client();
            $client->setAuthConfig('./google-api-php-client-2.2.2/vendor/secret.json');
            $client->addScope(Google_Service_Drive::DRIVE_METADATA_READONLY);
            
            if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
                $client->setAccessToken($_SESSION['access_token']);
                $drive = new Google_Service_Drive($client);
                $files = $drive->files->listFiles(array())->getFiles();
            //   echo json_encode($files);
                $data = array();
                $data["pagename"] = "Api";
                $data["navigation"] = $this->parent->nav;
                $this->getView('header');
                $this->getView("navigation", $data);
                echo "<br><br><br>";
                $this->parent->getView('api', $files);
                
            } else {
              $redirect_uri = 'http://localhost/api/recv';
              header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
            }
        }

        public function recv() {
            // var_dump($_REQUEST);
            // echo '<br>';
            // var_dump($_SESSION);
           
            // $client = new Google_Client();
            // $client->setAuthConfigFile('./google-api-php-client-2.2.2/vendor/secret.json');
            // $client->setRedirectUri('http://localhost/api/recv');
            // $client->addScope(Google_Service_Drive::DRIVE_METADATA_READONLY);

            // if (! isset($_GET['code'])) {
            //     $auth_url = $client->createAuthUrl();
            //     header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
            // } else {
            // $client->authenticate($_GET['code']);
            //     $_SESSION['access_token'] = $client->getAccessToken();
            //     $redirect_uri = 'http://localhost/api/';
            //     header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
            // }

            $client = new Google_Client();
            $client->setAuthConfigFile('./google-api-php-client-2.2.2/vendor/secret.json');
            $client->setRedirectUri('http://localhost/api/recv');
            $client->addScope(Google_Service_Drive::DRIVE_METADATA_READONLY);

            if (! isset($_GET['code'])) {
                $auth_url = $client->createAuthUrl();
                header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
            } else {
                $client->authenticate($_GET['code']);
                $_SESSION['access_token'] = $client->getAccessToken();
                $redirect_uri = 'http://localhost/api';
                header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
            }
            
        }
    }

                // $data = array();
                // $data["pagename"] = "Api";
                // $data["navigation"] = $this->parent->nav;
                // $this->getView('header');
                // $this->getView("navigation", $data);
                // echo "<br><br><br>";
                // $this->parent->getView('api', $files);

?>