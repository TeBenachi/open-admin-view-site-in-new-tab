<?php
 /**
 *  
 * @package tebenachioavsnt
 *  
 * Plugin Name:       Open Admin View Site in New Tab
 * Plugin URI:        https://github.com/TeBenachi/open-admin-view-site-in-new-tab
 * Description:       Open admin view site link in a new tab
 * Version:           1.0.0
 * Requires at least: 5.2
 * Tested up to:      5.6
 * Author:            TeBenachi
 * Author URI:        https://profiles.wordpress.org/utz119/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       oavsnt
*/
 
function oavsnt_enqueue_scripts() {
    $plugin_url = plugin_dir_url( __FILE__ );
    wp_enqueue_style( 'style',  $plugin_url . "/css/style.css");
};
add_action( 'admin_print_styles', 'oavsnt_enqueue_scripts' );


function oavsnt_open_ext_link ( $wp_admin_bar ) {
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
add_action( 'admin_bar_menu', 'oavsnt_open_ext_link', 80 );