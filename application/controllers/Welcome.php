<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application{

	function __construct(){
		parent::__construct();
	}

	// some mock data for now.  Not hooked up to anything.
	public function index(){
		$this->load->helper('url');
        $this->data['pagetitle'] = 'Go away.';
		$this->data['pagebody'] = 'homepage';
		$this->render();
	}
}
