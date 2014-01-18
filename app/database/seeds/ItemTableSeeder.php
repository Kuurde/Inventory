<?php

class ItemTableSeeder extends Seeder {
	
	public function run()
	{
		DB::table('items')->delete();
		
		Item::create(array('name' => 'spoon', 'amount' => 2));
		Item::create(array('name' => 'table', 'amount' => 1, 'description' => '100 x 60 cm'));
		Item::create(array('name' => 'drinking glass', 'amount' => 12, 'description' => '6 with flowers on, 6 blanco'));
	}
	
}
