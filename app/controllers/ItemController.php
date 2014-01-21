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
		
		$validator = Item::validate($input);
		
		if($validator->passes()) {
			$item = new Item;
			$item->name = $input['name'];
			$item->amount = $input['amount'];
			$item->description = $input['description'];
			$item->save();
			
			return Redirect::to('list');
		}
		else {
			Input::flash();
			return Redirect::to('new')->withErrors($validator->messages());
		}
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
		
		$validator = Item::validate($input, $id);
		
		if($validator->passes()) {
			$item = Item::find($id);
			$item->name = $input['name'];
			$item->amount = $input['amount'];
			$item->description = $input['description'];
			$item->save();
			
			return Redirect::to('list');
		}
		else {
			Input::flash();
			return Redirect::to('edit/'.$id)->withErrors($validator->messages());
		}
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