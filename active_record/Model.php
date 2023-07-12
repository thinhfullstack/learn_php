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

    public function getAll()
    {
        $data = [];
        while ($row = $this->query->fetchObject()) {
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
        $columnNameString = implode(', ', $columnNames);
        $values = array_values($inputs);
        
        foreach($values as $key => $item) {
            $values[$key] = !empty($item) ? '"' . htmlentities($item) . '"' : '"' . $item . '"';
        }

        $valuesString = implode(', ', $values);

        $sql = "INSERT INTO {$this->getTable()}({$columnNameString}) VALUES({$valuesString})";
        $this->query($sql);

    }

    public function update(array $inputs, $id = null)
    {
        $setValues = [];

        foreach ($inputs as $key => $value) {
            $setValues[] = "$key='". htmlentities($value) . "'";
        }

        $setValueString = implode(', ', $setValues);

        $sql = "UPDATE {$this->getTable()} SET {$setValueString} WHERE id = {$id}";
        $this->query($sql);
        
    }

}
