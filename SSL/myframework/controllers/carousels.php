<?php

    class carousels extends Appcontroller {

        public function __construct($parent) {

            // var_dump($parent);

            // $this->parent=$parent;
            //$this->parent->getView('test');
            if($_SESSION['loggedin'] && $_SESSION['loggedin'] == 1) {
                $this->parent=$parent;
                $this->showList();
            } else {
                header('Location:/assn7');
            }

            

            //var_dump($this->parent); 

        }

        public function showList() { // showList

            $fruitData = $this->parent->getModel('fruits')->select(
                "SELECT * from fruit_table"
            );
            $data = array();
            $data["pagename"] = "Profile";
            // $data["url"] = $parent->urlPathParts[0];
            $data["navigation"] = $this->parent->nav;
            $this->parent->getView('header');
            $this->parent->getView("navigation", $data);
            $this->parent->getView("carousels", $fruitData);
            
            $this->parent->getView("footer");

        }

        public function addForm() {
            $data = array();
            $data["pagename"] = "Profile";
            // $data["url"] = $parent->urlPathParts[0];
            $data["navigation"] = $this->parent->nav;
            $this->parent->getView('header');
            $this->parent->getView("navigation", $data);
            $this->parent->getView("addForm");
            
            // $this->parent->getView("footer");
        }

        public function edit() {
            $fruitData = $this->parent->getModel('fruits')->select(
                "SELECT * from fruit_table WHERE id = :id",
                array(':id' => $_REQUEST['id'])
            );
            $dataPassing = array('name' => $fruitData[0]['name'], 'id' => $fruitData[0]['id']);
            $data = array();
            $data["pagename"] = "Profile";
            // $data["url"] = $parent->urlPathParts[0];
            $data["navigation"] = $this->parent->nav;
            $this->parent->getView('header');
            $this->parent->getView("navigation", $data);
            $this->parent->getView("editForm", $dataPassing);
        }

        public function delete() {
            $this->parent->getModel('fruits')->delete("DELETE FROM fruit_table WHERE id = :id",
            array(':id' => $_REQUEST['id'])
            );

            header("Location:/carousels");
        }

        public function addItem() {
            $this->parent->getModel('fruits')->add("INSERT INTO fruit_table (name) VALUES(:name)", 
            array(":name" => $_REQUEST['name']));

            header("Location:/carousels");
        }

        public function editItem() {
            $this->parent->getModel('fruits')->update(
                "UPDATE fruit_table SET name = :name WHERE id = :id",
                array(":name" => $_REQUEST['name'], ":id" => $_REQUEST['id'])
            );

            header("Location:/carousels");
        }
    }

?>