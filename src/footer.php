<?php
if (!(is_archive() || is_404() || is_page('contact') || is_page('thanks'))) {
	get_template_part('elements/common/reserve');
}
get_template_part('elements/common/access'); ?>
</main>
<footer class="footer">
	<div class="footer__inner">
		<ul class="footer-list">
			<li>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/f-logo.svg" alt="ALL BLUE" loading="lazy">
			</li>
			<?php if (have_rows('footer_list', 'option')) {
				while (have_rows('footer_list', 'option')) {
					the_row();
					$image = wp_get_attachment_image_src(get_sub_field('footer_list_image', 'option'), 'medium');
					?>
					<li>
						<a href="<?php echo get_sub_field('footer_list_url', 'option'); ?>">
							<img src="<?php echo $image[0]; ?>" alt="<?php echo $image[3]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" loading="lazy">
						</a>
					</li>
				<?php }
			} ?>
		</ul>
		<p class="footer-copy-right">&copy; 2023 ALL BLUE</p>
	</div>
</footer>
<?php
wp_footer();
?>

<?php
$reserveUrl = is_home() || is_front_page() ? '/#reserve' : home_url('/') . '#reserve'; ?>
<div class="reserve-move-button">
	<a href="<?php echo $reserveUrl; ?>">
		<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M45.3555 29.0343V15.8319H38.9975V7.275H31.1754L29.5699 15.832H21.6398L20.2489 25.2253L2.4502 21.9892C1.66348 21.8453 0.862993 22.1672 0.394341 22.817C-0.0759714 23.466 -0.129194 24.3267 0.254302 25.0297L8.13262 39.4745C9.2252 41.4779 11.3253 42.725 13.608 42.725H45.7315C47.3247 42.725 48.6624 41.5229 48.8313 39.9387L50 29.0343H45.3555ZM31.2363 24.0216H27.5689V20.3548H31.2363V24.0216ZM40.4036 24.0216H36.736V20.3548H40.4036V24.0216Z" fill="#fff"/>
		</svg>
		<p>乗船ご予約は<br>こちら</p>
	</a>
</div>
</body>
</html>