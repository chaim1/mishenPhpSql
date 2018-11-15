<?php  
require_once 'model.php';
include_once 'business-logic-workers.php';

    class WorkersModel implements IModel 
    {
        private $id;        
        private $name;     
        private $beginningWork;  

        
        function __construct($arr) {

                if(!empty($arr['id'])){
                    $this->id = $arr['id'];
                } 
                
                $this->name = $arr['name'];

                $this->beginningWork = $arr['beginningWork'];


        }

        function getId() {
            return $this->id;
        }

        function getName() {
            return $this->name;
        }

        function getDate() {
            return $this->beginningWork;
        }



        function setId($id) {
             $this->id =$id;
        }

        function setName($name) {
             $this->name =$name;
        }

        function setdate($date) {
             $this->beginningWork =$date;
        }

    }
?>