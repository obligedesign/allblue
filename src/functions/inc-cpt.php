<?php
/**
 * カスタム投稿タイプを指定
 * @return array
 */
function cptDataRtn() {
	$cptData = array(
		0 => array(
			'slug' => 'works',
			'name' => 'Works'
		),
	);
	return $cptData;
}
$cptData = cptDataRtn();

/**
 * カスタム投稿タイプ追加
 */
function custom_post_add_init() {
	foreach ( cptDataRtn() as $value ) {
		register_post_type( $value['slug'], addPostArg( $value['name'] ) );
	}
}

/**
 * アイキャッチ有効化用配列生成
 */
function cptSlugArray() {
	$i      = 2;
	$cpt[0] = 'post';
	$cpt[1] = 'page';
	foreach ( cptDataRtn() as $value ) {
		$cpt[ $i ] = $value['slug'];
		$i ++;
	}
	return $cpt;
}


/**
 * ターム追加
 */
register_taxonomy(
	'works-category','works',
	array(
			'hierarchical' => true,
			'label' => 'Category',
			'show_in_rest' => true
	)
);

/**
 * 追加アクション
 */
add_action( 'init', 'custom_post_add_init' );
add_filter( 'post_updated_messages', 'postMessage' );
add_theme_support( 'post-thumbnails', cptSlugArray() );


/**
 * カスタム投稿タイプ追加配列生成
 *
 * @param $postName
 *
 * @return array
 */
function addPostArg( $postName ) {
	$labels = array(
		'name'               => _x( $postName, 'post type general name' ),
		'singular_name'      => _x( $postName, 'post type singular name' ),
		'add_new'            => _x( '新しく' . $postName . 'を登録', 'item' ),
		'add_new_item'       => __( '新規' . $postName . 'を登録する' ),
		'edit_item'          => __( $postName . 'を編集' ),
		'new_item'           => __( '新しい' . $postName ),
		'view_item'          => __( $postName . 'を見る' ),
		'search_items'       => __( $postName . 'を探す' ),
		'not_found'          => __( $postName . 'はありません' ),
		'not_found_in_trash' => __( 'ゴミ箱に' . $postName . 'はありません' ),
		'parent_item_colon'  => ''
	);
	$args   = array(
			'labels'             => $labels,
			'public'             => $postName === '開発/運営実績',
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'rewrite'            => true,
			'capability_type'    => 'post',
			'hierarchical'       => true,
			'menu_position'      => 5,
			'supports'           => array( 'title', 'editor', 'thumbnail', 'revisions' ),
			'has_archive'        => true,
			'show_in_rest'       => false
	);
	return $args;
}

/**
 * ポストメッセージの登録
 *
 * @param $postName
 * @param $postSlug
 *
 * @return mixed
 */
function postMessage( $messages ) {
	$cptData = cptDataRtn();
	foreach ( $cptData as $value ) {
		$messages[ $value['slug'] ] = array(
			0  => '', // ここは使用しません
			1  => sprintf( __( $value['name'] . 'を更新しました <a href="%s">' . $value['name'] . 'を見る</a>' ), esc_url( get_permalink( $post_ID ) ) ),
			2  => __( 'カスタムフィールドを更新しました' ),
			3  => __( 'カスタムフィールドを削除しました' ),
			4  => __( $value['name'] . '更新' ),
			5  => isset( $_GET['revision'] ) ? sprintf( __( ' %s 前に' . $value['name'] . 'を保存しました' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6  => sprintf( __( $value['name'] . 'が公開されました' ), esc_url( get_permalink( $post_ID ) ) ),
			7  => __( $value['name'] . 'を保存' ),
			8  => sprintf( __( $value['name'] . 'を送信' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
			9  => sprintf( __( $value['name'] . 'を予約投稿しました: <strong>%1$s</strong>' ),
				date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
			10 => sprintf( __( $value['name'] . 'の下書きを更新しました' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) )
		);
	}
	return $messages;
}
