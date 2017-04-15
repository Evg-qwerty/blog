<?php

function no_more_jumping($post) {
	return '<a href="'.get_permalink($post->ID).'" class="read-more">'.'Подробнее'.'</a>';
}
add_filter('the_content_more_link', 'no_more_jumping');
