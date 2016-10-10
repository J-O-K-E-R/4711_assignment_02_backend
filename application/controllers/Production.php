<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Production extends Application{

    function __construct(){
        parent::__construct();
    }

    public function index(){

        foreach($_POST as $key=>$value){
            if($value != '0') {
                file_put_contents(__DIR__ . '/../logs/production.log', "$value,$key\n", FILE_APPEND);
            }
        }

        $source = $this->recipes->getRecipes();

        $recipes = array();

        foreach ($source as $recipe)
        {
            $recipes[] = array ('id' => $recipe['id'], 'name' => $recipe['name'], 'description' => $recipe['description'], 'ingredients' => $recipe['ingredients']);
        }
        $this->data['recipes'] = $recipes;

        $this->data['pagetitle'] = 'Production';
        $this->data['pagebody'] = 'production';
		$this->render();
    }
}
