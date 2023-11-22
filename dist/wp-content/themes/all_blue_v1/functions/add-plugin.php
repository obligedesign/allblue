<?php

// Public Post Previewの有効期限設定
add_filter( 'ppp_nonce_life', 'my_nonce_life' );
function my_nonce_life() {
	return 60 * 60 * 24 * 4; // 5 days
}