<?php get_header();
get_template_part('elements/common/page-visual'); ?>
	<section class="common-section">
		<div class="common-section__inner">
			<?php
			if (have_posts()) {
				echo '<ul class="news-list">';
				while (have_posts()) {
					the_post();
					?>
					<li>
						<a href="<?php the_permalink() ?>">
							<time class="news-list__date" datetime="<?php echo get_the_date('Y-n-j'); ?>">
								<?php echo get_the_date('Y.n.j'); ?>
							</time>
							<h3 class="news-list__title">
								<?php the_title(); ?>
							</h3>
						</a>
					</li>
					<?php
				}
				echo '</ul>';
			} else {
				echo '<p>お知らせがありません</p>';
			}

			if (function_exists('pagination')) {
				pagination($additional_loop->max_num_pages);
			}

			wp_reset_query();
			?>
		</div>
	</section>

<?php get_footer(); ?>