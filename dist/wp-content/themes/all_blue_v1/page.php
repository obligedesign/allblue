<?php get_header();
get_template_part('elements/common/page-visual');

if (is_page('service')) {
	get_template_part('elements/pages/service');
} else if (is_page('thanks')) {
	get_template_part('elements/pages/thanks');
} else {
	get_template_part('elements/pages/common');
}
get_footer(); ?>