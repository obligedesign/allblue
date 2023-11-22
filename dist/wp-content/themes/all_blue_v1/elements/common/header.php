<?php
$LogoImg = '<img src="' . get_template_directory_uri() . '/assets/img/common/h-logo.svg" alt="ALL BLUE">';
if (is_home() || is_front_page()) {
	$headerLogoTag = '<h1 class="h-logo"><a href="' . home_url('/') . '">' . $LogoImg . '</a></h1>';
} else {
	$headerLogoTag = '<p class="h-logo"><a href="' . home_url('/') . '">' . $LogoImg . '</a></p>';
}
?>

<header class="header">
	<div class="header__inner">
		<?php echo $headerLogoTag ?>
	</div>
</header>