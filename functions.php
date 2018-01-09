<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

/**
 * Twenty Seventeen only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function twentyseventeen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'twentyseventeen' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ds' );

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

	add_image_size( 'twentyseventeen-featured-image', 2000, 1200, true );

	add_image_size( 'twentyseventeen-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'twentyseventeen' ),
		'social' => __( 'Social Links Menu', 'twentyseventeen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', twentyseventeen_fonts_url() ) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __( 'Top Menu', 'twentyseventeen' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name' => __( 'Social Links Menu', 'twentyseventeen' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters Twenty Seventeen array of starter content.
	 *
	 * @since Twenty Seventeen 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'twentyseventeen_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'twentyseventeen_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function twentyseventeen_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( twentyseventeen_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter Twenty Seventeen content width of the theme.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param $content_width integer
	 */
	$GLOBALS['content_width'] = apply_filters( 'twentyseventeen_content_width', $content_width );
}
add_action( 'template_redirect', 'twentyseventeen_content_width', 0 );

/**
 * Register custom fonts.
 */
function twentyseventeen_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'twentyseventeen' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function twentyseventeen_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'twentyseventeen-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'twentyseventeen_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentyseventeen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'twentyseventeen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'twentyseventeen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'twentyseventeen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyseventeen_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Twenty Seventeen 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function twentyseventeen_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'twentyseventeen_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Seventeen 1.0
 */
function twentyseventeen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyseventeen_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function twentyseventeen_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'twentyseventeen_pingback_header' );

/**
 * Display custom color CSS.
 */
function twentyseventeen_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
?>
	<style type="text/css" id="custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>>
		<?php echo twentyseventeen_custom_colors_css(); ?>
	</style>
<?php }
add_action( 'wp_head', 'twentyseventeen_colors_css_wrap' );

/**
 * Enqueue scripts and styles.
 */
function twentyseventeen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentyseventeen-fonts', twentyseventeen_fonts_url(), array(), null );
    wp_enqueue_style( 'titillum', 'https://fonts.googleapis.com/css?family=Titillium+Web:300,400,600,700' );
	// Theme stylesheet.
	wp_enqueue_style( 'twentyseventeen-style', get_stylesheet_uri() );

	// Load the dark colorscheme.
	if ( 'dark' === get_theme_mod( 'colorscheme', 'light' ) || is_customize_preview() ) {
		wp_enqueue_style( 'twentyseventeen-colors-dark', get_theme_file_uri( '/assets/css/colors-dark.css' ), array( 'twentyseventeen-style' ), '1.0' );
	}

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'twentyseventeen-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'twentyseventeen-style' ), '1.0' );
		wp_style_add_data( 'twentyseventeen-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentyseventeen-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'twentyseventeen-style' ), '1.0' );
	wp_style_add_data( 'twentyseventeen-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'twentyseventeen-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$twentyseventeen_l10n = array(
		'quote'          => twentyseventeen_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'twentyseventeen-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array(), '1.0', true );
		$twentyseventeen_l10n['expand']         = __( 'Expand child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['collapse']       = __( 'Collapse child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['icon']           = twentyseventeen_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
	}

	wp_enqueue_script( 'twentyseventeen-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );

	wp_localize_script( 'twentyseventeen-skip-link-focus-fix', 'twentyseventeenScreenReaderText', $twentyseventeen_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'twentyseventeen_scripts' );

function wp_remove_head_resources() {
    wp_deregister_style('woo-quote-frontend-css');
}

add_action('wp_print_styles', 'wp_remove_head_resources', 100);
/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentyseventeen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentyseventeen_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function twentyseventeen_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'twentyseventeen_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function twentyseventeen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentyseventeen_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function twentyseventeen_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'twentyseventeen_front_page_template' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );


/* custom */

require get_parent_theme_file_path( 'wp-bootstrap-navwalker.php' );

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'twentyseventeen' ),
) );

function woocommerce_template_product_description() {
    wc_get_template( 'single-product/tabs/description.php' );
}
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_product_description', 20 );

add_filter( 'woocommerce_product_tabs', 'specifications_tab' );
function specifications_tab( $tabs ) {
  // ensure ACF is available
  if ( !function_exists( 'have_rows' ) )
    return;
    
  if ( get_field('specifications') && have_rows('specifications') ) {
    $tabs[] = array(
      'title' => 'Specifications',
      'priority' => 15,
      'callback' => 'show_specification_content'
    );
  }
  return $tabs;
}

function show_specification_content() {
	if ( have_rows('specifications') ):
        while ( have_rows('specifications') ) : the_row();
    
            if ( have_rows('facts_left') || have_rows('facts_right') ) {
                echo '<div class="row row-specifications"><div class="col-md-12">';
                echo '<div class="row">';
                if ( have_rows('facts_left') ):
                    echo '<div class="col-md-6"><table class="table">';
                        $lfn = 1;
                        while ( have_rows('facts_left') ) : the_row();
                            echo '<tr>';
                            echo '<td';
                            if ($lfn == '1')
                            {
                                echo ' class="no-border"';
                            }
                            echo '>';
                            echo '<b>> </b>';
                            echo get_sub_field('lines_left');
                            echo '</td>';
                            echo '</tr>';
                            $lfn++;
                        endwhile;
                    echo '</table></div>';
                endif;

                if ( have_rows('facts_right') ):
                    echo '<div class="col-md-6"><table class="table">';
                        $lrn = 1;
                        while ( have_rows('facts_right') ) : the_row();
                            echo '<tr>';
                            echo '<td';
                            if ($lrn == '1')
                            {
                                echo ' class="no-border"';
                            }
                            echo '>';
                            echo '<b>> </b>';
                            echo get_sub_field('lines_right');
                            echo '</td>';
                            echo '</tr>';
                            $lrn++;
                        endwhile;
                    echo '</table></div>';
                endif;

                echo '</div>';
                echo '</div></div>';
            }
            
            echo '<div class="row row-specifications"><div class="col-md-12">';
            echo '<div class="row">';
            if ( have_rows('data_left') ):
                echo '<div class="col-md-6"><table class="table">';
                    $ldn = 1;
                    while ( have_rows('data_left') ) : the_row();
                        echo '<tr>';
                        echo '<td';
                        if ($ldn == '1')
                        {
                            echo ' class="no-border"';
                        }
                        echo '>';
                        echo get_sub_field('name_left');
                        echo '</td>';
                        echo '<td';
                        if ($ldn == '1')
                        {
                            echo ' class="no-border"';
                        }
                        echo '>';
                        echo get_sub_field('data_left_line');
                        echo '</td>';
                        echo '</tr>';
                        $ldn++;
                    endwhile;
                echo '</table></div>';
            endif;
            
            if( have_rows('data_right') ):
                echo '<div class="col-md-6"><table class="table">';
                    $ldn = 1;
                    while ( have_rows('data_right') ) : the_row();
                        echo '<tr>';
                        echo '<td';
                        if ($ldn == '1')
                        {
                            echo ' class="no-border"';
                        }
                        echo '>';
                        echo get_sub_field('name_right');
                        echo '</td>';
                        echo '<td';
                        if ($ldn == '1')
                        {
                            echo ' class="no-border"';
                        }
                        echo '>';
                        echo get_sub_field('data_right_line');
                        echo '</td>';
                        echo '</tr>';
                        $ldn++;
                    endwhile;
                echo '</table></div>';
            endif;
            
            echo '</div>';
            echo '</div></div>';
            
            if (have_rows('images')) {
                echo '<div class="row row-specifications"><div class="col-md-12">';
                while ( have_rows('images') ) : the_row();
                    $image_desktop = get_sub_field('image');
                    echo '<img src="' . $image_desktop['url'] . '" alt="" class="visible-lg-block img-responsive">';
                endwhile;
                echo '</div></div>';
            }
        endwhile;
    endif;
}

add_filter( 'woocommerce_product_tabs', 'features_tab' );
function features_tab( $tabs ) {
  // ensure ACF is available
  if ( !function_exists( 'have_rows' ) )
    return;
    
  if ( get_field('features') ) {
    $tabs[] = array(
      'title' => 'Features',
      'priority' => 15,
      'callback' => 'show_features_content'
    );
  }
  return $tabs;
}

function show_features_content() {
	if ( have_rows('features') ):
        while ( have_rows('features') ) : the_row();
            echo '<div class="row row-features">';
            if ( get_sub_field('left') != '' ) {
                echo '<div class="col-sm-12 col-md-6">';
                echo get_sub_field('left');
                echo '</div>';
            }
            
            if ( get_sub_field('right') != '' ) {
                echo '<div class="col-sm-12 col-md-6">';
                echo get_sub_field('right');
                echo '</div>';
            }
            
            echo '</div>';
        endwhile;
    endif;
}

add_filter( 'woocommerce_product_tabs', 'downloads_tab' );
function downloads_tab( $tabs ) {
  // ensure ACF is available
  if ( !function_exists( 'have_rows' ) )
    return;
    
  if ( get_field('files') ) {
    $tabs[] = array(
      'title' => 'Downloads',
      'priority' => 15,
      'callback' => 'show_download_content'
    );
  }
  return $tabs;
}

function show_download_content() {
	if( have_rows('files') ):
        echo '<div class="row row-downloads">';
        while ( have_rows('files') ) : the_row();
            echo '<div class="col-md-12 title">' . get_sub_field('type') . '</div>';
            echo '<div class="col-md-12"><div class="downloads-wrapper clearfix">';
            while ( have_rows('file_list') ) : the_row();
                $file_vs_link = get_sub_field('file_or_link');
                $file = get_sub_field('file');
                echo '<div class="col-md-6">';
                    echo '<p>' . get_sub_field('name') . '</p>';
                    echo '<div class="triangle-wrapper">';
                        echo '<div><a href="';
                        if ($file_vs_link == 'file')
                        {
                            echo $file['url'];
                        }
                        else
                        {
                            echo get_sub_field('link');
                        }
                        echo '" class="triangle-btn" target="_blank">download</a>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            endwhile;
            echo '</div></div>';
        endwhile;
        echo '</div>';
    endif;
}

add_filter( 'woocommerce_product_tabs', 'upsell_tab' );
function upsell_tab( $tabs ) {
    if ( ! is_singular( 'product' ) ) {
        return;
    }

    global $product;
    
    if ( $product->get_upsells() ) {
    $tabs[] = array(
      'title' => 'Compatible products',
      'priority' => 20,
      'callback' => 'show_uppsell_content'
    );
  }
  return $tabs;
}

function show_uppsell_content() {
	woocommerce_upsell_display();
}

add_filter( 'woocommerce_product_tabs', 'set_tab' );
function set_tab( $tabs ) {
    if ( ! is_singular( 'product' ) ) {
        return;
    }

    global $product;
    
    $results = WC_PB_DB::query_bundled_items( array(
        'return'     => 'id=>product_id',
        'bundle_id' => array( $product->id )
    ) );
    $post_ids = array_values($results);
    
    if ( $post_ids ) {
    $tabs[] = array(
      'title' => 'Whats in the set',
      'priority' => 0,
      'callback' => 'show_set_content'
    );
  }
  return $tabs;
}

function show_set_content() {
	global $product;
    $results = WC_PB_DB::query_bundled_items( array(
        'return'     => 'id=>product_id',
        'bundle_id' => array( $product->id )
    ) );
    $post_ids = array_values($results);
    echo '<ul class="products animated-grid">';
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            'post__in' => $post_ids
        );
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) {
            while ( $loop->have_posts() ) : $loop->the_post();
                wc_get_template_part( 'content', 'product' );
            endwhile;
        } else {
            echo __( 'No products found' );
        }
        wp_reset_postdata();
    echo '</ul>';
}

add_filter( 'woocommerce_product_tabs', 'reordered_wc_tabs', 98 );

function reordered_wc_tabs( $tabs ) {
    unset( $tabs['description'] );
    return $tabs;
}

function ds_scripts() {
    wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBxCJNbIsEUuEipy1e7dBDxbnVHUO8UheU', array(), '3', true );
    wp_enqueue_script( 'complete', get_theme_file_uri( '/assets/js/complete.js' ), array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'main', get_theme_file_uri( '/assets/js/main.js' ), array( 'jquery' ), '2.1.2', true );
    wp_enqueue_script( 'currency', get_theme_file_uri( '/assets/js/wcml-multi-currency-custom-switcher.js' ), array( 'jquery' ), '2.1.2', true );
    wp_enqueue_style( 'font-awsome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', '1.0' );
    if ( is_page('voyager') ) {
		wp_enqueue_style( 'main-voyager-style', get_theme_file_uri( '/assets/css/main.css' ), array( 'twentyseventeen-style' ), '2.0' );
        wp_enqueue_style( 'magnific-popup-style', get_theme_file_uri( '/assets/css/magnific-popup.css' ), array( 'twentyseventeen-style' ), '1.0' );
        wp_enqueue_script( 'magnific-popup-script', get_theme_file_uri( '/assets/js/jquery.magnific-popup.min.js' ), array(), '1.0', true );
        wp_enqueue_script( 'main-voyager-script', get_theme_file_uri( '/assets/js/main-voyager.js' ), array(), '1.0', true );
    }
}
add_action( 'wp_enqueue_scripts', 'ds_scripts' );


if( function_exists('acf_add_options_page') ) {
 
	$option_page = acf_add_options_page(array(
		'page_title' 	=> 'Custom settings',
		'menu_title' 	=> 'Custom settings',
		'menu_slug' 	=> 'custom-settings',
		'capability' 	=> 'edit_posts',
		'redirect' 	=> false,
        'position' => '63.3',
        'parent_slug' => 'options-general.php',
	));
 
}
add_action( 'woocommerce_shop_loop_item_title', 'ws_excerpt_in_product_archives', 15 );
function ws_excerpt_in_product_archives() {
    the_excerpt();
}

add_action( 'woocommerce_after_shop_loop_item_title', 'ws_link_in_product_archives', 15 );
function ws_link_in_product_archives() {
    echo '<a class="more" href="' . get_permalink() . '">More</a>';
}

// Display 12 products per page
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );


function my_acf_google_map_api( $api ){
	
	$api['key'] = ' AIzaSyBL52bOUq21kiTo3WageYjS73Kls1b5Egs';
	
	return $api;
	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

add_action( 'pre_get_posts', '_additional_woo_query' );
function _additional_woo_query( $query ) {
    if ( is_product_category() && get_query_var('compatatible_with') ) {
        $query->set( 'tax_query', array(array(
			'taxonomy' => 'product_tag',
			'field' => 'slug',
			'terms' => explode(',', get_query_var('compatatible_with')),
            'operator' => 'AND'
        )));
    }
    remove_action( 'pre_get_posts', '_additional_woo_query' );
}

add_filter( 'query_vars', 'add_query_vars_filtere' );
function add_query_vars_filtere( $vars ){
    $vars[] = 'compatatible_with';
    return $vars;
}

function product_count_shortcode() {
    if ( is_product_category() ) {
        $cate = get_queried_object();
        $cateID = $cate->slug;
        if (get_query_var('compatatible_with')) {
            $args = array(
                'posts_per_page' => -1,
                'post_type' => 'product',
                'tax_query' => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => $cateID
                ),
                    array(
                        'taxonomy' => 'product_tag',
                        'field' => 'slug',
                        'terms' => explode(',', get_query_var('compatatible_with')),
                        'operator' => 'AND'
                ))
            );
        }
        else
        {
            $args = array(
                'posts_per_page' => -1,
                'post_type' => 'product',
                'product_cat' => $cateID
            );
        }
        $query = new WP_Query( $args );

        $count = $query->post_count;
        return $count;
    }
}
add_shortcode( 'product_count', 'product_count_shortcode' );

function get_request_parameter( $key, $default = '' ) {
    if ( ! isset( $_REQUEST[ $key ] ) || empty( $_REQUEST[ $key ] ) ) {
        return $default;
    }
    return strip_tags( (string) wp_unslash( $_REQUEST[ $key ] ) );
}

add_action( 'init', 'ws_product_sort_init' );
function ws_product_sort_init() {
    wp_register_script( 'ws-ajax-products', get_template_directory_uri() . '/assets/js/ws_ajax_products.js', array('jquery'), '' );
    wp_localize_script( 'ws-ajax-products', 'wsajaxproducts', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    ));
    wp_enqueue_script('ws-ajax-products');

    add_action( 'wp_ajax_nopriv_ws_ajax_products', 'ws_ajax_products' );
    add_action( 'wp_ajax_ws_ajax_products', 'ws_ajax_products' );
    
    wp_register_script( 'ws-ajax-products-count', get_template_directory_uri() . '/assets/js/ws_ajax_products_count.js', array('jquery'), '' );
    wp_localize_script( 'ws-ajax-products-count', 'wsajaxproductscount', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    ));
    wp_enqueue_script('ws-ajax-products-count');
    
    add_action( 'wp_ajax_nopriv_ws_ajax_products_count', 'ws_ajax_products_count' );
    add_action( 'wp_ajax_ws_ajax_products_count', 'ws_ajax_products_count' );
}

function ws_ajax_products() {

    $all_tags = stripslashes( $_POST['all_tags'] );
    $current_cat = stripslashes( $_POST['current_cat'] );
    if ($all_tags)
    {
        $tags_array = array(
            'taxonomy' => 'product_tag',
            'field' => 'slug',
            'terms' => explode(',', $all_tags),
            'operator' => 'AND'
        );
    }
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 12,
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $current_cat
        ), $tags_array)
    );
    $temp = $wp_query; 
    $wp_query = null;
    $wp_query = new WP_Query( $args );
    if ($wp_query->have_posts()) :
        if ( $wp_query->have_posts() ) {            
            $page_url = home_url('/');
            ?>
            <div class="animated-grid">
            <?php
            while ( $wp_query->have_posts() ) : $wp_query->the_post();
                woocommerce_get_template_part( 'content', 'product' );
            endwhile;
            ?>
            </div>
            <nav class="woocommerce-pagination">
                <?php
                if ($all_tags != '')
                {
                    $url_comp = '/?compatatible_with=' . $all_tags;
                }
                
                echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
                    'base'         => esc_url_raw($page_url) . 'product-category/' . $current_cat . '%_%' . $url_comp,
                    'format'       => '/page/%#%',
                    'add_args'     => false,
                    'total'        => $wp_query->max_num_pages,
                    'prev_text'    => '&larr;',
                    'next_text'    => '&rarr;',
                    'type'         => 'list',
                    'end_size'     => 3,
                    'mid_size'     => 3,
                ) ) );
                ?>
            </nav>
        <?php
        } else {
            echo __( 'No products found' );
        }
        wp_reset_postdata();
        $wp_query = null; 
        $wp_query = $temp;
    endif;
    
    die();
}

function ws_ajax_products_count() {
    $all_tags = stripslashes( $_POST['all_tags'] );
    $current_cat = stripslashes( $_POST['current_cat'] );
    if ($all_tags)
    {
        $tags_array = array(
            'taxonomy' => 'product_tag',
            'field' => 'slug',
            'terms' => explode(',', $all_tags),
            'operator' => 'AND'
        );
    }
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $current_cat
        ), $tags_array)
    );
    $wp_query = new WP_Query( $args );
    
    $count = $wp_query->found_posts;
    echo $count;
    
    die();
}

function product_upsell_count_shortcode($attr) {
    if ( is_product() ) {
        
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
            'post__in' => explode(',', $attr['upsells']),
            'post__not_in' => array( $attr['productid'] ),
        );
        
        $query = new WP_Query( $args );

        $count = $query->post_count;
        return $count;
    }
}
add_shortcode( 'product_upsell_count', 'product_upsell_count_shortcode' );

add_action( 'init', 'ws_product_upsell_sort_init' );
function ws_product_upsell_sort_init() {
    wp_register_script( 'ws-ajax-products-upsell', get_template_directory_uri() . '/assets/js/ws_ajax_products_upsell.js', array('jquery'), '' );
    wp_localize_script( 'ws-ajax-products-upsell', 'wsajaxproductsupsell', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    ));
    wp_enqueue_script('ws-ajax-products-upsell');

    add_action( 'wp_ajax_nopriv_ws_ajax_products_upsell', 'ws_ajax_products_upsell' );
    add_action( 'wp_ajax_ws_ajax_products_upsell', 'ws_ajax_products_upsell' );
    
    wp_register_script( 'ws-ajax-products-upsell-count', get_template_directory_uri() . '/assets/js/ws_ajax_products_upsell_count.js', array('jquery'), '' );
    wp_localize_script( 'ws-ajax-products-upsell-count', 'wsajaxproductsupsellcount', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    ));
    wp_enqueue_script('ws-ajax-products-upsell-count');
    
    add_action( 'wp_ajax_nopriv_ws_ajax_products_upsell_count', 'ws_ajax_products_upsell_count' );
    add_action( 'wp_ajax_ws_ajax_products_upsell_count', 'ws_ajax_products_upsell_count' );
}

function ws_ajax_products_upsell() {
    $all_tags = stripslashes( $_POST['all_tags'] );
    $product_id = stripslashes( $_POST['product'] );
    $upsell_ids = stripslashes( $_POST['upsells'] );
    if ($all_tags)
    {
        $tags_array = array(
            'taxonomy' => 'product_tag',
            'field' => 'slug',
            'terms' => explode(',', $all_tags),
            'operator' => 'AND'
        );
    }
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 12,
        'post__in' => explode(',', $upsell_ids),
        'post__not_in' => array( $product_id ),
        'tax_query' => array(
            $tags_array
        )
    );
    $temp = $wp_query; 
    $wp_query = null;
    $wp_query = new WP_Query( $args );
    if ($wp_query->have_posts()) :
        if ( $wp_query->have_posts() ) {
            ?>
            <div class="animated-grid">
            <?php
            while ( $wp_query->have_posts() ) : $wp_query->the_post();
                woocommerce_get_template_part( 'content', 'product' );
            endwhile;
            ?>
            </div>
            <nav class="woocommerce-pagination">
                <?php
                $page_url = home_url('/');
                echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
                    'base'         => esc_url_raw($page_url) . 'product-category/' . $current_cat . '%_%',
                    'format'       => '/page/%#%',
                    'add_args'     => false,
                    'total'        => $wp_query->max_num_pages,
                    'prev_text'    => '&larr;',
                    'next_text'    => '&rarr;',
                    'type'         => 'list',
                    'end_size'     => 3,
                    'mid_size'     => 3,
                ) ) );
                ?>
            </nav>
        <?php
        } else {
            echo __( 'No products found' );
        }
        wp_reset_postdata();
        $wp_query = null; 
        $wp_query = $temp;
    endif;
    
    die();
}

function ws_ajax_products_upsell_count() {
    $all_tags = stripslashes( $_POST['all_tags'] );
    $product_id = stripslashes( $_POST['product'] );
    $upsell_ids = stripslashes( $_POST['upsells'] );
    if ($all_tags)
    {
        $tags_array = array(
            'taxonomy' => 'product_tag',
            'field' => 'slug',
            'terms' => explode(',', $all_tags),
            'operator' => 'AND'
        );
    }
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'post__in' => explode(',', $upsell_ids),
        'post__not_in' => array( $product_id ),
        'tax_query' => array(
            $tags_array
        )
    );

    $wp_query = new WP_Query( $args );

    $count = $wp_query->found_posts;
    echo $count;
    
    die();
}

add_action( 'init', 'ws_product_question_form_init' );
function ws_product_question_form_init() {
    wp_register_script( 'ws-ajax-products-question', get_template_directory_uri() . '/assets/js/ws_ajax_products_question.js', array('jquery'), '' );
    wp_localize_script( 'ws-ajax-products-question', 'wsajaxproductsquestion', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    ));
    wp_enqueue_script('ws-ajax-products-question');
    
    add_action( 'wp_ajax_productquestion', 'wpse_sendmail' );
    add_action( 'wp_ajax_nopriv_productquestion', 'wpse_sendmail' );
}

function wpse_sendmail()
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['comment'];
	$product = $_POST['product'];
    $headers = 'From: info@digitalsputnik.com' . " \r\n".'Reply-To: '.$email;

    if (wp_mail( "info@digitalsputnik.com", "Form from homepage", "Form from homepage\r\n Name: " . $name . "\r\nEmail: " . $email . "\r\nPhone: " . $phone . "\r\nMessage: " . $message . "\r\nProduct: ". $product, $headers))
    {
        echo 'OK';
    }
    else {
        echo 'ERROR';
    }

    die();
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}


/* add custom post type - banner */

add_action( 'init', 'codex_custom_init_learn' );
function codex_custom_init_learn() {
  $labels = array(
    'name' => _x('Learn', 'post type general name'),
    'singular_name' => _x('Learn', 'post type singular name'),
    'add_new' => _x('Add Learn', 'Learn'),
    'add_new_item' => __('Add new Learn'),
    'edit_item' => __('Edit Learn'),
    'new_item' => __('New Learn'),
    'all_items' => __('All Learns'),
    'view_item' => __('View Learn'),
    'search_items' => __('Search Learn'),
    'not_found' =>  __('No Learn found'),
    'not_found_in_trash' => __('No Learn found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Learn'

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'taxonomies' => array('learn_categorie', 'learn_tag'),
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
	'menu_icon' => 'dashicons-welcome-learn-more',
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array( 'title', 'editor', 'comments', 'thumbnail' )
  ); 
  register_post_type('learn',$args);
  flush_rewrite_rules();
}

//add filter to ensure the text plot, or plot, is displayed when user updates a plot 
add_filter( 'post_updated_messages', 'codex_learn_updated_messages' );
function codex_learn_updated_messages( $messages ) {
  global $post, $post_ID;

  $messages['learn'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => sprintf( __('Learn updated. <a href="%s">View Learn</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Learn updated.'),
    /* translators: %s: date and time of the revision */
    5 => isset($_GET['revision']) ? sprintf( __('Learn restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Learn published. <a href="%s">View Learn</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Learn saved.'),
    8 => sprintf( __('Learn submitted. <a target="_blank" href="%s">Preview Learn</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Learn scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Learn</a>'),
      // translators: Publish box date format, see http://php.net/date
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Learn draft updated. <a target="_blank" href="%s">Preview Learn</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
}

//display contextual help for product
add_action( 'contextual_help', 'codex_add_help_text_learn', 10, 3 );

function codex_add_help_text_learn( $contextual_help, $screen_id, $screen ) { 
  //$contextual_help .= var_dump( $screen ); // use this to help determine $screen->id
  if ( 'learn' == $screen->id ) {
    $contextual_help =
      '<p>' . __('Things to remember when adding or editing a Learn:') . '</p>' .
      '<ul>' .
      '<li>' . __('Specify the correct genre such as Mystery, or Historic.') . '</li>' .
      '<li>' . __('Specify the correct writer of the Learn.  Remember that the Author module refers to you, the author of this Learn review.') . '</li>' .
      '</ul>' .
      '<p>' . __('If you want to schedule the Learn review to be published in the future:') . '</p>' .
      '<ul>' .
      '<li>' . __('Under the Learn module, click on the Edit link next to Publish.') . '</li>' .
      '<li>' . __('Change the date to the date to actual publish this article, then click on Ok.') . '</li>' .
      '</ul>' .
      '<p><strong>' . __('For more information:') . '</strong></p>' .
      '<p>' . __('<a href="http://codex.wordpress.org/Posts_Edit_SubPanel" target="_blank">Edit Posts Documentation</a>') . '</p>' .
      '<p>' . __('<a href="http://wordpress.org/support/" target="_blank">Support Forums</a>') . '</p>' ;
  } elseif ( 'edit-learn' == $screen->id ) {
    $contextual_help = 
      '<p>' . __('This is the help screen displaying the table of Learn blah blah blah.') . '</p>' ;
  }
  return $contextual_help;
}

add_action( 'init', 'create_learn_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_learn_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Categorie', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Categories', 'textdomain' ),
		'all_items'         => __( 'All Categorie', 'textdomain' ),
		'parent_item'       => __( 'Parent Categorie', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Categorie:', 'textdomain' ),
		'edit_item'         => __( 'Edit Categorie', 'textdomain' ),
		'update_item'       => __( 'Update Categorie', 'textdomain' ),
		'add_new_item'      => __( 'Add New Categorie', 'textdomain' ),
		'new_item_name'     => __( 'New Categorie Name', 'textdomain' ),
		'menu_name'         => __( 'Categories', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'learn_categorie' ),
	);

	register_taxonomy( 'learn_categorie', array( 'learn' ), $args );

	// Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name'                       => _x( 'Tags', 'taxonomy general name', 'textdomain' ),
		'singular_name'              => _x( 'Tag', 'taxonomy singular name', 'textdomain' ),
		'search_items'               => __( 'Search Tags', 'textdomain' ),
		'popular_items'              => __( 'Popular Tags', 'textdomain' ),
		'all_items'                  => __( 'All Tags', 'textdomain' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Tag', 'textdomain' ),
		'update_item'                => __( 'Update Tag', 'textdomain' ),
		'add_new_item'               => __( 'Add New Tag', 'textdomain' ),
		'new_item_name'              => __( 'New Tag Name', 'textdomain' ),
		'separate_items_with_commas' => __( 'Separate tags with commas', 'textdomain' ),
		'add_or_remove_items'        => __( 'Add or remove tags', 'textdomain' ),
		'choose_from_most_used'      => __( 'Choose from the most used tags', 'textdomain' ),
		'not_found'                  => __( 'No tags found.', 'textdomain' ),
		'menu_name'                  => __( 'Tags', 'textdomain' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'learn_tag' ),
	);

	register_taxonomy( 'learn_tag', 'learn', $args );
}

function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'News';
    $labels->singular_name = 'News';
    $labels->add_new = 'Add News';
    $labels->add_new_item = 'Add News';
    $labels->edit_item = 'Edit News';
    $labels->new_item = 'News';
    $labels->view_item = 'View News';
    $labels->search_items = 'Search News';
    $labels->not_found = 'No News found';
    $labels->not_found_in_trash = 'No News found in Trash';
    $labels->all_items = 'All News';
    $labels->menu_name = 'News';
    $labels->name_admin_bar = 'News';
}
 
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );

function wpdev_nav_classes($classes) {
    // Remove "current_page_parent" class
    $classes = array_diff( $classes, array( 'current_page_parent' ) );

    // If this is the "news" custom post type, highlight the correct menu item
    if ( in_array('menu-item-523', $classes) && get_post_type() === 'post' || in_array('menu-item-691', $classes) && get_post_type() === 'post' ) {
        $classes[] = 'current_page_parent';
    }
    if ( in_array('menu-item-531', $classes) && get_post_type() === 'learn' || in_array('menu-item-690', $classes) && get_post_type() === 'learn' ) {
        $classes[] = 'current_page_parent';
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'wpdev_nav_classes');

function template_chooser($template)   
{    
    global $wp_query;   
    $post_type = get_query_var('post_type');   
    if( $wp_query->is_search && $post_type == 'learn' )   
    {
        return locate_template('archive-learn.php');
    }   
    return $template;
}
add_filter('template_include', 'template_chooser');





add_action('woocommerce_form_field_args', 'wc_form_field_args', 10, 3);

function wc_form_field_args( $args, $key, $value = null ) {

/*
This is not meant to be here, but it serves as a reference
of what is possible to be changed.

$defaults = array(
    'type'              => 'text',
    'label'             => '',
    'description'       => '',
    'placeholder'       => '',
    'maxlength'         => false,
    'required'          => false,
    'id'                => $key,
    'class'             => array(),
    'label_class'       => array(),
    'input_class'       => array(),
    'return'            => false,
    'options'           => array(),
    'custom_attributes' => array(),
    'validate'          => array(),
    'default'           => '',
);
*/

// Start field type switch case

switch ( $args['type'] ) {

    case "select" :  /* Targets all select input type elements, except the country and state select input types */
        $args['class'][] = 'form-group'; // Add a class to the field's html element wrapper - woocommerce input types (fields) are often wrapped within a <p></p> tag  
        $args['input_class'] = array('form-control'); // Add a class to the form input itself
        //$args['custom_attributes']['data-plugin'] = 'select2';
        $args['label_class'] = array('control-label');
        $args['custom_attributes'] = array( 'data-plugin' => 'select2', 'data-allow-clear' => 'true', 'aria-hidden' => 'true',  ); // Add custom data attributes to the form input itself
    break;

    case 'country' : /* By default WooCommerce will populate a select with the country names - $args defined for this specific input type targets only the country select element */
        $args['class'][] = 'form-group single-country';
        $args['label_class'] = array('control-label');
    break;

    case "state" : /* By default WooCommerce will populate a select with state names - $args defined for this specific input type targets only the country select element */
        $args['class'][] = 'form-group'; // Add class to the field's html element wrapper 
        $args['input_class'] = array('form-control'); // add class to the form input itself
        //$args['custom_attributes']['data-plugin'] = 'select2';
        $args['label_class'] = array('control-label');
        $args['custom_attributes'] = array( 'data-plugin' => 'select2', 'data-allow-clear' => 'true', 'aria-hidden' => 'true',  );
    break;


    case "password" :
    case "text" :
    case "email" :
    case "tel" :
    case "number" :
        $args['class'][] = 'form-group';
        //$args['input_class'][] = 'form-control input-lg'; // will return an array of classes, the same as bellow
        $args['input_class'] = array('form-control');
        $args['label_class'] = array('control-label');
    break;

    case 'textarea' :
        $args['input_class'] = array('form-control');
        $args['label_class'] = array('control-label');
    break;

    case 'checkbox' :  
    break;

    case 'radio' :
    break;

    default :
        $args['class'][] = 'form-group';
        $args['input_class'] = array('form-control');
        $args['label_class'] = array('control-label');
    break;
    }

    return $args;

    if ( !is_page('checkout') ) {
        add_filter('woocommerce_form_field_args','wc_form_field_args', 10, 3);
    } else {
        remove_filter('woocommerce_form_field_args','wc_form_field_args', 10, 3);
    }

}
/*
add_action( 'wcml_client_currency', 'currency' );
function currency( $current_currency ) {
    if (!is_admin()) {
        global $woocommerce,$sitepress;

        $country = WC_Geolocation::geolocate_ip();
        $currenct_country_list = array('USA','CAN','MEX');
        if (in_array($country['country'], $currenct_country_list))
        {
            $currency = 'USD';
        }
        else {
            $currency = 'EUR';
        }

        $woocommerce->session->set('client_currency', $currency);    

        return $currency;
    }
}
*/
add_action( 'wp_footer', 'cart_update_qty_script' );
function cart_update_qty_script() {
    if (is_cart()) :
        ?>
        <script type="text/javascript">
            (function($){
                $(function(){
                    $('div.woocommerce').on( 'change', '.qty', function(){
                        $("[name='update_cart']").trigger('click');
                    });
                });
            })(jQuery);
        </script>
        <?php
    endif;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
    ob_start();
    ?>
    <span class="cart-count pull-right"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
    <?php

    $fragments['span.cart-count'] = ob_get_clean();

    return $fragments;
}

class Description_Walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth, $args)
    {
        $classes = empty($item->classes) ? array () : (array) $item->classes;
        $class_names = join(' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        !empty ( $class_names ) and $class_names = ' class="'. esc_attr( $class_names ) . '"';
        $output .= "";
        $attributes  = '';
        !empty( $item->attr_title ) and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        !empty( $item->target ) and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        !empty( $item->xfn ) and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        !empty( $item->url ) and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';
        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $item_output = $args->before
        . "<a $attributes $class_names>"
        . $args->link_before
        . $title
        . '</a>'
        . $args->link_after
        . $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

