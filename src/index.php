<?php
get_header();

get_template_part('elements/toppage/01_mainVisual');
echo '<div class="top-wrapper">';
get_template_part('elements/toppage/02_news');
get_template_part('elements/toppage/03_result');
echo '</div>';

get_footer();
?>
