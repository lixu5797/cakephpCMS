<?php
App::uses('Crypt', 'Lib');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Crypt
 *
 * @author rikyoku
 */
class Crypt {
	//put your code here
	static public function encrypt($text) {
		return base64_encode(Security::rijndael($text, Configure::read('constants.crypt_key'), 'encrypt'));
	}

	static public function decrypt($text) {
		return Security::rijndael(base64_decode($text), Configure::read('constants.crypt_key'), 'decrypt');
	}

}
