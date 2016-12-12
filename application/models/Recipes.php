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
        $sql = sprintf("SELECT * from RECIPES where ID = %d", $which);
        $query = $this->db->query($sql);
        $result = $query->result();
        $reset = reset($result);
        return $reset;
	}

	// get the recipes, what more do you want from me
	public function getRecipes()
	{
        $sql = sprintf("SELECT * from RECIPES");
        $query = $this->db->query($sql);
		return $query->result();
	}
    
    // get the ingredients (description) of a single recipe
    public function getIngredients($recipeID){
        $sql = sprintf("SELECT supplies.name from SUPPLIES inner join RECIPESUPPLIES on SUPPLIES.id = RECIPESUPPLIES.supplyID inner join RECIPES on RECIPESUPPLIES.recipeID = RECIPES.ID where recipeID = %d", $recipeID);
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function createRecipe($recipe){
        // create that entry
        $sql1 = sprintf("INSERT into RECIPES (name) VALUES ('%s')", $recipe->name);
        $this->db->query($sql);
    }
    
    public function addIngredients($recipeID, $ingredients){
        $sql = "INSERT into RECIPESUPPLIES (recipeID, supplyID) VALUES ";
        $first = TRUE;
        foreach($ingredients as $ingredient){
            if ($first == TRUE){
                $first = FALSE;
            } else {
                $sql .= ",";
            }
            $sql .= sprintf("(%d, %d, %d)", $recipeID, $ingredient->id, $ingredient->amount);
        }
    }
}
