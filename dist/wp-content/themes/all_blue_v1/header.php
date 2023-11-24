<!DOCTYPE html>
<html lang="ja" prefix="og: http://ogp.me/ns#">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php
		wp_title(' &laquo; ', true, 'right');
		bloginfo('name');
		?></title>

	<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/css/styles.css?'; ?>" media="all">

	<?php
	wp_deregister_script( 'jquery' );
	wp_enqueue_script('jquery','https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js');
	wp_head();
	?>
	<script></script>

	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/app.js" defer></script>
</head>
<body<?php
if (is_home() || is_front_page()) {
	$pageClass='page-index';
} else if(is_singular('post') || is_singular('news')) {
	$pageClass='page-under page-single';
} else if (is_category() || is_archive() || is_tax() || is_post_type_archive()) {
	$pageClass = 'page-under page-archive';
} else if (is_page() || is_404()) {
	$pageClass = 'page-under page-page page-' . the_slug(false);
} else {
	$pageClass='page-under';
}
echo ' class="'.$pageClass.' pageID-' . get_the_ID() . '"'; ?>><a id="pagetop"></a>
<span class="openLoader"><span class="loader is-active"></span></span>

<?php
get_template_part('elements/common/header');
get_template_part('elements/common/drawer-navigation');
?>

<main id="main">