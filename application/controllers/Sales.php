<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends Application{
    
    function __construct(){
        parent::__construct();
    }
    
	// like all the other controllers, pulls data from the db, throws it into the view.
    public function index(){
        $recipeData = $this->recipes->getRecipes();
        $recipes = array();
        
        $stockData = $this->stock->getStock();
        
        foreach($recipeData as $recipe){
            $recipes[] = array('id' => $recipe['id'], 'name' => $recipe['name'], 'description' => $recipe['description'], 'price' => $stockData[$recipe['id']]['price']);
        }
        
        $this->data['sales'] = $recipes;
        
        $this->data['pagetitle'] = 'Sales';
        $this->data['pagebody'] = 'sales';
		$this->render();
    }
}