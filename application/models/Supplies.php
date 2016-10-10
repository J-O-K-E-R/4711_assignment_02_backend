<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class Supplies extends CI_Model {

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
