<?php
class HomesController extends AppController {
	public $name = "Homes";
	public $uses = array('Prefecture');
	public function index(){
		$this->Session->write('Person.eyeColor', 'Green');
		$select1 =$this->Prefecture->getData(1);
		$this->set('select1', $select1);
		$this->set('name', 'test');
		
	}
	public function admin_index(){
		$this->set('name', 'test');
	}
}
