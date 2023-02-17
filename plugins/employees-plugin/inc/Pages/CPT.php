<?php
/**
 * @package EmployeesPlugin
 */

 namespace Inc\Pages;

 use \Inc\Base\Controller;

 class CPT extends Controller{
    public function register(){
        add_action('init', array($this, 'custom_post_type'));
        add_action( 'init', array($this, 'custom_taxonomy'), 0);
    }

    
    /*-------------------------------------------------------------------------*/
    /*                        CUSTOM POST TYPE                                 */
    /*-------------------------------------------------------------------------*/

    function custom_post_type(){
        $labels = array(
            'name'              => 'Employees',
            'singular_name'     => 'Employee',
            'add_new'           => 'Add Item',
            'all_item'          => 'All Items',
            'edit_item'         => 'Edit Item',
            'view_item'         => 'View Item',
            'search_item'       => 'Search Employees',
            'not_found'         => 'No Employee Found',
            'not_found_in_trash' => 'No Items Found In Trash',
            'parent_item_colon' => 'Parent Item'
        );
        $args = array(
            'labels'            => $labels,
            'public'            => true,
            'has_archive'       => true,
            'menu_icon'         => 'dashicons-groups',
            'public_queryable'  => true,
            'query_var'         => true,
            'rewrite'           => true,
            'capability_type'   => 'post',
            'hierarchical'      => false,
            'supports'          => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
                'revisions'
            ),
            'taxonomies'        => array('department', 'tools'),
            'menu_position'     => 5,
            'exclude_from_search' => false
        );
        register_post_type('employees', $args);
    }

    /*-------------------------------------------------------------------------*/
    /*                        CUSTOM TAXONOMY                                  */
    /*-------------------------------------------------------------------------*/
    function custom_taxonomy(){
        $labels = array(
            'name'  => 'Department',
            'singular_name' => 'Department',
            'search_items' => 'All Departments',
            'parent_item' => 'Parent Department',
            'parent_item_colon' => 'Parent Department:',
            'edit_item' => 'Edit Department',
            'update_item' => 'Update Department',
            'add_new_item' => 'Add New Department',
            'new_item_name' => 'New Department Name',
            'menu_name' => 'Departments'
        );

        $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'department')
        );

        register_taxonomy('department', array('employees'), $args);
        
        //add new taxonomy NOT hierarchical
        // register_taxonomy('tools', 'employees', array(
        //     'label' => 'Tools',
        //     'rewrite' => array('slug' => 'tool'),
        //     'hierarchical' => false
        // ));
    }

    
/*-------------------------------------------------------------------------*/
/*                        CUSTOM TERM FUNCTION                             */
/*-------------------------------------------------------------------------*/
function custom_get_terms($postID, $term){
    $terms_list = wp_get_post_terms($postID, $term);
    $output = ' ';
    $i=0;

    foreach($terms_list as $term){
        $i++;
        if($i>1){
            $output .= ', ';
        }
        $output .= '<a href="'.get_term_link($term).'">'.$term->name.'</a>';
    }
    return $output;
}


 }