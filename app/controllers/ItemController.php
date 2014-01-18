<?php

class ItemController extends BaseController {
	
	/**
	 * Returns a list of all items
	 */
	public function listItems()
	{
		$items = Item::all();
		return View::make('list')->with('items', $items);
	}
	
	/**
	 * Returns a form to add a new item
	 */
	public function getNew() 
	{
		
	}
	
	/**
	 * Persist the new item
	 */
	public function postNew()
	{
		
	}
	
	/**
	 * Edit item
	 */
	public function editItem($id)
	{
		
	}
	
	/**
	 * Delete item
	 */
	public function deleteItem($id)
	{
		
	}

}