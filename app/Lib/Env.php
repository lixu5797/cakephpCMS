<?php
function loadBootstrap() {
	$envPath = APP . 'Config' . DS . 'Env' . DS . CAKE_ENV . DS . 'bootstrap.php';
	if (is_file($envPath)) {
		include_once $envPath;
	}
}
function loadDatabase() {
	$envPath = APP . 'Config' . DS . 'Env' . DS . CAKE_ENV . DS . 'database.php';
	if (is_file($envPath)) {
		include_once $envPath;
	}
}