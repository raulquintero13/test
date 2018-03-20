<?php
namespace App\Models;

use App\Models\Person;
use App\Config\DbConfig;
use Core\SimplePDO;

class PersonCustomer extends Person {
    private $database;
    private $curp;
    private $password;
    private $created_at;
    private $updated_at;
    private $rol;
    private $status;
    private $tbl_customers = "customer";
    private $tbl_persons = "person";
    
    

	public function __construct($dbConfig){
            $this->database = SimplePDO::getInstance( $dbConfig );
    }

    public function findBy(int $id)  {
        $customer = $this->database->get_row(
            'SELECT * FROM ' . $this->tbl_persons . ' 
            left join '.$this->tbl_customers. ' ON ' . $this->tbl_persons . '.id=' . $this->tbl_customers . '.' . $this->tbl_persons . '_id 
            left JOIN genre ON genre.id = ' . $this->tbl_persons . '.genre_id
            left JOIN rol ON ' . $this->tbl_customers . '.rol_id=rol.id 
            where ' . $this->tbl_persons . '.id=?', array($id)  );
            
            
        if (isset($customer)){
            $this->setId($customer['customerid']);
            $this->setGenre($customer['genre']);
            $this->setColonia_id($customer['colonia_id']);
            $this->setCurp($customer['curp']);
            $this->setName($customer['name']);
            $this->setLastname($customer['lastname']);
            $this->setSurname($customer['surname']);
            $this->setEmail($customer['email']);
            $this->setZipcode($customer['zipcode']);
            $this->setDomicilio($customer['domicilio']);
            $this->setBirthdate($customer['birthdate']);
            $this->setPassword('xxxxx-xxxxx');
            $this->setRol($customer['rol']);
            $this->setStatus($customer['status']);
            $this->setCreated_at($customer['created_at']);
            $this->setUpdated_at($customer['updated_at']);
        }
    }
    // , person . id as person_id
    public function getAll(){
        $allCustomers = $this->database->get_results(
            'SELECT * FROM  ' . $this->tbl_customers . ' 
            LEFT JOIN genre ON genre.id = '. $this->tbl_persons . '.genre_id
            LEFT JOIN rol ON ' . $this->tbl_customers . '.rol_id=rol.id    
            INNER JOIN '. $this->tbl_persons . ' ON ' . $this->tbl_persons . '.id=' . $this->tbl_customers . '.' . $this->tbl_persons . '_id '
            );

        return $allCustomers;
    }

    public function toArray(){
        $customer['id'] = $this->getId();
        $customer['genre'] = $this->getGenre();
        $customer['colonia_id'] = $this->getColonia_id();
        $customer['curp'] = $this->getCurp();
        $customer['name'] = $this->getName();
        $customer['lastname'] = $this->getLastname();
        $customer['surname'] = $this->getSurname();
        $customer['email'] = $this->getEmail();
        $customer['zipcode'] = $this->getZipcode();
        $customer['domicilio'] = $this->getDomicilio();
        $customer['birthdate'] = $this->getBirthdate();
        $customer['age'] = $this->getAge();
        $customer['rol'] = $this->getRol();
        $customer['status'] = $this->getStatus();
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



    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of rol
     */ 
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set the value of rol
     *
     * @return  self
     */ 
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get the value of curp
     */ 
    public function getCurp()
    {
        return $this->curp;
    }

    /**
     * Set the value of curp
     *
     * @return  self
     */ 
    public function setCurp($curp)
    {
        $this->curp = $curp;

        return $this;
    }
}
