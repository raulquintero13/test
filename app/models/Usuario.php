<?php
namespace App\Models;
use App\Models\Person;

class Usuario {
    public $person;

    public function __construct(Person $person){
        $this->person = $person;
    }

    public function getAll(){
        return $this->person->getAll();
    }

    public function findBy($id){
        return$this->person->findBy($id);
    }

    public function save(){
        echo $this->person->save();
    }

    public function toArray(){
        return $this->person->toArray();
    }

}