<?php
namespace App\Models;
use App\Models\Person;
use \DateTime;

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

    public function getEdad(){
        $birthdate = $this->person->getBirthdate();
        $cumpleanos = new DateTime($birthdate);
        $hoy = new DateTime();
        $annos = $hoy->diff($cumpleanos);
        return $annos->y;

    }

}