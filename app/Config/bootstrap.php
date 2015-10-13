<?php
require_once(APP . DS . 'Lib' . DS . 'Env.php');
loadBootstrap();
// テンプレ置き場
define('EXCEL_SHEET_PATH', TMP . 'files/excel_sheet/');

// 出力パス
define('OUTPUT_EXCEL_SHEET_PATH', TMP . '/output_excel_sheet/');