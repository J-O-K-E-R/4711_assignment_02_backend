<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Recieving extends Application{
    
    function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $this->data['pagetitle'] = 'Recieving';
        $this->data['pagebody'] = 'recieving';
		$this->render();
    }
}