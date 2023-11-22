<?php

/**
 * get_breadcrumbs();
 */
function get_breadcrumbs(){
	global $wp_query;
	if ( !is_home() ){
		// Start the UL
		echo '<nav class="breadcrumb"><ul>';
		// Add the Home link
		echo '<li><a href="'. home_url( "/" ) .'">HOME</a></li>';

		if ( is_category() )
		{
			$catTitle = single_cat_title( "", false );
			$cat = get_cat_ID( $catTitle );
			echo "<li class=\"current\"><span class=\"is-current\">". get_category_parents( $cat, TRUE, "" ) ."</span></li>";
		}
		elseif ( is_archive() && !is_category() )
		{
			echo "<li class=\"current\"><span class=\"is-current\">Archives</span></li>";
		}
		elseif ( is_search() ) {

			echo "<li class=\"current\"><span class=\"is-current\">Search Results</span></li>";
		}
		elseif ( is_404() )
		{
			echo "<li class=\"current\"><span class=\"is-current\">404 NOT FOUND</span></li>";
		}
		elseif ( is_singular('recipe') )
		{
			$category = get_the_terms( 0, 'type');
			echo '<li><a href="../../blend/professional">'. $category[0]->name . '</a></li>';
			echo '<li class="current"><span class="is-current">'. get_the_title() . '</span></li>';
		}
		elseif ( is_single() )
		{
			$category = get_the_category();
			$category_id = get_cat_ID( $category[0]->cat_name );

			echo '<li>'. get_category_parents( $category_id, TRUE, "" ) . '</span></li>';
			echo '<li class="current"><span class="is-current">'. get_the_title() . '</span></li>';
		}
		elseif ( is_page() )
		{
			$post = $wp_query->get_queried_object();

			if ( $post->post_parent == 0 ){

				echo "<li class=\"current\"><span class=\"is-current\">".the_title('','', FALSE)."</span></li>";

			} else {
				$title = the_title('','', FALSE);
				$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
				array_push($ancestors, $post->ID);

				foreach ( $ancestors as $ancestor ){
					if( $ancestor != end($ancestors) ){
						echo '<li><a href="'. get_permalink($ancestor) .'">'. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</a></li>';
					} else {
						echo '<li class="current"><span class="is-current">'. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</span></li>';
					}
				}
			}
		}
		elseif ( is_tag() )
		{
			echo "<li class=\"current\"><span class=\"is-current\">Tags</span></li>";
		}
		// End the UL
		echo "</ul></nav>";
	}
}
