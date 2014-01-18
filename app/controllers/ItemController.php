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
		return View::make('new');
	}
	
	/**
	 * Persist the new item
	 */
	public function postNew()
	{
		$input = Input::except('_token');
		
		$item = new Item;
		$item->name = $input['name'];
		$item->amount = $input['amount'];
		$item->description = $input['description'];
		$item->save();
		
		return Redirect::to('list');
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