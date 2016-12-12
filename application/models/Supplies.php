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
	public function createSock($supplyID){
		foreach ($recipies[$supplyID]['ingredients'] as $id){
            if ($supplies[$id]['on hand'] < 5){
                $supplies[$id]['on hand'] += $supplies[$id]['items per container']; // open a container
                $supplies[$id]['containers']--;
            }
			$supplies[$id]['on hand']--; // now a part of the supply
            if($supplies[$id]['containers'] < 5){
                orderSupplies($id); // get more
            }
		}
		$supply[$supplyID]['quantity']++;
	}

	// retrieve a single supply
	public function get($which)
	{
        $sql = sprintf("SELECT * from SUPPLIES where ID = %d", $which);
        $query = $this->db->query($sql);
        return $query->result();
	}

	// retrieve all of the supplies
		public function getSupplies()
	{
		$sql = sprintf("SELECT * from SUPPLIES");
        $query = $this->db->query($sql);
        return $query->result();
	}
    
    public function create($supply){
        $sql = sprintf("INSERT into SUPPLIES (name, onHand, containersPerShipment, containers, itemsPerContainer, cost) VALUES (%s, %d, %d, %d, %d, %d", $supply->name, $supply->onHand, $supply->containersPerShipment, $supply->containers, $supply->itemsPerContainer, $supply->cost);
        $this->db->query($sql);
    }
    
    public function update($supply){
        $sql = sprintf("UPDATE SUPPLIES set name = %s, onHand = %d, containersPerShipment = %d, containers = %d, itemsPerContainer = %d, cost = %d where id = %d", $supply->name, $supply->onHand, $supply->containersPerShipment, $supply->containers, $supply->itemsPerContainer, $supply->cost, $supply->id);
        $this->db->query($sql);
    }
    
    public function delete($id){
        $sql = sprintf("DELETE from SUPPLIES where id = %d", $id);
        $this->db->query($sql);
    }
}