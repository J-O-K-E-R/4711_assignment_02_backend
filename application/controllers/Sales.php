<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends Application{
    
    function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $this->data['pagetitle'] = 'Sales';
        $this->data['pagebody'] = 'sales';
		$this->render();
    }
}