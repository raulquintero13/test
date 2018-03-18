<?php
namespace App\Models;

use App\Models\Person;
use App\Config\DbConfig;
use \App\Core\SimplePDO;

class PersonCustomer extends Person {
    private $database;
    private $password;
    private $created_at;
    private $updated_at;

	public function __construct($dbConfig){
            $this->database = SimplePDO::getInstance( $dbConfig );
    }

    public function findBy(int $id)  {
        $customer = $this->database->get_row( 
            "SELECT * FROM person left join customer ON person.id=customer.person_id where person.id=?", array($id)  );

        if (isset($customer)){
            $this->setId($customer['id']);
            $this->setName($customer['name']);
            $this->setLastname($customer['lastname']);
            $this->setSurname($customer['surname']);
            $this->setBirthdate($customer['birthdate']);
            $this->setPassword('xxxxx-xxxxx');
            $this->setCreated_at($customer['created_at']);
            $this->setUpdated_at($customer['updated_at']);
        }
    }
    
    public function getAll(){
        $allCustomers = $this->database->get_results( "SELECT * FROM person inner join customer ON person.id=customer.person_id "  );
        // var_dump($allCustomers);die;
        return $allCustomers;
    }

    public function toArray(){
        $customer['id'] = $this->getId();
        $customer['name'] = $this->getName();
        $customer['lastname'] = $this->getLastname();
        $customer['surname'] = $this->getSurname();
        $customer['birthdate'] = $this->getBirthdate();
        $customer['created_at'] = $this->getCreated_at();
        $customer['updated_at'] = $this->getUpdated_at();
        return $customer;
    }

    public function save(){
        echo  "save Customer";
    }



   /**
    * Get the value of password
    */ 
   public function getPassword()
   {
      return $this->password;
   }

   /**
    * Set the value of password
    *
    * @return  self
    */ 
   public function setPassword($password)
   {
      $this->password = $password;

      return $this;
   }

   /**
    * Get the value of created_at
    */ 
   public function getCreated_at()
   {
      return $this->created_at;
   }

   /**
    * Set the value of created_at
    *
    * @return  self
    */ 
   public function setCreated_at($created_at)
   {
      $this->created_at = $created_at;

      return $this;
   }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
