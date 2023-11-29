<?php
if (is_archive()) {
	$title = get_post_type_object(get_post_type())->label;
	$lead = 'NEWS';
} else if (is_page('service')) {
	$title = get_the_title();
	$lead = 'SERVICE';
} else if (is_page() && !is_page('service')) {
	$title = get_the_title();
	$lead = 'CONTACT';
} else if (is_single()) {
	$title = get_the_title();
	$lead = 'NEWS';
}
?>

<div class="page-visual">
	<figure class="page-visual__background">
		<?php if (is_single() && get_the_post_thumbnail_url(get_the_ID())) {
			echo '<img src="' . get_the_post_thumbnail_url(get_the_ID(), 'full') . '" alt="" class="1440" height="400">';
		} else {
			echo '<img src="' . get_template_directory_uri() . '/assets/img/common/no-image.jpeg" alt="" class="1440" height="400" class="no-image">';
		} ?>
	</figure>
	<div class="page-visual__heading">
		<h1 class="page-visual__heading-title"><?php echo $title; ?></h1>
		<span><?php echo $lead; ?></span>
	</div>
</div>