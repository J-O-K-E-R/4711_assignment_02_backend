<?php

/**
 * Some recipes, and accessors.  
 */
class Recipes extends CI_Model {

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// retrieve a single recipe
	public function get($which)
	{
		return  null;//$this->db->query("SELECT * from RECIPES where id = " . $which);
	}

	// get the recipes, what more do you want from me
	public function getRecipes()
	{
        $sql = sprintf("SELECT * from RECIPES");
        $query = $this->db->query($sql);
		return $query->result();
	}
    
    public function getRecipeDescriptions($recipeID){
        "SELECT supplies.name from SUPPLIES inner join RECIPES on RECIPES.id = RECIPESUPPLIES.recipeID inner join STOCK on RECIPESUPPIES.supplyID = SUPPLIES.ID";
        $sql = sprintf("SELECT name from SUPPLIES where supplyID = ")
    }
}
