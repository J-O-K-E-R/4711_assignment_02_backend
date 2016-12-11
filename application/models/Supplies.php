<?php

/**
 * Supplies, and accessors.  Also, ways to update the 'database'.  Will be replaced once we have a database.
 */
class Supplies extends CI_Model {
    
    	// Constructor
	public function __construct()
	{
		parent::__construct();
	}
    
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

	// retrieve a single supply
	public function get($which)
	{
		return $this->db->get($which);
	}

	// retrieve all of the supplies
		public function getSupplies()
	{
		return $this->supplies;
	}
}