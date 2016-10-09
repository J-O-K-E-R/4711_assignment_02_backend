<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Recieving extends Application{
    
    function __construct(){
        parent::__construct();
    }
    
    public function index(){
        // build the list of authors, to pass on to our view
        $source = $this->quotes->getSupplies();
        $supplies = array();

        foreach ($source as $supply)
        {
            $supplies[] = array ('id' => $supply['id'], 'name' => $supply['name'], 'mug' => $supply['mug'], 'on hand' => $supply['on hand']);
        }
        $this->data['supplies'] = $supplies;

        $this->data['pagetitle'] = 'Recieving';
        $this->data['pagebody'] = 'recieving';
		$this->render();
    }
}