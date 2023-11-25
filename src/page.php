<?php get_header();
get_template_part('elements/common/page-visual');

if (is_page('service')) {
	get_template_part('elements/pages/service');
} else {
	get_template_part('elements/pages/common');
}
get_footer(); ?>