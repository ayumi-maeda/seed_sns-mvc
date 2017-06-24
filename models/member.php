<?php 
	class Member{
		// プロパティ
		private $dbconnect = '';

		// コンストラクタ
		function __construct(){
			// DB接続ファイルを読み込む
			require('dbconnect.php');
			
			// DB接続設定の値をプロパティに代入
			$this->dbconnect = $db;
		}

		function create(){
			// var_dump("model member の create");

			// sql文の作成
			$sql = sprintf('INSERT INTO `members`(`nick_name`,`email`, `password`, `picture_path`, `created`, `modified`) VALUES("%s","%s","%s","%s", now(),now());',
			    mysqli_real_escape_string($this->dbconnect,$_SESSION['join']['nick_name']),
			    mysqli_real_escape_string($this->dbconnect,$_SESSION['join']['email']),
			    mysqli_real_escape_string($this->dbconnect,sha1($_SESSION['join']['password'])),
			    mysqli_real_escape_string($this->dbconnect,$_SESSION['join'][''])
			    );
			  
			// sql文の実行
			// $this->dbconnect
			mysqli_query($this->dbconnect,$sql) or die(mysqli_error($this->dbconnect));
		}

		function uadate(){

		}
	}
?>