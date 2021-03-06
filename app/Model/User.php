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
		'mail_address' => array(
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
			),
			'match' => array(
				'rule' => array('confirmPassword', 'confirm_password'),
				'message' => '一致しません。'
			)
		),
		'role' => array(
			'valid' => array(
				'rule' => array('inList', array('admin', 'author')),
				'message' => 'Please enter a valid role',
				'allowEmpty' => false
			)
		),
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);
	
	public function confirmPassword($field, $confirm_password){
		if ($field['password'] === $this->data[$this->name][$confirm_password]) {
			return true;
		}
	}
	
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

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $actsAs = array('Acl' => array('type' => 'requester'));

	public function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		if (isset($this->data['User']['group_id'])) {
			$groupId = $this->data['User']['group_id'];
		} else {
			$groupId = $this->field('group_id');
		}
		if (!$groupId) {
			return null;
		} else {
			return array('Group' => array('id' => $groupId));
		}
	}
}
