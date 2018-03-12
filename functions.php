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
            add_image_size('novidades', 350, 414, true); // Novidades Home
            add_image_size('patrocinadores', 190, false); // Patrocinadores Home

		    // Enables post and comment RSS feed links to head
		    add_theme_support('automatic-feed-links');

		    // Localisation Support
		    load_theme_textdomain('festivaltheme', get_template_directory() . '/languages');


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
		//add_action('init', array(&$this, 'festivaltheme_header_scripts')); // Add Custom Scripts to wp_head
        //add_action('wp_print_scripts', array(&$this, 'festivaltheme_conditional_scripts')); // Add Conditional Page Scripts
        add_action('wp_enqueue_scripts', array(&$this, 'festivaltheme_styles')); // Add Theme Stylesheet
        add_action('login_enqueue_scripts', array(&$this, 'festivaltheme_login_style'), 10);
        add_action('init', array(&$this, 'festivaltheme_create_post_type')); // Create Post Type
        add_action('admin_menu', array(&$this, 'festivaltheme_admin_remove_menu')); // Remove menus default admin

      
		// // Remove wp emoji
		remove_action('wp_head', 'print_emoji_detection_script', 7);
		remove_action('wp_print_styles', 'print_emoji_styles');
		remove_action('admin_print_scripts', 'print_emoji_detection_script');
		remove_action('admin_print_styles', 'print_emoji_styles');


    }
 
	// FESTIValtheme navigation
	/*public static function festivaltheme_nav() {

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

	}*/

	// Load festivaltheme scripts (header.php)
	/*public function festivaltheme_header_scripts() {

	    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

            wp_register_script('festivaltheme-scripts', TEMPLATE_DIRETORY_URI . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
            wp_enqueue_script('festivaltheme-scripts'); // Enqueue it!

            wp_register_script('festivaltheme-gpt', '//www.googletagservices.com/tag/js/gpt.js'); // Custom scripts
            wp_enqueue_script('festivaltheme-gpt'); // Enqueue it!

	    }

	}*/

	// Load festivaltheme conditional scripts
	/*public function festivaltheme_conditional_scripts() {

	    if (is_page('pagenamehere')) {
	        wp_register_script('scriptname', TEMPLATE_DIRETORY_URI . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
	        wp_enqueue_script('scriptname'); // Enqueue it!
	    }

	}*/

    // Load css login page
    public function festivaltheme_login_style() {

        wp_enqueue_style('festivaltheme-login', TEMPLATE_DIRETORY_URI . '/assets/css/login.css', false); // Enqueue it!  

    }

	// Load festivaltheme styles and scripts
	public function festivaltheme_styles() {

        // CSS
        wp_enqueue_style('style', TEMPLATE_DIRETORY_URI .'/style.css');
        wp_enqueue_style('base', TEMPLATE_DIRETORY_URI .'/assets/css/base-fva.css');
        wp_enqueue_style('estilo', TEMPLATE_DIRETORY_URI .'/assets/css/estilo-fva.css');
        wp_enqueue_style('animations', TEMPLATE_DIRETORY_URI .'/assets/css/animations.css');
        wp_enqueue_style('carousel', TEMPLATE_DIRETORY_URI .'/assets/css/owl.carousel.min.css');
        wp_enqueue_style('theme', TEMPLATE_DIRETORY_URI .'/assets/css/owl.theme.default.min.css');

        // JS
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', TEMPLATE_DIRETORY_URI . '/assets/js/jquery-3.3.1.min.js', null, null, true);
        wp_enqueue_script('carousel', TEMPLATE_DIRETORY_URI . '/assets/js/owl.carousel.min.js', ['jquery'], null, true);
        wp_enqueue_script('scripts', TEMPLATE_DIRETORY_URI . '/assets/js/scripts.js', ['jquery'], null, true);
        wp_enqueue_script('animate', TEMPLATE_DIRETORY_URI . '/assets/js/css3-animate-it.js', ['jquery'], null, true);

        // if (wp_is_mobile()) { }

	}


    // Remove Itens Default Admin
    public function festivaltheme_admin_remove_menu () 
    { 
       remove_menu_page('edit.php'); // Posts
       remove_menu_page('edit.php?post_type=page'); // Pages
       remove_menu_page('edit-comments.php');  // Comments
       remove_menu_page('tools.php'); //Tools
       remove_menu_page('index.php'); //Dashboard
       remove_menu_page('plugins.php'); //Plugins
    } 


    // Create Post Type
    public function festivaltheme_create_post_type() {


        register_post_type( 'novidades',
            array(
                'labels' => array(
                    'name'                  => __( 'Novidades'),
                    'singular_name'         => __( 'Novidade'),
                    'add_new_item'          => __( 'Adicionar nova Novidade'),
                    'edit_item'             => __( 'Editar Novidade'),
                    'search_items'          => __( 'Pesquisar Novidades'),
                ),
                'supports'                  => array( 'title', 'thumbnail', 'editor'),
                'public'                    => true,
                'has_archive'               => true,
                'menu_icon'                 => 'dashicons-admin-post',
                'menu_position'             => 6
            )
        );


        register_post_type( 'programacao',
            array(
                'labels' => array(
                    'name'                  => __( 'Atrações'),
                    'singular_name'         => __( 'Atração'),
                    'featured_image'        => __( 'Foto da Atração'),
                    'add_new_item'          => __( 'Adicionar Nova Atração'),
                    'add_new'               => __( 'Nova Atração'),
                    'edit_item'             => __( 'Editar Atração'),
                    'set_featured_image'    => __( 'Adicionar foto'),
                    'remove_featured_image' => __( 'Remover foto') 
                ),
                //'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
                'supports'                  => array( 'title', 'thumbnail'),
                'public'                    => true,
                'has_archive'               => true,
                'menu_icon'                 => 'dashicons-universal-access',
                'menu_position'             => 8
            )
        );


        register_post_type( 'trailer',
            array(
                'labels' => array(
                    'name'                  => __( 'Trailer' ),
                    'add_new_item'          => __( 'Adicionar Novo Trailer'),
                    'add_new'               => __( 'Novo Trailer'),
                    'edit_item'             => __( 'Editar Trailer')
                ),
                'public'                    => true,
                'has_archive'               => true,
                'menu_icon'                 => 'dashicons-editor-video',
                'menu_position'             => 10

            )
        );


        register_post_type( 'patrocinadores',
            array(
                'labels' => array(
                    'name'                  => __( 'Patrocinadores' ),
                    'singular_name'         => __( 'Patrocinadore' ),
                    'add_new_item'          => __( 'Adicionar Novo Patrocinador'),
                    'edit_item'             => __( 'Editar Patrocinador'),
                    'featured_image'        => __( 'Logo do patrocinador'),
                    'set_featured_image'    => __( 'Adicionar logo'),
                    'remove_featured_image' => __( 'Remover logo')
                ),
                'supports'                  => array( 'title', 'thumbnail'),
                'public'                    => true,
                'has_archive'               => true,
                'menu_icon'                 => 'dashicons-money',
                'menu_position'             => 11
            )
        );


        register_post_type( 'caderno',
            array(
                'labels' => array(
                    'name'                  => __( 'Caderno' ),
                    'add_new_item'          => __( 'Adicionar Novo Caderno'),
                    'edit_item'             => __( 'Editar Caderno'),
                    'featured_image'        => __( 'Logo do patrocinador'),
                    'featured_image'        => __( 'Capa do Caderno Vida & Arte'),
                    'set_featured_image'    => __( 'Adicionar capa do caderno'),
                    'remove_featured_image' => __( 'Remover capa do caderno')
                ),
                'supports'                  => array( 'title', 'editor', 'thumbnail'),
                'public'                    => true,
                'has_archive'               => true,
                'menu_icon'                 => 'dashicons-book-alt',
                'menu_position'             => 12
            )
        );


        register_post_type( 'datadoevento',
            array(
                'labels' => array(
                    'name'                  => __( 'Data do Evento' ),
                    'add_new_item'          => __( 'Adicionar Data do Evento'),
                    'edit_item'             => __( 'Editar Data do Evento'),
                ),
                'supports'                  => array('title'),
                'public'                    => true,
                'has_archive'               => true,
                'menu_icon'                 => 'dashicons-calendar-alt',
                'menu_position'             => 12
            )
        );

    }

}
 
new FestivalTheme();

?>






