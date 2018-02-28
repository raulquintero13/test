<?php
namespace App\Models;
use App\Config\DbConfig;
use \App\Core\SimplePDO;


class Menu {
   private $database;

	public function __construct($dbConfig){
        try {
            $this->database = SimplePDO::getInstance( $dbConfig );
        } catch( PDOException $e ) {
            //Do whatever you'd like with the error here

        }
    }

   


    public function getMenu() : array
    {

        // var_dump($this->database);        
        
        $allMenus = $this->createTree(0);
        
        return $allMenus;

    }

    private function createTree(int $parent_id=0)
    {

        $menus = $this->database->get_results("SELECT * FROM menu where parent_id = $parent_id order by position");
        
        
        
        foreach ($menus as $menu) {
            $option = $this->database->get_row("SELECT count(parent_id) as cuantos FROM menu where parent_id = ".$menu['menu_id']);
            
            if ($option['cuantos']) {
                $menu['sub']=self::createTree($menu['menu_id']);
                 $nodes[] = $menu;
            } 
            else {
                // $menu['sub']=NULL;
                $nodes[] = $menu;
            }
        }



        
        return $nodes;
    }

}
