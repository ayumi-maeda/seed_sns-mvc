<?php
session_start();
// モデルファイル読み込み
require('models/member.php');

// コントローラーのクラスをインスタンス化
$controller = new MembersController();

// アクション名によって実行するメソッドを変える
switch ($action) {
	case 'signup':
		// var_dump($post);
		$controller->signup($_POST,$_FILES);
		break;
	case 'login':
		$controller->login();
		break;
	case 'check':
		$controller->check($_POST);
		break;
	case 'thanks':
		$controller->thanks();
		break;
	default:
		# code...
		break;
}

class MembersController {

	// members/signup というURLで呼び出される
	function signup($post,$file){
		// session_start();

// formからデータがPOST送信された時
	if(!empty($post)){
//   // 　　　　　↑スーパーグローバル変数
//   // エラー項目の確認
//   // ニックネームのチェック
 if($post['nick_name']== ''){
//    // 変数に行ったん入れる
  $error['nick_name'] = 'blank';
 }

//   // email
 if($post['email']==''){
  $error['email'] = 'blank';
 }
// // password(空チェック、文字の長さチェック：４文字以上)
 if($post['password']==''){
  $error['password'] = 'blank';
 }elseif(strlen($post['password']) < 4){
   $error['password'] = 'length';

 }
//  // 画像ファイルの拡張子チェック($_FILES)
//  $fileName = $files['picture_path']['name'];
//  if (!empty($fileName)) {
    
// // //     // 空でなければ拡張子を取得
// // //     // ファイルネームの後ろから３文字分、字を切り出す
//     $ext = substr($fileName, -3);
//     $ext = strtolower($ext);

//      if ($ext != 'jpg' && $ext != 'gif' && $ext != 'png') {
//        $error['picture_path'] = 'type' ;
//      }
//  }

//  // エラーがない場合
 if (empty($error)){
//   // 画像をアップロード
  // $picture_path = date('YmdHis') . $_FILES['picture_path']['name'];
  // move_uploaded_file($files['picture_path']['tmp_name'], '../member_picture/' . $picture_path);
//   var_dump($_FILES['picture_path']['name']);
//   // セッションに値を保存
  $_SESSION['join'] = $post;
  $_SESSION['join']['picture_path'] = $picture_path; 
//   // リダイレクト処理を実行する関数header()
   header('Location: /seed_sns_fw_quick/members/check');
 }
}
 
//  // 書き直しの処理
// if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'rewrite') {
//     $post = $_SESSION['join'];
//     $error['rewrite'] = true;
// }
		
// 		// 見た目HTMLの表示
		$resouce = 'members';
		$action = 'signup';

		include('views/layouts/application.php');

	}

	// members/login
	function login(){
		echo 'm login';

		$resouce = 'members';
		$action = 'login';

		include('views/layouts/application.php');

	}

	function check($post){
		if (!isset($_SESSION['join'])) {
			   header('Location: index.php');
			   exit();
			 }

			 
			 // DB登録処理
			 

		if(!empty($_POST)){
			 	// モデルを呼び出す
				$member = new Member();
				// 登録処理の実行
				$member->create();

				header("Location: /seed_sns_fw_quick/members/thanks");
			 }

		$resouce = 'members';
		$action = 'check';

		include('views/layouts/application.php');

	}

	function thanks(){
		echo 'm thanks';

		$resouce = 'members';
		$action = 'thanks';

		include('views/layouts/application.php');

	}

}


?>