<?php
/*-------------------------------------------------------------------------*/
/*                        ENQUEUE STYLES                                   */
/*-------------------------------------------------------------------------*/

function custom_enqueue_styles(){
    wp_register_style('customstyle', get_template_directory_uri(). '/css/custom.css', array(), '1.0.0', 'all');
    wp_enqueue_style('customstyle');
}
add_action('wp_enqueue_scripts', 'custom_enqueue_styles');
/*-------------------------------------------------------------------------*/
/*                        REGISTER MENUS                                   */
/*-------------------------------------------------------------------------*/

function register_custom_menus(){
    add_theme_support('menus');

    register_nav_menus(array(
        'primary' => 'Main Menu',
        'secondary' => 'Footer Menu'
    ));
}
add_action('init', 'register_custom_menus');


/*-------------------------------------------------------------------------*/
/*                        REGISTER WIDGETS                                 */
/*-------------------------------------------------------------------------*/

function register_custom_sidebar(){
    add_theme_support('widgets');

    register_sidebar(array(
        'name'          => __( 'Primary Sidebar', 'theme_name' ),
		'id'            => 'sidebar-1',
        'description'   => __( 'A short description of the sidebar.' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
    ));
    register_sidebar( array(
		'name'          => __( 'Secondary Sidebar', 'theme_name' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li></ul>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action('widgets_init', 'register_custom_sidebar');

/*-------------------------------------------------------------------------*/
/*                        THEME SUPPORT                                    */
/*-------------------------------------------------------------------------*/
add_theme_support('post-thumbnails');

add_theme_support('post-formats',array('aside','image','video'));

add_theme_support('custom-header');