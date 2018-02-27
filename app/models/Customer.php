<?php
namespace App\Models;
use App\Config\DbConfig;
use \App\Core\SimplePDO;


class Customer {
   private $database;

	public function __construct($dbConfig){
        try {
            $this->database = SimplePDO::getInstance( $dbConfig );
        } catch( PDOException $e ) {
            //Do whatever you'd like with the error here

        }
    }

    public function getCustomer(int $id)  {
        $allCustomers = $this->database->get_row( 
            "SELECT * FROM person left join cliente ON person.id=cliente.person_id where person.id=?", array($id)  );
        if (isset($allCustomers)){

            // var_dump($allCustomers);die;
            return $allCustomers;
            }
            
            else {
                return NULL;
            }
    }
    
    
    public function getCustomers():array{

        // var_dump($this->database);
        $allCustomers = $this->database->get_results( "SELECT * FROM person inner join cliente ON person.id=cliente.person_id "  );
        return $allCustomers;

    }

}
