<?php

class Model
{
    protected $db;
    protected $query;

    const HOST     = 'localhost';
    const DATABASE = 'baitap_sql';
    const USERNAME = 'root';
    const PASSWORD = '';

    public function __construct()
    {
        $this->db = new PDO("mysql:host=".self::HOST.";dbname=".self::DATABASE, self::USERNAME, self::PASSWORD);
        $this->db->exec("set names utf8mb4");
    }

    public function query($sql) 
    {
        $this->query = $this->db->query($sql);
    }

    public function getAll()
    {
        $data = [];

        while($row = $this->query->fetchObject()) {
            $data[] = $row;
        }

        return $data;
    }

    public function get()
    {
        return $this->query->fetchObject();
    }
}
