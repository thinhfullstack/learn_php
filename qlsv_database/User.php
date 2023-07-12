<?php

class User extends Model
{
    public function getGender($value)
    {
        return $value == 1 ? 'Nam' : 'Nữ';
    }

    public function getAvatar()
    {
        
    }

    public function getFamily($value)
    {
        switch ($value) {
            case 1:
                $value = 'Hộ gia đình số 1';
                break;

            case 2:
                $value = 'Hộ gia đình số 2';
                break;

            case 3:
                $value = 'Hộ gia đình số 3';
                break;
            }
            return $value;
    }
}
