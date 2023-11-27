<?php 
get_header();
get_template_part('elements/common/page-visual'); ?>
<section class="common-section single-section">
	<div class="common-section__inner">
		<div class="post-content">
			<?php the_content(); ?>
		</div>

		<div class="pager">
			<div class="pager-left<?php if (!get_previous_post()) {
				echo ' is-disabled';
			} ?>">
				<a href="<?php echo get_previous_post()->guid; ?>">
					<span>PREV</span>
				</a>
			</div>
			<div class="pager-center">
				<a href="<?php echo home_url('/news/'); ?>"><span>お知らせ一覧へ戻る</span></a>
			</div>
			<div class="pager-right<?php if (!get_next_post()) {
				echo ' is-disabled';
			} ?>">
				<a href="<?php echo get_next_post()->guid; ?>">
					<span>NEXT</span>
				</a>
			</div>
		</div>

	</div>
</section>
<?php get_footer(); ?>