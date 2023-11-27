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
		<img src="https://picsum.photos/1440/800" alt="" class="1440" height="400">
	</figure>
	<div class="page-visual__heading">
		<h1 class="page-visual__heading-title"><?php echo $title; ?></h1>
		<span><?php echo $lead; ?></span>
	</div>
</div>