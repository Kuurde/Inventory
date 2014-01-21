<?php

class Item extends Eloquent {
	
	public $timestamps = false;
	
	protected $fillable = array('name', 'amount', 'description');
	protected $guarded = array('id');
	
	public static function validate($input, $id = null) {
		if(is_null($id)) {
			$rules = array(
				'name' => 'Required|Unique:items',
				'amount' => 'Required|Integer|Min:1'
			);
		}
		else {
			$rules = array(
				'name' => 'Required|Unique:items,name,'.$id,
				'amount' => 'Required|Integer|Min:1'
			);
		}
		
		return Validator::make($input, $rules);
	}
}