<?php
namespace Core\Models;

use Core\Models\Person;
use Core\Config\DbConfig;
use Core\SimplePDO;

class PersonEmployee extends Person {
   private $database;

	public function __construct($dbConfig){
            $this->database = SimplePDO::getInstance( $dbConfig );
    }

    public function getCustomer(int $id)  {
        $allCustomers = $this->database->get_row("SELECT * FROM person left join cliente ON person.id=cliente.person_id where person.id=?", array($id)  );
        
        if (isset($allCustomers)){
            return $allCustomers;
        }else {
            return NULL;
        }
    }
    
    public function getCustomers(){
        $allCustomers = $this->database->get_results( "SELECT * FROM person inner join cliente ON person.id=cliente.person_id "  );
        return $allCustomers;
    }


}
