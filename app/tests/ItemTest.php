<?php

class ItemTest extends TestCase
{
	/*
	 * ********
	 * * LIST *
	 * ********
	 */
	public function testGetListResponse()
	{
		$this->call('GET', 'list');
		$this->assertResponseOk();	
	}
	
	public function testGetListWithItems()
	{
		$this->call('GET', 'list');
		$this->assertViewHas('items');		
	}
	
	/*
	 * ********
	 * * NEW *
	 * ********
	 */
	public function testGetNewResponse()
	{
		$this->call('GET', 'new');
		$this->assertResponseOk();
	}
	
	public function testPostNewWithValidPostData()
	{
		$this->seed();
		$post_data = array('name' => 'chair', 'amount' => 8, 'description' => null);
		$this->call('POST', 'new', $post_data);
		$this->assertRedirectedTo('list');
	}
	
	public function testPostNewWithInvalidPostData()
	{
		$post_data = array('name' => null, 'amount' => 1, 'description' => null);
		$this->call('POST', 'new', $post_data);
		$this->assertRedirectedTo('new');
	}
	
	public function testPostNewWithNoPostData()
	{
		$this->call('POST', 'new');
		$this->assertRedirectedTo('new');
	}
	
	/*
	 * ********
	 * * EDIT *
	 * ********
	 */
	public function testGetEditResponse()
	{
		$item = Item::create(array('name' => 'sofa', 'amount' => 1, 'description' => 'Relax!'));
		$id = $item->id;
		$this->call('GET', 'edit/'.$id);
		$this->assertResponseOk();
	}
	
	public function testGetEditWithItem()
	{
		$item = Item::create(array('name' => 'big sofa', 'amount' => 1, 'description' => 'Relax even more!'));
		$id = $item->id;
		$this->call('GET', 'edit/'.$id);
		$this->assertViewHas('item');
	}
	
	public function testPostEditWithValidPostData()
	{
		$item = Item::where('name', '=', 'sofa')->firstOrFail();
		$id = $item->id;
		$post_data = array('name' => 'sofa', 'amount' => 2, 'description' => 'Double relax!');
		$this->call('POST', 'edit/'.$id, $post_data);
		$this->assertRedirectedTo('list');
	}
	
	public function testPostEditWithInvalidPostData()
	{
		$item = Item::where('name', '=', 'sofa')->firstOrFail();
		$id = $item->id;
		$post_data = array('name' => 'sofa', 'amount' => null, 'description' => 'Double relax!');
		$this->call('POST', 'edit/'.$id, $post_data);
		$this->assertRedirectedTo('edit/'.$id);
	}
	
	public function testPostEditWithNoPostData()
	{
		$item = Item::where('name', '=', 'sofa')->firstOrFail();
		$id = $item->id;
		$this->call('POST', 'edit/'.$id);
		$this->assertRedirectedTo('edit/'.$id);
	}
	
}
