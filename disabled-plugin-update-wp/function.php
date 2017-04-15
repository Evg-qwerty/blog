<?php
// Для выключения оповещения об обновлениях добавьте в файл function.php такой код:
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
wp_clear_scheduled_hook( 'wp_update_plugins' );

// Для выключения оповещения об обновлениях для конкретного плагина, добавьте в файл function.php такой код:
$DISABLE_UPDATE = array( 'akismet'); // имя плагина
function filter_plugin_updates( $update ) {
	global $DISABLE_UPDATE; // см. wp-config.php
	if( !is_array($DISABLE_UPDATE) || count($DISABLE_UPDATE) == 0 ){  return $update;  }
	foreach( $update->response as $name => $val ){
		foreach( $DISABLE_UPDATE as $plugin ){
			if( stripos($name,$plugin) !== false ){
				unset( $update->response[ $name ] );
			}
		}
	}
	return $update;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );
