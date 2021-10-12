<?php
/**
 * tangerine functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tangerine
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'tangerine_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tangerine_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on tangerine, use a find and replace
		 * to change 'tangerine' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tangerine', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'tangerine' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'tangerine_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'tangerine_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tangerine_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tangerine_content_width', 640 );
}
add_action( 'after_setup_theme', 'tangerine_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tangerine_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'tangerine' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'tangerine' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'tangerine_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tangerine_scripts() {
	wp_enqueue_style( 'tangerine-style', get_stylesheet_uri(), array(), _S_VERSION );
	
	wp_style_add_data( 'tangerine-style', 'rtl', 'replace' );

	wp_enqueue_script( 'tangerine-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_style( 'tangerine-custom-style', get_template_directory_uri() . '/css/main.css', array(), _S_VERSION );
}
add_action( 'wp_enqueue_scripts', 'tangerine_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function designflyCustomComments( $comment, $args, $depth ) {
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
?>
      <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent' : '', $comment ); ?>>
         <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <footer class="comment-meta">
               <div class="designfly-comment-author">
                  <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
                  <?php echo get_comment_author_link( $comment ) . ' <span class="says">said on ' . get_comment_date('F j, Y') . ' at ' . get_comment_time() .'</span>'; ?>
               </div><!-- .comment-author -->

               <?php if ( '0' == $comment->comment_approved ) : ?>
               <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
               <?php endif; ?>
            </footer><!-- .comment-meta -->

            <div class="comment-content">
               <?php comment_text(); ?>
            </div><!-- .comment-content -->

            <?php
            comment_reply_link( array_merge( $args, array(
			   'reply_text'=> 'reply',
               'add_below' => 'div-comment',
               'depth'     => $depth,
               'max_depth' => $args['max_depth'],
               'before'    => '<div class="reply">',
               'after'     => '</div>'
            ) ) );
            ?>
         </article><!-- .comment-body -->
         <?php
}

function designfly_comment_form( $args ){
	$args['title_reply'] = 'Post your comment';
	$args['comment_notes_before'] = '';
	$args['fields']['cookies'] = '';
	$args['fields']['author'] = '<div id="comment-form-field-box"><div><label style="display: block;" for="author">Name</label><input type="text" id="author" name="author"/></div>' ;
    $args['fields']['email']  = '<div><label style="display: block;"for="email">Email</label><input type="text" id="email" name="email"/></div>' ;
    $args['fields']['url']    = '<div><label style="display: block;"for="url">Website</label><input type="text" id="url" name="url"/></div></div>' ;

	return ($args);
}

add_filter('comment_form_defaults', 'designfly_comment_form');

function designfly_comment_textarea($field) {

	$field = '<p class="comment-form-comment"><textarea id="comment" name="comment"></textarea></p>';

	return $field;
}

add_filter('comment_form_field_comment', 'designfly_comment_textarea');


