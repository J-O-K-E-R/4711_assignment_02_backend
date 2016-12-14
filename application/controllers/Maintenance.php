<?php
/**
 * REST server for everything!
 * ------------------------------------------------------------------------
 */
require APPPATH . '/third_party/restful/libraries/Rest_controller.php';
class Maintenance extends Rest_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('supplies');
        $this->load->model('stock');
        $this->load->model('recipes');
	}
	    
    // get either all supplies or a specific one if specified    
    function supplies_get()
    {
        $key = $this->get('id');
        if (!$key)
        {
            $this->response($this->supplies->getSupplies(), 200);
        } else
        {
            $result = $this->supplies->get($key);
            if ($result != null)
                $this->response($result, 200);
            else
                $this->response(array('error' => 'Supply not found!'), 404);
        }
    }
    
    // same as above
    function stock_get()
    {
        $key = $this->get('id');
        if (!$key)
        {
            $this->response($this->stock->getStock(), 200);
        } else
        {
            $result = $this->stock->get($key);
            if ($result != null)
                $this->response($result, 200);
            else
                $this->response(array('error' => 'Stock not found!'), 404);
        }
    }
    // specific, since we only need to handle getting the recipes for a single item
    function recipesupplies_get(){
        $key = $this->get('id');
        
        $result = $this->recipes->getIngredients($key);
        if ($result != null){
            $this->response($result, 200);
        } else{
            $this->response(array('error' => 'Recipes for item not found!'), 404);
        }
    }
    
    // same as above
    function recipes_get()
    {
        $key = $this->get('id');
        if (!$key)
        {
            $this->response($this->recipes->getRecipes(), 200);
        } else
        {
            $result = $this->recipes->get($key);
            if ($result != null)
                $this->response($result, 200);
            else
                $this->response(array('error' => 'Menu item not found!'), 404);
        }
    }
    // create a supply
    function supplies_post()
    {
        $this->supplies->create(unserialize($_POST['supply']));
        $this->response(array('ok'), 200);
    }
    // create some stock
    function stock_post()
    {
        $key = $this->get('id');
        $record = array_merge(array('id' => $key), $_POST);
        $this->stock->create($record);
        $this->response(array('ok'), 200);
    }
    // needs some extra
    function recipes_post()
    {
        $this->recipes->createRecipe(unserialize($_POST['recipe']), unserialize($_POST['ingredients']), unserialize($_POST['price']));
        $this->response(array('ok'), 200);
    }
    
    // Handle an incoming PUT - update a supply
    function supplies_put()
    {
        $this->supplies->update(unserialize($this->_put_args['supply']));
        $this->response(array('ok'), 200);
    }
    
    function recipes_put()
    {
        $this->recipes->updateRecipe(unserialize($this->_put_args['recipe']), unserialize($this->_put_args['ingredients']), unserialize($this->_put_args['price']));
        $this->response(array('ok'), 200);
    }

    function stock_put(){
    	$this->stock->update(unserialize($this->_put_args['stock']));
    	$this->response(array('ok'), 200);
    }
        
    // delete a supply
    function supplies_delete()
    {
        $key = $this->get('id');
        $this->supplies->delete($key);
        $this->response(array('ok'), 200);
    }
    function recipes_delete()
    {
        $key = $this->get('id');
        $this->recipes->deleteRecipe($key);
        $this->response(array('ok'), 200);
    }

    function recieve_put(){
        $id = $this->get('id');
        $amount = $this->get('amount');
        $this->supplies->orderSupplies($id, $amount);
        $this->response(array('ok'), 200);
    }
}