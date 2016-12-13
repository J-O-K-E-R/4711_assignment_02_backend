<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application{

	function __construct(){
		parent::__construct();
        $this->load->model('inventory');
	}

    function index_get(){
        $key = $this->get('id');
        
        if (!$key){
            $this->response($this->supplies->all(), 200);
        } else {
           $result = $this->supplies->get($key);
        
            if ($result != null){
                $this->response($result, 200);
            } else {
                $this->response(array('error' => 'Inventory item not found.'), 404);
            }
        }
    }
    
    // function item_get(){
        // $key = $this->get('id');
        // $this->getHelper($key);
    // }
    
    // function getHelper($key = null){
        
    // }
    
    // function item_put(){
        // $key = $this->get('id');
        
        // $record = array_merge(array('id' => $key), json_decode(key($this->_put_args), TRUE));
        // $this->inventory->update($record);
        // $this->response(array('ok'), 200);
    // }
    
    // function item_post(){
        // $key = $this->get('id');
        // $record = array_merge(array('id' => $key, json_decode($key($_POST), TRUE));
        // $this->inventory->add($record);
        // $this->response(array('ok'), 200);
    // }
    
    // function item_delete(){
        // $key = $this->get('id');
        
        // $this->inventory->delete($key);
        // $this->response(array('ok'), 200);
    // }
}
