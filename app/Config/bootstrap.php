<?php

// 環境識別
require_once(APP . DS . 'Lib' . DS . 'Env.php');
// 環境判断
loadBootstrap();
// 暗号化ライブラリ
require_once(APP . DS . 'Lib' . DS . 'Crypt.php');

config('define');
