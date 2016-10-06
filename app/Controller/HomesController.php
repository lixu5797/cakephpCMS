<?php
class HomesController extends AppController {
	public $name = "Homes";
	public function index(){
		
	}
	public function admin_index(){
		$this->set('name', 'test');
	}
}
