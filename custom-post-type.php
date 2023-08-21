<?php
/*******************************************************************/
// Testimonial post type
/*******************************************************************/

if( ! class_exists( 'Mazedulislam27_Testimonial_Post_Type' ) ) :
class Mazedulislam27_Testimonial_Post_Type {
	public static $post_type 		= 'testimonial';
	public static $menu_position	= 15;
    public static $taxonomy 		= 'testimonial_category';

	public static function register() {

		// Title
		$labels = array(
			'name'					=> esc_html__( 'Testimonial', 'mazedulislam27' ),
			'singular_name'			=> esc_html__( 'Testimonial', 'mazedulislam27' ),
			'add_new'				=> esc_html__( 'Add New', 'mazedulislam27' ),
			'add_new_item'			=> esc_html__( 'Add New Testimonial', 'mazedulislam27' ),
			'edit_item'				=> esc_html__( 'Edit Testimonial', 'mazedulislam27' ),
			'new_item'				=> esc_html__( 'New Testimonial', 'mazedulislam27' ),
			'view_item'				=> esc_html__( 'View Testimonial', 'mazedulislam27' ),
			'search_items'			=> esc_html__( 'Search Testimonial', 'mazedulislam27' ),
			'not_found'				=> esc_html__( 'No Testimonial found', 'mazedulislam27' ),
			'not_found_in_trash'	=> esc_html__( 'No Testimonial found in trash', 'mazedulislam27' ),
			'parent_item_color'		=> '',
			'menu_name'				=> esc_html__( 'Testimonials', 'mazedulislam27' )
		);

		// Options
		$args = array(
			'labels'				=> $labels,
			'public'				=> true,
			'public_queryable'		=> true,
			'show_ui'				=> true,
			'show_in_menu'			=> true,
			'query_var'				=> true,
			'rewrite'				=> array( 'slug' => self::$post_type ),
			'capability_type'		=> 'post',
			'has_archive'			=> true,
			'hierarchical'			=> true,
			'menu_position'			=> self::$menu_position,
			'menu_icon'				=> 'dashicons-networking',
			'supports'				=> array( 'title','thumbnail','editor' )
		);

		$labels = apply_filters( 'presscore_post_type_' . self::$post_type . '_labels', $labels );
		$args = apply_filters( 'presscore_post_type_' . self::$post_type . '_args', $args );

		register_post_type( self::$post_type, $args );
		flush_rewrite_rules();

        

        // titles
        $texanomy_labels = array(
	        'name'             => esc_html__( 'Testimonials Categories',        'mazedulislam27' ),
	        'singular_name'    => esc_html__( 'Testimonials Category',          'mazedulislam27' ),
	        'all_items'        => esc_html__( 'Testimonials Categories',        'mazedulislam27' ),
	        'parent_item'      => esc_html__( 'Parent Testimonials Category',   'mazedulislam27' ),
	        'parent_item_colon'=> esc_html__( 'Parent Testimonials Category:',  'mazedulislam27' ),
	        'edit_item'        => esc_html__( 'Edit Category',             'mazedulislam27' ), 
	        'update_item'      => esc_html__( 'Update Category',           'mazedulislam27' ),
	        'add_new_item'     => esc_html__( 'Add New Testimonials Category',  'mazedulislam27' ),
	        'new_item_name'    => esc_html__( 'New Testimonials Name',          'mazedulislam27' ),
	        'menu_name'        => esc_html__( 'Testimonials Categories',        'mazedulislam27' )
        );

        $taxonomy_args = array(
            'hierarchical'          => true,
            'public'                => true,
            'labels'                => $texanomy_labels,
            'show_ui'               => true,
            'rewrite'               => array('slug' => 'testimonial_category'),
            'show_admin_column'	=> true,
        );

        $taxonomy_args = apply_filters( 'presscore_taxonomy_' . self::$taxonomy . '_args', $taxonomy_args );

        register_taxonomy( self::$taxonomy, array( self::$post_type ), $taxonomy_args );

	}
}
endif;


/**
 * Register Post Type
 */

if( ! function_exists( 'mazedulislam27_register_post_type' ) ) :
	function mazedulislam27_register_post_type() {
		mazedulislam27_Testimonial_Post_Type::register();
	}
endif;
add_action( 'init', 'mazedulislam27_register_post_type', 10 );
