<?php

/**
 * Some stock, and accessors.  
 */
class Stock extends CI_Model {


	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	//some pun about stalking?  
	// get all the stock for a access in the controllers.
	public function getStock()
	{
		$sql = sprintf("SELECT * from STOCK");
        $query = $this->db->query($sql);
        return $query->result();
	}
    
    // retrieve a single stock
	public function get($which)
	{
		$sql = sprintf("SELECT * from STOCK where ID = %d", $which);
        $query = $this->db->query($sql);
        return $query->result();
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
