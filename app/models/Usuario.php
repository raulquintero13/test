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
        $this->person->findBy($id);
        $this->person->setAge(self::getEdad($this->person->getBirthdate()));
        // echo '<pre>';var_dump($this->person->getCurp());echo '</pre>';die;
        
    }

    public function save(){
        echo $this->person->save();
    }

    public function toArray(){
        return $this->person->toArray();
    }

    private function getEdad(){
        $birthdate = $this->person->getBirthdate();
        $cumpleanos = new DateTime($birthdate);
        $hoy = new DateTime();
        $annos = $hoy->diff($cumpleanos);
        return $annos->y;

    }

}