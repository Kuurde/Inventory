<?php

class Item extends Eloquent {
	
	public $timestamps = false;
	
	protected $fillable = array('name', 'amount', 'description');
	protected $guarded = array('id');
	
	public static function validate($input) {
		$rules = array(
			'name' => 'Required',
			'amount' => 'Required|Integer|Min:1'
		);
		
		return Validator::make($input, $rules);
	}
}