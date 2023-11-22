<?php
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'position' => 4,
		'page_title' => 'トップページ',
		'menu_title' => 'トップページ',
		'menu_slug' => 'theme-toppage-settings',
		'capability' => 'edit_posts',
		'redirect' => false
	));
	acf_add_options_page(array(
		'position' => 20,
		'page_title' => 'サイト設定',
		'menu_title' => 'サイト設定',
		'menu_slug' => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect' => false
	));
}