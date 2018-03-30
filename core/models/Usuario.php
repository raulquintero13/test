<?php
namespace Core\Models;

use Core\Models\Person;
use \DateTime;

class Usuario {
    private $personType;

    public function __construct(Person $personType){
        $this->personType = $personType;
    }

    public function getAll(){
        return $this->personType->getAll();
    }

    public function findBy($id){
        $this->personType->findBy($id);
        $this->set('age',self::calculateAge($this->get('birthdate')));
    }

    public function save(){
        echo $this->personType->save();
    }

    
    public function toArray(){
        return $this->personType->toArray();
    }
    
    public function get($key){
        return $this->personType->get($key);
        
    }
    
    public function set($key,$value)
    {
        return $this->personType->set($key,$value);
        
    }
    
    public function getFullName(){
        return $this->personType->getFullName();
    }
    
    private function calculateAge(){
        $birthdate = $this->get('birthdate');
        $cumpleanos = new DateTime($birthdate);
        $hoy = new DateTime();
        $annos = $hoy->diff($cumpleanos);
        return $annos->y;

    }

}