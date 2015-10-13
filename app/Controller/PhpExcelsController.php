<?php
// Excel出力用ライブラリ
App::import( 'Vendor', 'PHPExcel', array('file'=>'phpexcel' . DS . 'PHPExcel.php') );
App::import( 'Vendor', 'PHPExcel_IOFactory', array('file'=>'phpexcel' . DS . 'PHPExcel' . DS . 'IOFactory.php') );
App::import( 'Vendor', 'PHPExcel_Cell_AdvancedValueBinder', array('file'=>'phpexcel' . DS . 'PHPExcel' . DS . 'Cell' . DS . 'AdvancedValueBinder.php') );
// Excel95用ライブラリ
App::import( 'Vendor', 'PHPExcel_Writer_Excel5', array('file'=>'phpexcel' . DS . 'PHPExcel' . DS . 'Writer' . DS . 'Excel5.php') );
App::import( 'Vendor', 'PHPExcel_Reader_Excel5', array('file'=>'phpexcel' . DS . 'PHPExcel' . DS . 'Reader' . DS . 'Excel5.php') );

class PhpExcelsController extends AppController {
	public $name = "PhpExcels";
	public $uses = array('Prefecture');
	public function index(){
		$_read_sheet = EXCEL_SHEET_PATH . "template_order.xlsx";
		// 年_月ディレクトリがあるか調査、無ければ作成
		$ym_dirname = date("Y") . '_' . date("m");
		if ( !file_exists(OUTPUT_EXCEL_SHEET_PATH . 'orders/' . $ym_dirname) ) {
			mkdir(OUTPUT_EXCEL_SHEET_PATH . 'orders/' . $ym_dirname, 0707, true);
		}
		// ファイル名「年月」
		$output_file_name = "USER_REPORT_" . date("YmdHis", time());
		
		// 出力ファイル名設定
		$output_file = $output_file_name . ".xlsx";

	
		// 出力パスを含む、ファイル名
		$output_file_path = 'orders/' . $ym_dirname . '/' . $output_file;
		// 文字コード変換
		$output_file = mb_convert_encoding($output_file, "SJIS", "UTF-8");

		$inputFileType = PHPExcel_IOFactory::identify($_read_sheet);
		// テンプレを読み込んで、PHPExcelオブジェクトを生成する。
		$reader = PHPExcel_IOFactory::createReader($inputFileType);
		 $reader->setReadDataOnly(true);
		$xl = $reader->load($_read_sheet);
		$xl->setActiveSheetIndex(0);		// 0番目のシートを選択
		$sheet = $xl->getActiveSheet();
		// セル「A1」に「エクセルファイル」という文字列を書き込み
		$sheet->setCellValue("A1", "エクセルファイル");

		// セル「B2」に今日の日付を挿入
		$sheet->setCellValue("B2", date("Y/m/d")); 

		$line = 3;
		$users = array(array('id' => 1,'username' => 'aaaa'),array('id' => 2,'username' => 'bbbbb'),array('id' => 3,'username' => 'ccccc'));
		foreach ( $users AS $key => $val ) {

			// セル「A3」に ID を挿入
			$sheet->setCellValue("A".$line, $val['id']);

			// セル「B3」に UserName を挿入
			$sheet->setCellValue("B".$line, $val['username']);

			$line++;
		}
		$writer = PHPExcel_IOFactory::createWriter($xl, $inputFileType);
		// 指定パスに出力
		$file_path =OUTPUT_EXCEL_SHEET_PATH . $output_file_path; //実際のパス
		$writer->save($file_path);
		

		header("Content-Type: application/octet-stream");
		header("Content-Disposition: attachment; filename=$output_file");
		ob_end_clean();
		header("Content-Length:".filesize($file_path));//ダウンロードするファイルのサイズ
		readfile($file_path);
		exit();
	}
	public function admin_index(){
		$this->set('name', 'test');
	}
}
