<?php

class Model extends Database
{
    public function __construct()
    {
        parent::__construct();
      
    }

    private function get_query($sql,$param,$item)
    {
        if(!empty($param))
        {
            $stmt = $this->db_connect()->prepare($sql);

            $stmt->bindParam(':param', $param);

            return ($stmt->execute()) ? $stmt->fetchAll() : [];
        }
        elseif(!empty($item))
        {
            $stmt = $this->db_connect()->prepare($sql);

            $stmt->bindParam(':param', $item);

            return ($stmt->execute()) ? $stmt->fetch() : [];
        }
        else
        {
            $stmt = $this->db_connect()->prepare($sql);

            return ($stmt->execute()) ? $stmt->fetchAll() : [];
        }
    }

    private function getCount($query, $param)
    {
        $stmt = $this->db_connect()->prepare($query);

        $stmt->bindParam(':param', $param);

        return ($stmt->execute()) ? $stmt->rowCount() : 0;
    }

    private function send_query($query, $param)
    {
        $stmt = $this->db_connect()->prepare($query);

        $stmt->bindParam(':param', $param);

        return $stmt->execute();
    }

    protected function create($table, $data)
    {
        $implodeColumns = implode(",",array_keys($data));

        $implodePlaceholder = implode(", :",array_keys($data));

        $procces = $this->db_connect()->prepare("INSERT INTO $table($implodeColumns)VALUES(:".$implodePlaceholder.")");

        foreach ($data as $key => $value){$procces->bindValue(':'.$key,$value);}
        
        return $procces->execute();
    }

    #Update Query
    protected function updating($table, $param, $data)
    {
        ksort($data);

        $fieldString = '';

        foreach ($data as $key => $value)
        {
            $fieldString .= "`$key`='$value',";
        }

        $fieldString = trim($fieldString);

        $fieldString = rtrim($fieldString, ',');

        $sql = "UPDATE $table SET $fieldString WHERE id =:param";

        return $this->send_query($sql, $param);
    }

    /**
     * Find User By Id takes three parameters
     * @Table name
     * @ the selected column name
     * @ the ID
     */
    protected function Find_By_Id($table,$item)
    {
        $find_query ="SELECT * FROM $table WHERE id =:param";

        return $this->get_query($find_query, null, $item);
    }

    #Get all users
    protected function Get_All_Query($table)
    {
       $find ="SELECT * FROM $table"; 

       return $this->get_query($find, null,null);
    }


    #get row count
    protected function get_rowCount($table, $param)
    {
        $rows ="SELECT * FROM $table WHERE id =:param";

        return $this->getCount($rows, $param);
    }
}