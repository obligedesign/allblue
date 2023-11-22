<?php
// ヘッダーから DNS プリフェッチのタグをすべて削除
function remove_dns_prefetch( $hints, $relation_type ) {
	if ( 'dns-prefetch' === $relation_type ) {
		return array_diff( wp_dependencies_unique_hosts(), $hints );
	}
	return $hints;
}
add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );


// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}

add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );


/**
 * echo slug
 */
function the_slug($echo=true){
    $slug = basename(get_permalink());
    do_action('before_slug', $slug);
    $slug = apply_filters('slug_filter', $slug);
    if( $echo ) echo $slug;
    do_action('after_slug', $slug);
    return $slug;
}


/**
 * auto post slug name
 */
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
	if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
		$slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
	}
	return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4 );


/**
 * more text change
 */
function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


/*
	アーカイブページで現在のカテゴリー・タグ・タームを取得する
*/
function get_current_term(){
	$id;
	$tax_slug;

	if(is_category()){
		$tax_slug = "category";
		$id = get_query_var('cat');
	}else if(is_tag()){
		$tax_slug = "post_tag";
		$id = get_query_var('tag_id');
	}else if(is_tax()){
		$tax_slug = get_query_var('taxonomy');
		$term_slug = get_query_var('term');
		$term = get_term_by("slug",$term_slug,$tax_slug);
		$id = $term->term_id;
	}

	return get_term($id,$tax_slug);
}


/**
 * Is SubPage?
 *
 * Checks if the current page is a sub-page and returns true or false.
 *
 * @param  $page mixed optional ( post_name or ID ) to check against.
 * @return boolean
 */
function is_subpage( $page = null ) {
	global $post;
	// is this even a page?
	if ( ! is_page() ) {
		return false;
	}
	// does it have a parent?
	if ( ! isset( $post->post_parent ) OR $post->post_parent <= 0 ) {
		return false;
	}
	// is there something to check against?
	if ( ! isset( $page ) ) {
		// yup this is a sub-page
		return true;
	} else {
		// if $page is an integer then its a simple check
		if ( is_int( $page ) ) {
			// check
			if ( $post->post_parent == $page ) {
				return true;
			}
		} else if ( is_string( $page ) ) {
			// get ancestors
			$parent = get_ancestors( $post->ID, 'page' );
			// does it have ancestors?
			if ( empty( $parent ) ) {
				return false;
			}
			// get the first ancestor
			$parent = get_post( $parent[0] );
			// compare the post_name
			if ( $parent->post_name == $page ) {
				return true;
			}
		}

		return false;
	}
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4 );


function is_child( $slug = "" ) {
	if(is_singular())://投稿ページのとき（固定ページ含）
		global $post;
		if ( $post->post_parent ) {//現在のページに親がいる場合
			$post_data = get_post($post->post_parent);//親ページの取得
			if($slug != "") {//$slugが空じゃないとき
				if(is_array($slug)) {//$slugが配列のとき
					for($i = 0 ; $i <= count($slug); $i++) {
						if($slug[$i] == $post_data->post_name || $slug[$i] == $post_data->ID || $slug[$i] == $post_data->post_title) {//$slugの中のどれかが親ページのスラッグ、ID、投稿タイトルと同じのとき
							return true;
						}
					}
				} elseif($slug == $post_data->post_name || $slug == $post_data->ID || $slug == $post_data->post_title) {//$slugが配列ではなく、$slugが親ページのスラッグ、ID、投稿タイトルと同じのとき
					return true;
				} else {
					return false;
				}
			} else {//親ページは存在するけど$slugが空のとき
				return true;
			}
		}else {//親ページがいない
			return false;
		}
	endif;
}


/**
 * Custom Field Get for Term & Category
 *
 * @param $term
 * @param $fieldName
 *
 * @return mixed|null|void
 */
function get_term_acf ( $term , $fieldName, $termID ){
	$term_slug = get_query_var($term);
	$term_ID = $termID ? $termID : get_term_by('slug',$term_slug, $term )->term_id;
	$return = get_field( $fieldName, $term . '_'.$term_ID);
	return $return;
}



//
////カスタム投稿等のアーカイブ表示件数制御
//function get_posts_value($query){
//	if ( $query->is_main_query() && ! is_admin() && (is_post_type_archive('lineup') )){
//		$query->set( 'posts_per_page', 12 );
//	}
//	if ( $query->is_main_query() && ! is_admin() && (is_post_type_archive('review') )){
//		$query->set( 'posts_per_page', 16 );
//	}
//}
//add_action( 'pre_get_posts', 'get_posts_value' );




function wp_is_mobile_pad() {
	static $is_mobile;

	if ( isset($is_mobile) )
		return $is_mobile;

	if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
		$is_mobile = false;
	} elseif (
		strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false ) {
		$is_mobile = true;
	} elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') == false) {
		$is_mobile = true;
	} elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false) {
		$is_mobile = false;
	} else {
		$is_mobile = false;
	}

	return $is_mobile;
}

function the_excerpt_max_charlength($charlength, $display = true) {
	$excerpt = get_the_excerpt();
	$charlength++;

	$rt='';

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			$rt .= mb_substr( $subex, 0, $excut );
		} else {
			$rt .= $subex;
		}
		$rt .= '...';
	} else {
		$rt .= $excerpt;
	}

	if($display){
		echo $rt;
	}else{
		return $rt;
	}
}

// Contact Form 7の自動pタグ無効
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
	return false;
}
