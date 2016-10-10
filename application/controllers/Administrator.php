<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends Application{
    
    function __construct(){
        parent::__construct();
    }
    
	// like all the other controllers, pulls data from the db, throws it into the view.
	// do each one individually. 
    public function index(){
        $recipesData = $this->recipes->getRecipes();
        $recipes = array();
        
        foreach($recipesData as $recipe){
            $recipes[] = array('name' => $recipe['name'], 'description' => $recipe['description']);
        }
        
        $this->data['recipesRow'] = $recipes;
        
        $stockData = $this->stock->getStock();
        $stock = array();
        
        foreach($stockData as $stok){ // ran out of names
            $stock[] = array('name' => $stok['name'], 'price' => $stok['price'], 'quantity' => $stok['quantity']);
        }
        
        $this->data['stockRow'] = $stock;
        
        $suppliesData = $this->supplies->getSupplies();
        $supplies = array();
        
        foreach($suppliesData as $supply){
            $supplies[] = array('name' => $supply['name'], 'on hand' => $supply['on hand'], 'containerspership' => $supply['containers per shipment'], 'containers' => $supply['containers'], 'itemspercontainer' => $supply['items per container'], 'cost' => $supply['cost'] );
        }
        
        $this->data['suppliesRow'] = $supplies;
        
        $this->data['pagetitle'] = 'Administrator';
        $this->data['pagebody'] = 'administrator';
		$this->render();
    }
}