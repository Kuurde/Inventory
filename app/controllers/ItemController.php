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
	 * Returns a form to edit an item
	 */
	public function getEdit($id)
	{
		$item = Item::find($id);
		return View::make('edit')->with('item', $item);
	}
	
	/**
	 * Persist the changes
	 */
	public function postEdit($id)
	{
		$input = Input::except('_token');
		
		$item = Item::find($id);
		$item->name = $input['name'];
		$item->amount = $input['amount'];
		$item->description = $input['description'];
		$item->save();
		
		return Redirect::to('list');
	}
	
	/**
	 * Delete item
	 */
	public function deleteItem($id)
	{
		$item = Item::find($id);
		$item->delete();
		return Redirect::to('list');
	}

}