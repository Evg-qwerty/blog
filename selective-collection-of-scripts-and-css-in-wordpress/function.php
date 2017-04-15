<?php

if ( in_category(1) || post_is_in_descendant_category(1) ) {
	wp_enqueue_script('script_name');
}
//  проверить отношение поста к дереву категорий (если нужно)
function post_is_in_descendant_category( $cats, $_post = null ){
	foreach ( (array) $cats as $cat ) {
		// get_term_children() accepts integer ID only
		$descendants = get_term_children( (int) $cat, 'category');
		if( $descendants && in_category( $descendants, $_post ) )
			return true;
	}
	return false;
}
