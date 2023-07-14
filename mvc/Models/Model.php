<?php

class Model
{
    protected $db;
    protected $query;
    protected $table;

    const HOST     = 'localhost';
    const DATABASE = 'baitap_sql';
    const USERNAME = 'root';
    const PASSWORD = '';

    public function __construct()
    {
        $this->db = new PDO("mysql:host=".self::HOST.";dbname=".self::DATABASE, self::USERNAME, self::PASSWORD);
        $this->db->exec("set names utf8mb4");
    }

    protected function setTable($value)
    {
        $this->table = $value;
    }

    protected function getTable()
    {
        return $this->table;
    }

    public function query($sql)
    {
        $this->query = $this->db->query($sql);
    }

    public function getAll($colums = ['*'])
    {
        $data = [];
        $columnString = implode(',', $colums);

        $this->query("SELECT {$columnString} FROM {$this->getTable()}");

        while($row = $this->query->fetchObject()) {
            $data[] = $row;
        }

        return $data;
    }

    public function get()
    {
        return $this->query->fetchObject();
    }

    public function create(array $inputs)
    {
        $columnName = array_keys($inputs);
        $columnNameString = implode(', ', $columnName);

        $value = array_values($inputs);
        $value = array_map(function($item) {
            return !empty($item) ?  '"' . htmlentities($item) . '"' : '"' . $item . '"';
        }, $value);

        $valueString = implode(', ', $value);

        $sql = "INSERT INTO {$this->getTable()}(${columnNameString}) VALUES(${valueString})";

        $this->query($sql);
    }

    public function update(array $inputs, $id = null)
    {
        $setValue = [];

        foreach ($inputs as $key => $value) {
            $setValue[] = "{$key}='" . htmlentities($value) . "'";
        }

        $setValueString = implode(',', $setValue);

        $sql = "UPDATE {$this->getTable()} SET {$setValueString} WHERE id = $id";
        
        $this->query($sql);
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM {$this->getTable()} WHERE id = {$id}";
        $this->query($sql);
        return $this->query->fetchObject();
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM {$this->getTable()} WHERE id = {$id}";
        $this->query($sql);
    }
}