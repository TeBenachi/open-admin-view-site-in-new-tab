<?php
 /**
 *  
 * @package tebenachioavsnt
 *  
 * Plugin Name:       Open Admin View Site in New Tab
 * Plugin URI:        https://github.com/TeBenachi/open-admin-view-site-in-new-tab
 * Description:       Open admin view site link in a new tab
 * Version:           1.0.0
 * Author:            TeBenachi
 * Author URI:        https://profiles.wordpress.org/utz119/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       tebenachioavsnt
*/

if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}
 
function tebenachioavsnt_scripts() {
    $plugin_url = plugin_dir_url( __FILE__ );
    wp_enqueue_style( 'style',  $plugin_url . "/css/style.css");
};
add_action( 'admin_print_styles', 'tebenachioavsnt_scripts' );


function open_admin_viewsite_newtab ( $wp_admin_bar ) {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    $wp_admin_bar -> add_node([
        'parent'        =>  'site-name',
        'id'            =>  'view-site',
        'href'          =>  home_url( '/' ),
        'meta'          =>  [
            'target'    => '_blank',
            'class'     =>  'external_link'
        ]
    ]);
}
add_action( 'admin_bar_menu', 'open_admin_viewsite_newtab', 80 );