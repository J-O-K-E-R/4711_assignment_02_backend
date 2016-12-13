<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends Application{

    function __construct(){
        parent::__construct();
    }
    
	// like all the other controllers, pulls data from the db, throws it into the view.
    public function index(){
        $this->load->helper('url');
        foreach($_POST as $key=>$value){
            if($value != '0') {
                file_put_contents(__DIR__ . '/../logs/sales.log', "$value,$key\n", FILE_APPEND);
            }
        }

        $recipeData = $this->recipes->getRecipes();
        $recipes = array();

        foreach($recipeData as $recipe){
            $ingredients = $this->recipes->getIngredients($recipe->id);
            $strIngredients = "";
            foreach($ingredients as $ingredient){
                $strIngredients .= ' ' . $ingredient->name;
            }
                
            $stock = $this->stock->get($recipe->id);
            $recipes[] = array('name' => $recipe->name, 'description' => $strIngredients, 'price' => $stock->price, 'id' => $stock->id);
        }

        $this->data['sales'] = $recipes;

        $this->data['pagetitle'] = 'Sales';
        $this->data['pagebody'] = 'sales';
        $this->render();
    }

    public function sell(){
    	foreach ($this->stock->getStock() as $stock) {
    		$amount = $this->input->post($stock->id);
    		if ($amount > 0 && $amount <= $stock->quantity) {
    			$this->stock->sellStock($stock->id,$amount);
    		}
    	}
    	redirect('index.php');
    }
}
