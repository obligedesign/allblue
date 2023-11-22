<?php

//不要な管理画面サイドメニューを削除 (管理者以外)
function remove_menu() {
	global $submenu;
	remove_menu_page('link-manager.php');			// リンク

	remove_menu_page('edit.php');					// 投稿
	if (!current_user_can('level_10')) { //level10以下のユーザーの場合ウィジェットをunsetする
// 		remove_menu_page('index.php');					// ダッシュボード
// 		remove_menu_page('upload.php');					// メディア
		remove_menu_page('edit.php?post_type=page');	// 固定ページ
		remove_menu_page('edit-comments.php');			// コメント
		remove_menu_page('themes.php');					// 外観
 		remove_menu_page('plugins.php');				// プラグイン
		remove_menu_page('users.php');					// ユーザー
		remove_menu_page('tools.php');					// ツール
		remove_menu_page('options-general.php');		// 設定
		remove_menu_page( 'wpcf7' );
	}

}
add_action('admin_menu', 'remove_menu');
