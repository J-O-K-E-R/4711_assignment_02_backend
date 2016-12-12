<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Toggle extends Application {
    
    // Constructor
	public function __construct()
	{
		parent::__construct();
        
        $origin = $_SERVER['HTTP_REFERER'];
        $role = $this->session->userdata('userrole');
        if(isset($_POST['radio'])) {
            $role = $_POST['radio'].value();
        }
        
        $this->session->set_userdata('userrole', $role);
	}
    
    public function index() {
        $this->data['pagetitle'] = 'Toggle Role';
        $this->data['pagebody'] = 'Toggle';
		$this->render();
    }
    
}