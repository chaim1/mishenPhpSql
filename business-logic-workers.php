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

    public function update($id)
    {
        $query = "UPDATE `employee` SET `name`=:na, `beginningWork`=:bd, `id`=:id   WHERE `id`=:id";
        $params = array(

            "na" => $id->getId(),
            "bd" => $id->getName(),
            "id" => $id->getDate()

        );
        $this->getDal()->update($query,$params);
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
