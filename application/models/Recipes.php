<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class Recipes extends CI_Model {

	var $recipes = array(
        array('id' => 0, 'name' => 'Egg McMuffin', 'description' => 'Egg, Cheese, English Muffin, Canadian Bacon', 'ingredients' => array(1, 5, 8, 12)),
        array('id' => 1, 'name' => 'Sausage McMuffin', 'description' => 'Egg, Cheese, English Muffin, Sausage', 'ingredients' => array(1, 2, 5, 8)),
        array('id' => 2, 'name' => 'Bagel BLT', 'description' => 'Bagel, Bacon, Tomato, Lettuce', 'ingredients' => array(3, 4, 10, 11)),
        array('id' => 3, 'name' => 'Sausage & Hash Brown Breakfast Wrap', 'description' => 'Totrilla, Sausage, Cheese, Hash Brown, Egg', 'ingredients' => array(9, 2, 5, 6, 1)),
		array('id' => 4, 'name' => 'Coffee', 'description' => 'Coffee beans', 'ingredients' => array(7))
    );

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// retrieve a single quote
	public function get($which)
	{
		// iterate over the data until we find the one we want
		foreach ($this->recipes as $record)
			if ($record['id'] == $which)
				return $record;
		return null;
	}

	// get the recipes, what more do you want from me
	public function getRecipes()
	{
		return $this->recipes;
	}

}
