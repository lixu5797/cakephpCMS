<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
/**
 * User Model
 *
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			array(
				'rule' => array('isUnique'),
				'message' => '既に使用されている名前です。'
			),
			array(
				'rule' => 'alphaNumeric', //半角英数字のみ
				'message' => '名前は半角英数字にしてください。'
			),
			array(
				'rule' => array('between', 2, 32), //2～32文字
				'message' => '名前は2文字以上32文字以内にしてください。'
			)
		),
		'mail_adress' => array(
			array(
				'rule' => array('isUnique'),
				'message' => '既に使用されているメールアドレスです。'
			),
			array(
				'rule' => array('email', true),
				'message' => '有効なメールアドレスを入力してください。'
			),
		),
		'password' => array(
			array(
				'rule' => 'alphaNumeric',
				'message' => 'パスワードは半角英数字にしてください。'
			),
			array(
				'rule' => array('between', 8, 32),
				'message' => 'パスワードは8文字以上32文字以内にしてください。'
			)
		),
		'role' => array(
			'valid' => array(
				'rule' => array('inList', array('admin', 'author')),
				'message' => 'Please enter a valid role',
				'allowEmpty' => false
			)
		)
	);
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$this->data[$this->alias]['password']
			);
			$this->data[$this->alias]['password_security'] = Crypt::encrypt($this->data[$this->alias]['password']);
		}

		return true;
	}
}
