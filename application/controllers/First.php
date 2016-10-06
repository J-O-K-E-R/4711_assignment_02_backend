<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class First extends Application{
    
    function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $this->data['pagebody'] = 'justone';
        
        $this->data += $this->quotes->get(1);
		$this->render();
    }
}