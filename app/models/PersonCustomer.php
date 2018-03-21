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
    
    

	/**
	 * __construct
	 * @param mixed $dbConfig 
	 * @return mixed 
	 */
	public function __construct($dbConfig){
            $this->database = SimplePDO::getInstance( $dbConfig );
    }

    /**
     * findBy
     * @param mixed $id 
     * @return mixed 
     */
    public function findBy(int $id)  {
        $customer = $this->database->get_row(
            'SELECT * FROM ' . $this->tbl_persons . ' 
            left join '.$this->tbl_customers. ' ON ' . $this->tbl_persons . '.id=' . $this->tbl_customers . '.' . $this->tbl_persons . '_id 
            left JOIN genre ON genre.id = ' . $this->tbl_persons . '.genre_id
            left JOIN rol ON ' . $this->tbl_customers . '.rol_id=rol.id 
            where ' . $this->tbl_persons . '.id=?', array($id)  );
            
            
        if (isset($customer)){
            $this->set('id',$customer['id']);
            $this->set('genre',$customer['genre']);
            $this->set('colonia_id',$customer['colonia_id']);
            $this->set('curp',$customer['curp']);
            $this->set('name',$customer['name']);
            $this->set('lastname',$customer['lastname']);
            $this->set('surname',$customer['surname']);
            $this->set('email',$customer['email']);
            $this->set('zipcode',$customer['zipcode']);
            $this->set('domicilio',$customer['domicilio']);
            $this->set('birthdate',$customer['birthdate']);
            $this->set('password','xxxxx-xxxxx');
            $this->set('rol',$customer['rol']);
            $this->set('status',$customer['status']);
            $this->set('created_at',$customer['created_at']);
            $this->set('updated_at',$customer['updated_at']);
        }
    }

    /**
     * getAll
     * @return mixed 
     */
    public function getAll(){
        $allCustomers = $this->database->get_results(
            'SELECT *, customer.id as customer_id FROM  ' . $this->tbl_persons . ' 
            INNER JOIN '. $this->tbl_customers . ' ON ' . $this->tbl_persons . '.id=' . $this->tbl_customers . '.' . $this->tbl_persons . '_id 
            LEFT JOIN genre ON genre.id = '. $this->tbl_persons . '.genre_id
            LEFT JOIN rol ON ' . $this->tbl_customers . '.rol_id=rol.id'    
            );

        return $allCustomers;
    }

    /**
     * toArray
     * @return mixed 
     */
    public function toArray(){

        $vars = (array_keys(get_class_vars(__class__)));
        array_shift($vars); //remove database attribute // first one

        foreach ($vars as $key => $value) {
            $customer[$value] = $this->get($value);
            
        }

        // $customer['id'] = $this->get('id');
                
        return $customer;
    }

    public function save(){
        echo  "save Customer";
    }


    public function set($key,$value){

        $this->$key = $value;
    }

    public function get($key){
        return $this->$key;
    }

   
}
