<?php
add_action('admin_print_footer_scripts', function () {

	if (wp_script_is('quicktags')){
		echo <<<EOF
<script type="text/javascript">
	QTags.addButton('heading01', '大見出し', '<h2>', '</h2>', '', 'H2大見出し', 1);
  QTags.addButton('heading01Center', '大見出し（中央寄せ）', '<h2 class="text-center">', '</h2>', '', 'H2大見出し', 2);
  QTags.addButton('heading02', '中見出し', '<h3>', '</h3>', '', 'H3中見出し', 3);
  QTags.addButton('heading02Center', '中見出し（中央寄せ）', '<h3 class="text-center">', '</h3>', '', 'H3中見出し', 4);
  QTags.addButton('btn01', 'ボタン', '<a href="" class="btn01">テキスト</a>', '', '', 'ボタン', 5);
  
  QTags.addButton('caption-box', '左線キャプション', '<div class="caption-box">\\n<h3>見出し</h3>\\n<p>テキスト</p>\\n</div>', '', '', '左線キャプション', 6);
  QTags.addButton('info-box', 'INFORMATIONボックス', '<div class="info-box">\\n<div class="text">\\n<strong>INFORMATION</strong>\\n<h3>/*タイトル*/</h3>\\n<p>/*詳細テキスト*/</p>\\n</div>\\n<div class="thumb">\\n/*画像*/\\n</div>\\n</div>', '', '', 'INFORMATIONボックス', 7);
  QTags.addButton('content-slider', '画像スライダー', '<div class="slider">\\n<div class="swiper-wrapper">\\n<div class="swiper-slide">\\n/*画像*/\\n</div>\\n<div class="swiper-slide">\\n/*画像*/\\n</div>\\n</div>\\n<div class="swiper-button-prev"></div>\\n<div class="swiper-button-next"></div>\\n</div>', '', '', '画像スライダー', 8);
  QTags.addButton('table', 'テーブル', '<table>\\n<tbody>\\n<tr>\\n<th>見出し</th>\\n<td>テキスト</td>\\n</tr>\\n<tr>\\n<th>見出し</th>\\n<td>テキスト</td>\\n</tr>\\n<tr>\\n<th>見出し</th>\\n<td>テキスト</td>\\n</tr>\\n</tbody>\\n</table>', '', '', 'テーブル', 9);
</script>

EOF;

	}

},100);
?>