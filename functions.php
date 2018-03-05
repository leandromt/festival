<?php

/**
 * FestivalTheme
 *
 * @author O POVO <opovo@opovodigital.com>
 *
 *
 */

define('TEMPLATE_DIRETORY_URI',     get_template_directory_uri());
define('TEMPLATE_DIRETORY',     	get_template_directory());
define('AJAX_URL',                  admin_url('admin-ajax.php'));
define('AJAX_PPP',                  get_option('posts_per_page'));

class FestivalTheme {

    protected $options = null;

    public $theme_name = 'FestivalTheme';

    /**
     * Autoload method
     * @return void
     */
    public function __construct() {

		/*------------------------------------*\
			Theme Support
		\*------------------------------------*/

		if (function_exists('add_theme_support')) {
            
		    // Add Menu Support
		    add_theme_support('menus');

            // Add Thumbnail Theme Support
            add_theme_support('post-thumbnails');

            // Add Thumbnail sizes
            add_image_size('large', 740, '', true); // Large Thumbnail
            add_image_size('medium', 300, '', true); // Medium Thumbnail
            add_image_size('small', 120, '', true); // Small Thumbnail

		    // Enables post and comment RSS feed links to head
		    add_theme_support('automatic-feed-links');

		    // Localisation Support
		    load_theme_textdomain('festivaltheme', get_template_directory() . '/languages');

            // Create Post Type
            add_action( 'init', array(&$this, 'create_post_type') );

		}

		/*------------------------------------*\
			Sidebar
		\*------------------------------------*/		

		// If Dynamic Sidebar Exists
		if (function_exists('register_sidebar')) {

            // Define Sidebar da Home
            register_sidebar(array(
                'name' => __('Home/List pages sidebar', 'festivaltheme'),
                'description' => __('Widgets da Sidebar na página principal ou nas páginas de listagem, cada blog pode ter sua lista específica.', 'festivaltheme'),
                'id' => 'sidebar-list',
                'before_widget' => '<div id="%1$s" class="%2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3>',
                'after_title' => '</h3>'
            ));

        }

		/*------------------------------------*\
			Actions + Filters + ShortCodes
		\*------------------------------------*/

		// Add Actions
		add_action('init', array(&$this, 'festivaltheme_header_scripts')); // Add Custom Scripts to wp_head

        add_action('wp_print_scripts', array(&$this, 'festivaltheme_conditional_scripts')); // Add Conditional Page Scripts
        add_action('wp_enqueue_scripts', array(&$this, 'festivaltheme_styles')); // Add Theme Stylesheet

        add_action('login_enqueue_scripts', array(&$this, 'festivaltheme_login_style'), 10);
      
		// // Remove wp emoji
		remove_action('wp_head', 'print_emoji_detection_script', 7);
		remove_action('wp_print_styles', 'print_emoji_styles');
		remove_action('admin_print_scripts', 'print_emoji_detection_script');
		remove_action('admin_print_styles', 'print_emoji_styles');

    }
 
	// FESTIValtheme navigation
	public static function festivaltheme_nav() {

        $args = array(
            'menu'            => '',
            'container'       => false,
            //'container_class' => 'menu-{menu slug}-container',
            //'container_id'    => '',
            'menu_class'      => 'menu',
            'menu_id'         => 'menu',
            'echo'            => true,
            'fallback_cb'     => false, // false | wp_page_menu
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul class="menu" role="menubar">%3$s</ul>',
            'depth'           => 0,
            'walker'          => new FestivalTheme(),
            'theme_location'  => 'header-menu'
        );

        wp_nav_menu($args);

	}

	// Load festivaltheme scripts (header.php)
	public function festivaltheme_header_scripts() {

	    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

	        wp_register_script('festivaltheme-scripts', TEMPLATE_DIRETORY_URI . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
	        wp_enqueue_script('festivaltheme-scripts'); // Enqueue it!
               
            wp_register_script('festivaltheme-gpt', '//www.googletagservices.com/tag/js/gpt.js'); // Custom scripts
            wp_enqueue_script('festivaltheme-gpt'); // Enqueue it!

	    }

	}

	// Load festivaltheme conditional scripts
	public function festivaltheme_conditional_scripts() {

	    if (is_page('pagenamehere')) {
	        wp_register_script('scriptname', TEMPLATE_DIRETORY_URI . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
	        wp_enqueue_script('scriptname'); // Enqueue it!
	    }

	}

    public function festivaltheme_login_style() {

        wp_enqueue_style('festivaltheme-login', TEMPLATE_DIRETORY_URI . '/css/login.css', false); // Enqueue it!  

    }

	// Load festivaltheme styles
	public function festivaltheme_styles() {

        wp_register_style('1140', TEMPLATE_DIRETORY_URI . '/css/1140.css', array(), '1.0', 'all');
        wp_enqueue_style('1140'); // Enqueue it!    

        wp_register_style('normalize', TEMPLATE_DIRETORY_URI . '/css/normalize.min.css', array('1140'), '7.0.0', 'all');
        wp_enqueue_style('normalize'); // Enqueue it!

        wp_register_style('festivaltheme', TEMPLATE_DIRETORY_URI . '/style.css', array('normalize'), '1.0', 'all');
        wp_enqueue_style('festivaltheme'); // Enqueue it!        

        if (wp_is_mobile()) {

            wp_register_style('festivaltheme-mobile', TEMPLATE_DIRETORY_URI . '/style-mobile.css', array('festivaltheme'), '1.0', 'all');
            wp_enqueue_style('festivaltheme-mobile'); // Enqueue it!

        }

	}


    // Create Post Type
    public function create_post_type() {
        register_post_type( 'programacao',
            array(
                //'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
                'supports' => array( 'title', 'editor', 'thumbnail'),
                'labels' => array(
                'name' => __( 'Programação' ),
                'singular_name' => __( 'Programação' ),
            ),
                'public' => true,
                'has_archive' => true,
                'menu_icon'   => 'dashicons-exerpt-view',

            )
        );
    }


}
 
new FestivalTheme();


?>