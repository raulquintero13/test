<?php
namespace App\Models;

use App\Models\Person;
use App\Config\DbConfig;
use Core\SimplePDO;

class PersonCustomer extends Person {
    private $database;
    private $curp;
    private $password;
    private $rol;
    private $status;
    private $created_at;
    private $updated_at;
    private $tbl_customers = "customer";
    
    

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
            
            
        $vars = (array_keys(get_class_vars(__class__)));

        $keys [] = array_search('tbl_customers', $vars);
        $keys [] = array_search('tbl_persons', $vars);
        $keys [] = array_search('database', $vars);
        $keys [] = array_search('age', $vars);
        
        foreach ($keys as $key ) {
            unset($vars[$key]);
        }
        
        if (isset($customer)){
            foreach ($vars as $key => $value) {
                    $this->set($value, $customer[$value]);
                }
        }
    }

    /**
     * getAll
     * @return mixed 
     */
    public function getAll(){
        $allCustomers = $this->database->get_results(
            'SELECT * FROM  ' . $this->tbl_persons . ' 
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
        $keys[] = array_search('tbl_customers', $vars);
        $keys[] = array_search('tbl_persons', $vars);
        $keys[] = array_search('database', $vars);

        foreach ($keys as $key) {
            unset($vars[$key]);
        }

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
