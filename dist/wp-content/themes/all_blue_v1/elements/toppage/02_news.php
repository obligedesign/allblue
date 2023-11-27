<section id="news" class="top-section top-news">
	<div class="top-section__inner top-news__inner">
		<div class="top-news__head inview js-fadeLeft">
			<h2 class="top-news__head-title">NEWS<span>お知らせ</span></h2>
		</div>
		<div class="top-news__content inview js-fadeLeft">
			<?php
			query_posts(
					array(
							'post_type' => array('post'),
							'posts_per_page' => 3,
							'paged' => get_query_var('paged'),
					)
			);
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
			wp_reset_query();
			?>

			<div class="button-group-right">
				<a href="<?php echo home_url('/news/'); ?>" class="button01"><span>READ MORE</span></a>
			</div>
		</div>
	</div>
</section>