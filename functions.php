<?php
require get_template_directory().'/inc/featured_hero_carousel.php';
require get_template_directory().'/inc/destinations.php';
?>

<?php

function travio_theme_setup(){
    add_theme_support('title-tag');
    register_nav_menus(
        array(
            'primary'=>__('Primary Menu')
            )
    );
};
add_action('init', 'travio_theme_setup');

function themename_custom_logo_setup() {
    $defaults = array(
    'height'      => 400,
    'width'       => 400,
    'flex-height' => false,
    'flex-width'  => false,
    'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
   }
   add_action( 'after_setup_theme', 'themename_custom_logo_setup' );
   

add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );
add_image_size('square',1712,1712);




function travio_scripts(){
    
    wp_enqueue_style('owl-carousel-min', get_template_directory_uri().'/assets/css/owl.carousel.min.css');
    wp_enqueue_style('fontawesome', get_template_directory_uri().'/assets/css/all.css', array(), rand(111,9999), 'all');
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css');
    wp_enqueue_style('style', get_stylesheet_uri(), array(), rand(111,9999), 'all');
    wp_enqueue_script('jquery');
    wp_enqueue_script('travio-bootstrapscript', get_template_directory_uri().'/assets/js/bootstrap.bundle.min.js');
    wp_enqueue_script('owl-carousel', get_template_directory_uri().'/assets/js/owl.carousel.min.js');
    wp_enqueue_script('script', get_template_directory_uri().'/assets/js/scripts.js');
}
add_action('wp_enqueue_scripts','travio_scripts');
?>

<?php

if ( ! file_exists( get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php' ) ) {
    // File does not exist... return an error.
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // File exists... require it.
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}

function register_navwalker(){
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );
?>

<?php
function travio_widgets(){
    register_sidebar( array(
        'name'=>'Social Icons',
        'id'=>'travio_widgets_social',
        'before_widget'=>'<div class="widget">',
        'after_widget'=>'</div>',
        'before_title'=>'<h3>',
        'after_title'=>'</h3>'
    ));
    register_sidebar( array(
        'name'=>'Footer',
        'id'=>'travio_widgets_footer',
        'before_widget'=>'<div class="widget">',
        'after_widget'=>'</div>',
        'before_title'=>'<h3>',
        'after_title'=>'</h3>'
    ));
}
add_action('widgets_init','travio_widgets');

?>

<?php
/**
 * Adds Foo_Widget widget.
 */
class Foo_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'foo_widget', // Base ID
			esc_html__( 'Social Link', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Add social media icon', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['link'] ) && ! empty( $instance['html'] )) {
            ?> <a href="<?php echo $instance['link']; ?>"><i class="<?php echo $instance['html']; ?>"></i></a>
            <?php
        }
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        $link = ! empty( $instance['link'] ) ? $instance['link'] : esc_html__( 'New link', 'text_domain' );
        $html = ! empty( $instance['html'] ) ? $instance['html'] : esc_html__( 'New font awesome code', 'text_domain' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php esc_attr_e( 'Link:', 'text_domain' ); ?></label> 
        <input class="widefat" 
        id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" 
        name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" 
        type="text" 
        value="<?php echo esc_attr( $link ); ?>">
        </p>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'html' ) ); ?>"><?php esc_attr_e( 'Font Awesome Code:', 'text_domain' ); ?></label> 
        <input class="widefat" 
        id="<?php echo esc_attr( $this->get_field_id( 'html' ) ); ?>" 
        name="<?php echo esc_attr( $this->get_field_name( 'html' ) ); ?>" 
        type="text" 
        value="<?php echo esc_attr( $html ); ?>">
        </p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
        $instance['link'] = ( ! empty( $new_instance['link'] ) ) ? sanitize_text_field( $new_instance['link'] ) : '';
        $instance['html'] = ( ! empty( $new_instance['html'] ) ) ? sanitize_text_field( $new_instance['html'] ) : '';

		return $instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function register_foo_widget() {
    register_widget( 'Foo_Widget' );
}
add_action( 'widgets_init', 'register_foo_widget' );

?>

<?php
function mytheme_customize_register( $wp_customize ) {
	//All our sections, settings, and controls will be added here

	// add new section
	$wp_customize->add_section( 'bwpy_theme_colors', array(
		'title' => __( 'Theme Colors', 'bwpy' ),
		'priority' => 100,
	) );

	// add color picker setting
	$wp_customize->add_setting( 'nav-color', array(
		'default' => '#3a6fff',
	) );

	// add color picker control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav-color', array(
		'label' => 'Navigation Color',
		'section' => 'bwpy_theme_colors',
		'settings' => 'nav-color',
	) ) );



	// add color picker setting
	$wp_customize->add_setting( 'nav-text-color', array(
		'default' => '#ffffff',
	) );

	// add color picker control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav-text-color', array(
		'label' => 'Navigation Text Color',
		'section' => 'bwpy_theme_colors',
		'settings' => 'nav-text-color',
	) ) );



	// add color picker setting
	$wp_customize->add_setting( 'heading-color', array(
		'default' => '#3a6fff',
	) );

	// add color picker control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'heading-color', array(
		'label' => 'Heading Color',
		'section' => 'bwpy_theme_colors',
		'settings' => 'heading-color',
	) ) );
	
	
	
	// add color picker setting
	$wp_customize->add_setting( 'text-color', array(
		'default' => '#3a6fff'
	) );

	// add color picker control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text-color', array(
		'label' => 'Text Color',
		'section' => 'bwpy_theme_colors',
		'settings' => 'text-color',
	) ) );



	// add color picker setting
	$wp_customize->add_setting( 'footer-color', array(
		'default' => '#2e2e2e'
	) );

	// add color picker control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer-color', array(
		'label' => 'Footer Color',
		'section' => 'bwpy_theme_colors',
		'settings' => 'footer-color',
	) ) );



	// add color picker setting
	$wp_customize->add_setting( 'footer-text-color', array(
		'default' => '#ffffff'
	) );

	// add color picker control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer-text-color', array(
		'label' => 'Footer Text Color',
		'section' => 'bwpy_theme_colors',
		'settings' => 'footer-text-color',
	) ) );




	// add color picker setting
	$wp_customize->add_setting( 'first-icon-color', array(
		'default' => '#b2b2b2'
	) );

	// add color picker control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'first-icon-color', array(
		'label' => 'First Icon Color',
		'section' => 'bwpy_theme_colors',
		'settings' => 'first-icon-color',
	) ) );




	// add color picker setting
	$wp_customize->add_setting( 'second-icon-color', array(
		'default' => '#b2b2b2'
	) );

	// add color picker control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'second-icon-color', array(
		'label' => 'Second Icon Color',
		'section' => 'bwpy_theme_colors',
		'settings' => 'second-icon-color',
	) ) );




	// add color picker setting
	$wp_customize->add_setting( 'third-icon-color', array(
		'default' => '#b2b2b2'
	) );

	// add color picker control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'third-icon-color', array(
		'label' => 'Third Icon Color',
		'section' => 'bwpy_theme_colors',
		'settings' => 'third-icon-color',
	) ) );

 }
 add_action( 'customize_register', 'mytheme_customize_register' );


 function bwpy_customizer_head_styles() {
	$nav_color = get_theme_mod( 'nav-color' );
	$nav_text_color = get_theme_mod( 'nav-text-color' );
	$heading_color = get_theme_mod( 'heading-color' );
	$text_color = get_theme_mod( 'text-color' );
	$footer_color = get_theme_mod( 'footer-color' );
	$footer_text_color = get_theme_mod( 'footer-text-color' );
	$first_icon_color = get_theme_mod( 'first-icon-color' );
	$second_icon_color = get_theme_mod( 'second-icon-color' );
	$third_icon_color = get_theme_mod( 'third-icon-color' );


	
	if ( $nav_color != '#3a6fff' ) :
	?>
		<style type="text/css">
			:root {
				--nav-color: <?php echo $nav_color; ?>
			}
		</style>
	<?php
	endif;



	if ( $nav_text_color != '#ffffff' ) :
	?>
		<style type="text/css">
			:root {
				--nav-text-color: <?php echo $nav_text_color; ?>
			}
		</style>
	<?php
	endif;



	if ( $heading_color != '#3a6fff' ) :
	?>
		<style type="text/css">
			:root {
				--heading-color: <?php echo $heading_color; ?>
			}
		</style>
	<?php
	endif;



	if ( $text_color != '#3a6fff' ) :
	?>
		<style type="text/css">
			:root {
				--text-color: <?php echo $text_color; ?>
			}
		</style>
	<?php
	endif;


	if ( $footer_color != '#2e2e2e' ) :
	?>
		<style type="text/css">
			:root {
				--footer-color: <?php echo $footer_color; ?>
			}
		</style>
	<?php
	endif;


	if ( $footer_text_color != '#ffffff' ) :
	?>
		<style type="text/css">
			:root {
				--footer-text-color: <?php echo $footer_text_color; ?>
			}
		</style>
	<?php
	endif;



	if ( $first_icon_color != '' ) :
	?>
		<style type="text/css">
			:root {
				--first-icon-color: <?php echo $first_icon_color; ?>
			}
		</style>
	<?php
	endif;



	if ( $second_icon_color != '' ) :
	?>
		<style type="text/css">
			:root {
				--second-icon-color: <?php echo $second_icon_color; ?>
			}
		</style>
	<?php
	endif;


	if ( $third_icon_color != '' ) :
	?>
		<style type="text/css">
			:root {
				--third-icon-color: <?php echo $third_icon_color; ?>
			}
		</style>
	<?php
	endif;
}
add_action( 'wp_head', 'bwpy_customizer_head_styles' );

?>

<?php

function tn_custom_excerpt_length( $length ) {
    return 80;
    }
    add_filter( 'excerpt_length', 'tn_custom_excerpt_length', 999 );
?>

<?php
	if ( ! function_exists( 'dest_taxonomy' ) ) {

		// Register Custom Taxonomy
		function dest_taxonomy() {
		
			$labels = array(
				'name'                       => _x( 'Destinations', 'Taxonomy General Name', 'text_domain' ),
				'singular_name'              => _x( 'Destination', 'Taxonomy Singular Name', 'text_domain' ),
				'menu_name'                  => __( 'Destination', 'text_domain' ),
				'all_items'                  => __( 'All Destinations', 'text_domain' ),
				'parent_item'                => __( 'Parent Destination', 'text_domain' ),
				'parent_item_colon'          => __( 'Parent Destination:', 'text_domain' ),
				'new_item_name'              => __( 'New Destination Name', 'text_domain' ),
				'add_new_item'               => __( 'Add New Destination', 'text_domain' ),
				'edit_item'                  => __( 'Edit Destination', 'text_domain' ),
				'update_item'                => __( 'Update Destination', 'text_domain' ),
				'view_item'                  => __( 'View Destination', 'text_domain' ),
				'separate_items_with_commas' => __( 'Separate Destinations with commas', 'text_domain' ),
				'add_or_remove_items'        => __( 'Add or remove Destinations', 'text_domain' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
				'popular_items'              => __( 'Popular Destinations', 'text_domain' ),
				'search_items'               => __( 'Search Destinations', 'text_domain' ),
				'not_found'                  => __( 'Not Found', 'text_domain' ),
				'no_terms'                   => __( 'No Destinations', 'text_domain' ),
				'items_list'                 => __( 'Destinations list', 'text_domain' ),
				'items_list_navigation'      => __( 'Destinations list navigation', 'text_domain' ),
			);
			$rewrite = array(
				'slug'                       => 'destinations',
				'with_front'                 => true,
				'hierarchical'               => true,
			);
			$args = array(
				'labels'                     => $labels,
				'hierarchical'               => true,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'show_tagcloud'              => true,
				'rewrite'                    => $rewrite,
			);
			register_taxonomy( 'dest', array( 'destination' ), $args );
		
		}
		add_action( 'init', 'dest_taxonomy', 0 );
		}
?>
