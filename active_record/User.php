<?php

class User extends Model
{
    const TABLE = 'users';

    public function __construct()
    {
        parent::__construct();
        $this->setTable(static::TABLE);
    }


    public function getGender($value)
    {
        return $value == 1 ? 'Nam' : 'Nữ';
    }
}
