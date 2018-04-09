<?php
namespace Core\Models;

use App\Config\DbConfig;
use Core\Models\Person;
use Core\Libs\Database\SimplePDO;

class PersonCustomer extends Person {
    private $tbl_customers = "customer";
    private $database;
    private $curp;
    private $password;
    private $person_id;
    private $status;
    private $credito;
    private $saldo;
    private $saldo_fecha;
    private $saldo_fecha_siguiente;
    private $created_at;
    private $updated_at;
    
    

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
            ');

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
