<?php 

class Home_Model extends Model
{
    private $table ="";// Your Table Name here

    /**
     * Model constructor.
    */
    public function __construct()
    {
        parent:: __construct();
    }

    /**
     * @param $fields
     * @param $item
     * @return bool
    */
    public function update_user($data, $param)
    {
       return $this->updating($this->table, $param, $data);
    }

    /**
     * @param $data
     * @return bool
    */
    public function create_user($data)
    {
        return $this->create($this->products, $data);
    }

    /**
     * @return array|mixed
    */
    public function find_user($item)
    {
        return $this->Find_By_Id($this->table, $item);
    }

    /**
     * @return array|mixed
     */
    public function all_users()
    {
        return $this->Get_All_Query($this->table);
    }
  
}