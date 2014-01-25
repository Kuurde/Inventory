<?php

class ItemTest extends TestCase
{
	
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
	
	
	
}
