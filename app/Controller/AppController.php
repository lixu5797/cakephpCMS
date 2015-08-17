<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $viewClass = 'Smarty';
	public $helpers = array(
		'Session',
		'Html' => array('className' => 'TwitterBootstrap.BootstrapHtml'),
		'Form' => array('className' => 'TwitterBootstrap.BootstrapForm'),
		'Paginator' => array('className' => 'TwitterBootstrap.BootstrapPaginator'),
	);
	public $layout = 'user';
	
	function beforeRender(){
		// 管理者用レイアウトを呼び出す
		if ( Configure::read('Routing.prefixes') && !empty($this->params['admin']) ) {
			$this->layout = 'admin';
		}
	}
	
	public $components = array(
		'Session',
		'Auth' => array(
			'loginRedirect' => array(
				"admin"      => true,
				'controller' => 'homes',
				'action' => 'index'
			),
			'logoutRedirect' => array(
				'controller' => 'homes',
				'action' => 'index',
				'home'
			),
			'authenticate' => array(
				'Form' => array(
					'passwordHasher' => 'Blowfish'
				)
			)
		)
	);

	public function beforeFilter() {
		$this->Auth->allow('index', 'view');
	}
	public function isAuthorized($user) {
		if (isset($user['role']) && $user['role'] === 'admin') {
			return true;
		}

		// デフォルトは拒否
		return false;
	}
}
