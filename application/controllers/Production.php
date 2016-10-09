<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Production extends Application{
    
    function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $this->data['pagetitle'] = 'Production';
        $this->data['pagebody'] = 'production';
		$this->render();
    }
}