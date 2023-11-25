<?php get_header(); ?>
<div class="page-visual">
	<figure class="page-visual__background">
		<img src="https://picsum.photos/1440/800" alt="" class="1440" height="400">
	</figure>
	<div class="page-visual__heading">
		<h1 class="page-visual__heading-title">お探しのページが見つかりません</h1>
		<span>404 Not Found</span>
	</div>
</div>
<section class="common-section">
	<div class="common-section__inner">
		<p class="not-found__description">アクセスしようとしたページは削除されたかURLが<br>
			変更されているため、見つけることができません。<br>
			お手数ですが、以下の方法でページをお探しください。</p>
		<div class="button-group">
			<a href="<?php echo home_url('/'); ?>" class="button01">TOPへ戻る</a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
