<?php
class Database
{
    private $host = DB_HOST, $user = DB_USER, $db = DB_NAME, $pass =  DB_PASSWORD;

    public function __construct()
    {
        $this->db_connect();
    }

    public function db_connect()
    {
        try
        {
            $link = new PDO('mysql:host='.$this->host.';dbname='.$this->db, $this->user, $this->pass);

            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, PDO::FETCH_ASSOC);

            return $link;
        }
        catch(PDOException $e)
        {
            $not_found = '
            <br>
            <div class="alert alert-danger">
               <strong>Connection Error</strong> The File or Class ' . $e->getMessage() . ' was not found
            </div>';
            die($not_found);
        }
    }
}