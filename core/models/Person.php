<?php

namespace Core\Models;

abstract class Person {

    protected $tbl_persons = "person";
    protected $id;
    protected $genre;
    protected $colonia_id;
    protected $name;
    protected $lastname;
    protected $surname;
    protected $birthdate;
    protected $age;
    protected $email;
    protected $zipcode;
    protected $domicilio;

    abstract public function get($key);
    abstract public function set($key, $value);

    public function getFullName()
    {
        return implode (" ",[$this->name,$this->lastname,$this->surname]);
    }

}