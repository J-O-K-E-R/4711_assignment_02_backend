<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Recieving extends Application{
    
    function __construct(){
        parent::__construct();
    }
    
    public function index(){
        foreach($_POST as $key=>$value){
            if($value != '0') {
                file_put_contents(__DIR__ . '/../logs/recieving.log', "$value,$key\n", FILE_APPEND);
            }
        }
        
        $source = $this->supplies->getSupplies();
        $supplies = array();

        foreach ($source as $supply)
        {
            $supplies[] = array ('id' => $supply['id'], 'name' => $supply['name'], 'on hand' => $supply['on hand']);
        }
        $this->data['supplies'] = $supplies;

        $this->data['pagetitle'] = 'Recieving';
        $this->data['pagebody'] = 'recieving';
		$this->render();
    }
}