<?php

/**
 * Some stock, and accessors.  
 */
class Stock extends CI_Model {

	// the ID is zero indexed for easy access, and the recipe id's directly match up with the stock id's
	var $stock = array(
        array('id' => 0, 'name' => 'Egg McMuffin', 'price' => 3.50, 'quantity' => 0),
        array('id' => 1, 'name' => 'Sausage McMuffin', 'price' => 4.00, 'quantity' => 0),
        array('id' => 2, 'name' => 'Bagel BLT', 'price' => 5.00, 'quantity' => 0),
        array('id' => 3, 'name' => 'Sausage & Hash Brown Breakfast Wrap', 'price' => 5.50, 'quantity' => 0),
        array('id' => 4, 'name' => 'Coffee', 'price' => 2.00, 'quantity' => 0),
    );

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// retrieve a single stock
	public function get($which)
	{
		// iterate over the data until we find the one we want
		foreach ($this->stock as $record)
			if ($record['id'] == $which)
				return $record;
		return null;
	}

	//some pun about stalking?  
	// get all the stock for a access in the controllers.
	public function getStock()
	{
		return $this->stock;
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
}
