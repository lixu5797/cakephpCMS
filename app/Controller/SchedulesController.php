<?php
App::uses('AppController', 'Controller');
/**
 * Schedules Controller
 *
 */
class SchedulesController extends AppController {

/**
 * Scaffold
 *
 * @var mixed
 */
	public $scaffold;
	public $components = array('Security');

	public function admin_index(){
		$this->set('schedules', $this->paginate('Schedule'));
	}

}
