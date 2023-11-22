<?php
/*
 * pagination
 *
 * @param $_all_page_num 前ページ数
 * @param $_show_item_range 表示するページネーション数
 *
 * <<first <prev 5 6 ⑦ 8 9 Next> Last>>
 * このようなページネーションだった場合、5 6 もしくは 8 9 の部分が
 * $_show_item_range数となる
 *
 */
function pagination($_all_page_num = '', $_show_item_range = 2) {
// $_show_item_range数から何ページ分ページネーションを作成するか計算する
	$showitems = ($_show_item_range) + 1;
// 現在のページ数(変数名変更不可)
	global $paged;
// 現在のページ数がなければ1ページ目とする
	if (empty($paged)) {
		$paged = 1;
	}
	// ページ数の指定が無かった場合
	if ($_all_page_num == '') {
		global $wp_query;
// 記事数を取得する
		$_all_page_num = $wp_query->max_num_pages;
// 記事数が取得できなかった場合
		if (!$_all_page_num) {
// 総ページ数は1とする
			$_all_page_num = 1;
		}
	}
// ページ数が2ページ以上の場合にページネーションを作成する
	if ($_all_page_num >= 1) {
// Page X of Y の表示
//		echo "<div class=\"pagination\"><span>Page ".$paged." of ".$_all_page_num."</span>";
		echo "<aside class=\"pagination\">";
// 一つ前に戻るボタン
		if ( $paged > 1) {
			echo '<a href="' . get_pagenum_link( $paged - 1 ) . '" class="prev"><svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.5 18L15.5 12L9.5 6" stroke="#170B00" stroke-width="2"/></svg></a>';
		}
// 現在のページと、左右$_show_item_range分のボタン
		for ($i = 1; $i <= $_all_page_num; $i++){
			if (!($i >= $paged + $_show_item_range + 1 || $i <= $paged - $_show_item_range - 1)
			    || $_all_page_num <= $showitems) {
// 現在のページ(クリックできない)
				if ($paged == $i) {
					echo "<a href='" . get_pagenum_link( $i ) . "' class='is-current'>" . $i . "</a>";
				} // 左右$_show_item_range分のボタン
				else {
					echo "<a href='" . get_pagenum_link( $i ) . "'>" . $i . "</a>";
				}
			}
		}
// 一つ進むボタン
		if ( $paged < $_all_page_num) {
			echo '<a href="' . get_pagenum_link( $paged + 1 ) . '" class="next"><svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.5 18L15.5 12L9.5 6" stroke="#170B00" stroke-width="2"/></svg></a>';
		}

		echo "</aside>";
	}
}