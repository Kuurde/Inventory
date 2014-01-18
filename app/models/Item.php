<?php

class Item extends Eloquent {
	
	public $timestamps = false;
	
	protected $fillable = array('name', 'amount', 'description');
	protected $guarded = array('id');
	
}