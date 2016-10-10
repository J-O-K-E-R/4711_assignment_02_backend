<?php

/**
 * Supplies, and accessors.  Also, ways to update the 'database'.  Will be replaced once we have a database.
 */
class Supplies extends CI_Model {

	var $supplies = array(
        array('id' => 1, 'name' => 'Egg', 'on hand' => 0, 'containers per shipment' => 10, 'containers' => 0, 'items per container' => 10, 'cost' => 5),
        array('id' => 2, 'name' => 'Sausage', 'on hand' => 0, 'containers per shipment' => 10, 'containers' => 0, 'items per container' => 10, 'cost' => 5),
        array('id' => 3, 'name' => 'Bagel', 'on hand' => 0, 'containers per shipment' => 10, 'containers' => 0, 'items per container' => 10, 'cost' => 5),
        array('id' => 4, 'name' => 'Bacon', 'on hand' => 0, 'containers per shipment' => 10, 'containers' => 0, 'items per container' => 10, 'cost' => 5),
        array('id' => 5, 'name' => 'Cheese', 'on hand' => 0, 'containers per shipment' => 10, 'containers' => 0, 'items per container' => 10, 'cost' => 5),
        array('id' => 6, 'name' => 'Hash Brown', 'on hand' => 0, 'containers per shipment' => 10, 'containers' => 0, 'items per container' => 10, 'cost' => 5),
        array('id' => 7, 'name' => 'Coffee Beans', 'on hand' => 0, 'containers per shipment' => 10, 'containers' => 0, 'items per container' => 10, 'cost' => 5),
        array('id' => 8, 'name' => 'English Muffin', 'on hand' => 0, 'containers per shipment' => 10, 'containers' => 0, 'items per container' => 10, 'cost' => 5),
        array('id' => 9, 'name' => 'Tortilla', 'on hand' => 0, 'containers per shipment' => 10, 'containers' => 0, 'items per container' => 10, 'cost' => 5),
        array('id' => 10, 'name' => 'Tomato', 'on hand' => 0, 'containers per shipment' => 10, 'containers' => 0, 'items per container' => 10, 'cost' => 5),
        array('id' => 11, 'name' => 'Lettuce', 'on hand' => 0, 'containers per shipment' => 10, 'containers' => 0, 'items per container' => 10, 'cost' => 5),
        array('id' => 12, 'name' => 'Canadian Bacon', 'on hand' => 0, 'containers per shipment' => 10, 'containers' => 0, 'items per container' => 10, 'cost' => 5)
    );
    
	// increments the containers by the amount of containers in a pallet.
	// should also do something with cost, but dont worry about it for now
    public function orderSupplies($itemID){
		$supplies[$itemID]['containers'] += $supplies[$itemID]['recieving unit'];
	}
	
	// logic!  check if we are running low, and then open containers or order more.
	public function createSock($stockID){
		foreach ($recipies[$stockID]['ingredients'] as $id){
            if ($supplies[$id]['on hand'] < 5){
                $supplies[$id]['on hand'] += $supplies[$id]['items per container']; // open a container
                $supplies[$id]['containers']--;
            }
			$supplies[$id]['on hand']--; // now a part of the stock
            if($supplies[$id]['containers'] < 5){
                orderSupplies($id); // get more
            }
		}
		$stock[$stockID]['quantity']++;
	}

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// retrieve a single supply
	public function get($which)
	{
		// iterate over the data until we find the one we want
		foreach ($this->supplies as $record)
			if ($record['id'] == $which)
				return $record;
		return null;
	}

	// retrieve all of the supplies
		public function getSupplies()
	{
		return $this->supplies;
	}
}