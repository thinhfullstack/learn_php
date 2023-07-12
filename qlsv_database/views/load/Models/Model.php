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

    public function setTable($values) 
    {
        $this->table = $values;
    }

    public function getTable()
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
        $columnNames = array_keys($inputs);
        $columnNameString = implode(',', $columnNames);

        $values = array_values($inputs);
        $values = array_map(function($item) {
            return !empty($item) ?  '"' . htmlentities($item) . '"' : '"' . $item . '"';
        }, $values);

        $valueString = implode(',', $values);


        $sql = "INSERT INTO {$this->getTable()}({$columnNameString}) VALUES({$valueString})";

        $this->query($sql);
    }

    public function update(array $inputs, $id = null)
    {
        $setValues = [];

        foreach($inputs as $key => $value) {
            $setValues[] = "$key='". htmlentities($value)."'";
        }

        $setValueString = implode(',', $setValues);

        $sql = "UPDATE {$this->getTable()} SET {$setValueString} WHERE id = {$id}";

        $this->query($sql);
    }

    public function delete(array $inputs, $id = null)
    {
        
    }

}
