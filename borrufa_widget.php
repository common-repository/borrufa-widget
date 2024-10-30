﻿<?php
/*
Plugin Name: Borrufa Widget
Plugin URI: https://laborrufa.com/borrufa-widget/
Description: Mètode senzill per afegir a la barra lateral o al peu del tema, les notícies de les comarques del Pirineu de Lleida, publicades diàriament a La borrufa, compatible per a qualsevol tema WordPress.
Author: Jordi Soler
Version: 1.0.4
Author URI: https://laborrufa.com
License:   GPL2

*/

   // Càrrega del widget a WP.
require_once("borrufa_widget_class.php");
add_action("widgets_init","borrufa_widget_carrega");
if (!function_exists("borrufa_widget_carrega"))
{
	function borrufa_widget_carrega()
	{
		register_widget("borrufa_widget_class");
	}
		
		wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker' );
}