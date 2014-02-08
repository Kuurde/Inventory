<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

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
		try {
			$item = Item::findOrFail($id);
			return View::make('edit')->with('item', $item);
		} catch (ModelNotFoundException $e) {
			return View::make('errors.missing');
		}
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
		try {
			$item = Item::findOrFail($id);
			$item->delete();
			return Redirect::to('list')->with('message', 'Successfully deleted');
		} catch (ModelNotFoundException $e) {
			return View::make('errors.missing');
		}
	}

}