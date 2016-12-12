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
        $result = $query->result();
        $reset = reset($result);
        return $reset;
	}

    //creates an stock item
    public function createStock($itemID)
    {
        //Gets whole array from recipes
        $items = $this->recipes->all();
        //gets the ingredient KVP from the items array - doesn't actually work right now.
        $ingredients = $items[$itemID]['ingredients'];
        //for every item id in the recipes ingredients array, decrement the supplies
        foreach ($ingredients as $ingredient)
            decreaseSupplies($ingredient);
        //increase the stock item by 1
        $this->stock[$itemID]['quantity']++;
    }
        
    public function buildStock($stockID){
        $sql = spritnf("UPDATE supplies s INNER JOIN recipesupplies rs ON rs.supplyID = s.id SET s.onhand = (s.onhand - rs.amount) WHERE  rs.recipeid = %d", $stockID);
        $this->db->query($sql);
        
        $sql2 = sprintf("UPDATE stock SET quantity = quantity + 1 where id = %d", $stockID);
        $this->db->query($sql2);
    }
    
    public function sellStock($stockID){
        $sql = sprintf("UPDATE stock SET quantity = quantity - 1 where id = %d", $stockID);
        $this->db->query($sql);
        
        // do xml selling thing here
    }
    
    // takes a stock object that looks like it does in the db, runs sql query
    public function create($stock){
        $sql = sprintf("INSERT into STOCK (name, price, quantity) VALUES ('%s', %d, %d)", $stock->name, $stock->price, $stock->quantity);
        $this->db->query($sql);
    }
    
    // same as above
    public function update($stock){
        $sql = sprintf("UPDATE STOCK set name = '%s', price = %d, quantity = %d where id = %d", $stock->name, $stock->price, $stock->quantity, $stock->id);
        $this->db->query($sql);
    }
    
    // takes an id, deletes a row from db
    public function delete($id){
        $sql = sprintf("DELETE from STOCK where id = %d", $id);
        $this->db->query($sql);
    }
}
