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
    
    public function createRecipe($recipe, $ingredients){
        // create that entry
        $sql1 = sprintf("INSERT into RECIPES (name) VALUES ('%s')", $recipe->name);
        $this->db->query($sql1);
        
        // get the id of the last thing that was inserted
        $insert_id = $this->db->insert_id();
        
        $sql2 = "INSERT into RECIPESUPPLIES (recipeID, supplyID) VALUES ";
        $first = TRUE;
        foreach($ingredients as $ingredient){
            if ($first == TRUE){
                $first = FALSE;
            } else {
                $sql2 .= ",";
            }
            $sql2 .= sprintf("(%d, %d, %d)", $insert_id, $ingredient->id, $ingredient->amount);
        }
        
        $this->db->query($sql2);
    }
    
    public function updateRecipe($recipe, $ingredients){
        $sql1 = sprintf("UPDATE RECIPES set name = '%'", $recipe->name);
        $this->db->query($sql1);
        
        $sql2 = sprintf("DELETE from RECIPESUPPLIES where recipeID = %d", $recipe->id);
        $this->db->query($sql2);
        
        $sql3 = "INSERT into RECIPESUPPLIES (recipeID, supplyID) VALUES ";
        $first = TRUE;
        foreach($ingredients as $ingredient){
            if ($first == TRUE){
                $first = FALSE;
            } else {
                $sql3 .= ",";
            }
            $sql3 .= sprintf("(%d, %d, %d)", $insert_id, $ingredient->id, $ingredient->amount);
        }
        
        $this->db->query($sql3);
    }
    
    public function deleteRecipe($recipeID){
        $sql = sprintf("DELETE from RECIPESUPPLIES where recipeID = %d", $recipeID);
        $this->db->query($sql);
        
        $sql2 = sprintf("DELETE from RECIPES where id = %d", $recipeID);
        $this->db->query($sql2);
    }
}
