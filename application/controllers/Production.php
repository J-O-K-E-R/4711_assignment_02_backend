<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Production extends Application{

    function __construct(){
        parent::__construct();
        $has_access = FALSE;
        $role = $this->session->userdata('userrole');
        if($role == 'user' || $role == 'administrator') {
            $has_access = TRUE;
        }
        if($has_access == FALSE){
            redirect('index.php');
        }
    }
    
	// like all the other controllers, pulls data from the db, throws it into the view.
    public function index(){
        $this->load->helper('url');
        foreach($_POST as $key=>$value){
            if($value != '0') {
                file_put_contents(__DIR__ . '/../logs/production.log', "$value,$key\n", FILE_APPEND);
            }
        }

        $source = $this->recipes->getRecipes();
        $recipes = array();

        foreach ($source as $recipe)
        {
            $ingredients = $this->recipes->getIngredients($recipe->id);
            $strIngredients = "";
            foreach($ingredients as $ingredient){
                $strIngredients .= ' ' . $ingredient->name;
            }
            
            $recipes[] = array ('name' => $recipe->name, 'description' => $strIngredients);
        }
        $this->data['recipes'] = $recipes;

        $this->data['pagetitle'] = 'Production';
        $this->data['pagebody'] = 'production';
		$this->render();
    }
}
