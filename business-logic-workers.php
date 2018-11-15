<?php
include_once 'bl.php' ; 
include_once 'model-workers.php' ; 

 class BusinessLogicWorker extends BusinessLogic{

    public function get()
    {
        $q = 'SELECT * FROM `employee`';
        
        $results = $this->getDal()->select($q);
        $resultsArray = [];

        while ($row = $results->fetch()) {
            array_push($resultsArray, new WorkersModel($row));
        }

        return $resultsArray;
        
    }


    public function set($param)
    {
        $query = "INSERT INTO `employee` ( `id`, `name`, `beginningWork`) VALUES (:id, :na, :bd)";
            $param = array(

                'id' => $param->getId(),
                'na' => $param->getName(),
                'bd' => $param->getDate()

            );
            
            
            $this->getDal()->insert($query,$param);
            
    }

    public function delete($id)
    {
        $query = "DELETE FROM `employee` WHERE `id`=$id";
        $this->getDal()->delete($query);
    }

    public function uupdate($params)
    {
        $query = "UPDATE `employee` SET `name`=:na, `beginningWork`=:bd  WHERE `id`=:id";
        $param = array(

            "na" => $params->getName(),
            "bd" => $params->getDate(),
            "id" => $params->getId()

        );
        // var_dump($params);
        //     die();
        $this->getDal()->update($query,$param);
    }

    public function getOne($id)
    {
        $q = 'SELECT * FROM `employee` WHERE `id`= :pid';
        
        $results = $this->getDal()->selectOne($q, [
            'pid' => $id
        ]);
        $row = $results->fetch();

        return new WorkersModel($row);
    }


}

 
?>

