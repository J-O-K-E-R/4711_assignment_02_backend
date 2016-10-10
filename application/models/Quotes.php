<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class Quotes extends CI_Model {
    
    var $supplies = array(
        array('id' => 1, 'name' => 'Egg', 'mug' => '', 'recieving unit' => 10, 'cost' => 2.00, 'stocking unit' => 12, 'on hand' => 0),
        array('id' => 2, 'name' => 'Sausage', 'mug' => '', 'recieving unit' => 10, 'cost' => 3.00, 'stocking unit' => 10, 'on hand' => 0),
        array('id' => 3, 'name' => 'Bagel', 'mug' => '', 'recieving unit' => 20, 'cost' => 2.00, 'stocking unit' => 6, 'on hand' => 0),
        array('id' => 4, 'name' => 'Bacon', 'mug' => '', 'recieving unit' => 15, 'cost' => 3.00, 'stocking unit' => 12, 'on hand' => 0),
        array('id' => 5, 'name' => 'Cheese', 'mug' => '', 'recieving unit' => 40, 'cost' => 7.00, 'stocking unit' => 10, 'on hand' => 0),
        array('id' => 6, 'name' => 'Hash Brown', 'mug' => '', 'recieving unit' => 20, 'cost' => 5.00, 'stocking unit' => 12, 'on hand' => 0),
        array('id' => 7, 'name' => 'Coffee Beans', 'mug' => '', 'recieving unit' => 10, 'cost' => 10.00, 'stocking unit' => 5000, 'on hand' => 0),
        array('id' => 8, 'name' => 'English Muffin', 'mug' => '', 'recieving unit' => 10, 'cost' => 5.00, 'stocking unit' => 6, 'on hand' => 0),
        array('id' => 9, 'name' => 'Tortilla', 'mug' => '', 'recieving unit' => 20, 'cost' => 4.00, 'stocking unit' => 12, 'on hand' => 0),
        array('id' => 10, 'name' => 'Tomato', 'mug' => '', 'recieving unit' => 20, 'cost' => 0.50, 'stocking unit' => 10, 'on hand' => 0),
        array('id' => 11, 'name' => 'Lettuce', 'mug' => '', 'recieving unit' => 20, 'cost' => 2.00, 'stocking unit' => 20, 'on hand' => 0),
        array('id' => 12, 'name' => 'Canadian Bacon', 'mug' => '', 'recieving unit' => 20, 'cost' => 5.00, 'stocking unit' => 20, 'on hand' => 0)
    );
    
    var $recipes = array(
        array('id' => 1, 'description' => 'Egg, Cheese, English Muffin, Canadian Bacon', 'ingredients' => array(1, 5, 8, 12)),
        array('id' => 2, 'description' => 'Egg, Cheese, English Muffin, Sausage', 'ingredients' => array(1, 2, 5, 8)),
        array('id' => 3, 'description' => 'Bagel, Bacon, Tomato, Lettuce', 'ingredients' => array(3, 4, 10, 11)),
        array('id' => 4, 'description' => 'Totrilla, Sausage, Cheese, Hash Brown, Egg', 'ingredients' => array(9, 2, 5, 6, 1)),
		array('id' => 5, 'description' => 'Coffee', 'ingredients' => array(7))
    );
    
    var $stock = array(
        array('id' => 1, 'name' => 'Egg McMuffin', 'price' => 3.50, 'quantity' => 0),
        array('id' => 2, 'name' => 'Sausage McMuffin', 'price' => 4.00, 'quantity' => 0),
        array('id' => 3, 'name' => 'Bagel BLT', 'price' => 5.00, 'quantity' => 0),
        array('id' => 4, 'name' => 'Sausage & Hash Brown Breakfast Wrap', 'price' => 5.50, 'quantity' => 0),
        array('id' => 5, 'name' => 'Coffee', 'price' => 2.00, 'quantity' => 0),
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
		foreach ($this->data as $record)
			if ($record['id'] == $which)
				return $record;
		return null;
	}

	// retrieve all of the quotes
	public function all()
	{
		return $this->data;
	}
    
    //creates an stock item
    public function createStock($itemID)
    {
        //Gets whole array from recipes
        $items = $this->recipes->all();;
        //gets the ingredient KVP from the items array - doesn't actually work right now.
        $ingredients = $items[$itemID]['ingredients'];
        //for every item id in the recipes ingredients array, decrement the supplies
        foreach ($ingredients as $ingredient)
            decreaseSupplies($ingredient);
        //increase the stock item by 1
        $this->stock[$itemID]['quantity']++;
    }
    
    //decrements supplies an handles subtracting from both 'on hand' and 'recieving unit' keys
    public function decreaseSupplies($item)
    {
        $supply = $this->supplies->get($item);
        
        if($supply['on hand'] == 0)
        {
            $supply['on hand'] = $supply['stocking unit'];
            $supply['recieving unit']--;
        }
    }

}
