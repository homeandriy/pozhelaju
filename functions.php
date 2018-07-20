<?php
/**
 * pozhelaju functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pozhelaju
 */

if ( ! function_exists( 'pozhelaju_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pozhelaju_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on pozhelaju, use a find and replace
		 * to change 'pozhelaju' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'pozhelaju', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'pozhelaju' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'pozhelaju_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'pozhelaju_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pozhelaju_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'pozhelaju_content_width', 640 );
}
add_action( 'after_setup_theme', 'pozhelaju_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pozhelaju_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pozhelaju' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'pozhelaju' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title left-widget">',
		'after_title'   => '</h4>',
	) );
    register_sidebar( array(
        'name'          => 'Menu',
        'id'            => 'sidebar-2',
        'description'   => esc_html__( 'Add menu.', 'pozhelaju' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'pozhelaju_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pozhelaju_scripts() {
    wp_enqueue_style( 'pozhelaju-bt', get_stylesheet_directory_uri().'/css/bootstrap.css' );
    wp_enqueue_style( 'mobile-menu', get_stylesheet_directory_uri().'/css/jquery.mmenu.css' );
    wp_enqueue_style( 'awesome', get_stylesheet_directory_uri().'/css/font-awesome.min.css' );
    wp_enqueue_style( 'pozhelaju-style', get_stylesheet_uri() );


    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'pozhelaju-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
    wp_enqueue_script( 'pozhelaju-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
    wp_enqueue_script( 'mobile_menu_js', get_stylesheet_directory_uri() . '/js/jquery.mmenu.js', array(), '20151215', true );
    wp_enqueue_script( 'pozhelaju-bt_js', get_stylesheet_directory_uri() . '/js/bootstrap.js', array(), '20151215', true );
    wp_enqueue_script( 'pozhelaju-theme_js', get_stylesheet_directory_uri() . '/js/theme.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pozhelaju_scripts' );

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

function pagination() { // функция вывода пагинации
    global $wp_query; // текущая выборка должна быть глобальной
    $big = 999999999; // число для замены
    echo paginate_links(array( // вывод пагинации с опциями ниже
        'base' => str_replace($big,'%#%',esc_url(get_pagenum_link($big))), // что заменяем в формате ниже
        'format' => '?paged=%#%', // формат, %#% будет заменено
        'current' => max(1, get_query_var('paged')), // текущая страница, 1, если $_GET['page'] не определено
        'total' => $wp_query->max_num_pages, // общие кол-во страниц в пагинации
        'type' => 'list', // ссылки в ul
        'prev_text'    => '<i class="fa fa-arrow-left"></i>&nbspНазад', // текст назад
        'next_text'    => 'Еще &nbsp<i class="fa fa-arrow-right"></i>', // текст вперед
        'show_all'     => false, // не показывать ссылки на все страницы, иначе end_size и mid_size будут проигнорированны
        'end_size'     => 3, //  сколько страниц показать в начале и конце списка (12 ... 4 ... 89)
        'mid_size'     => 3, // сколько страниц показать вокруг текущей страницы (... 123 5 678 ...).
        'add_args'     => false, // массив GET параметров для добавления в ссылку страницы
        'add_fragment' => '',	// строка для добавления в конец ссылки на страницу
        'before_page_number' => '', // строка перед цифрой
        'after_page_number' => '' // строка после цифры
    ));
}

if (!class_exists('bootstrap_menu')) {
    class bootstrap_menu extends Walker_Nav_Menu { // внутри вывод
        private $open_submenu_on_hover; // параметр который будет определять раскрывать субменю при наведении или оставить по клику как в стандартном бутстрапе

        function __construct($open_submenu_on_hover = true) { // в конструкторе
            $this->open_submenu_on_hover = $open_submenu_on_hover; // запишем параметр раскрывания субменю
        }

        function start_lvl(&$output, $depth = 0, $args = array()) { // старт вывода подменюшек
            $output .= "\n<ul class=\"dropdown-menu parent\">\n"; // ул с классом
        }
        function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) { // старт вывода элементов

            $item_html = ''; // то что будет добавлять
            parent::start_el($item_html, $item, $depth, $args); // вызываем стандартный метод родителя

            // добавления атрибута для перевода меню

            if ( $item->is_dropdown && $depth === 0 )
            { // если элемент содержит подменю и это элемент первого уровня
                $item_html = str_replace('<a', '<a aria-haspopup="true" class=" '.implode(' ',$item->classes).'" ', $item_html);
                $item_html = str_replace('</a>', ' </a>', $item_html); // ну это стрелочка вниз
                if (!$this->open_submenu_on_hover)   // если подменю не будет раскрывать при наведении надо добавить стандартные атрибуты бутстрапа для раскрытия по клику
                    $item_html = str_replace('</a>', ' </a>', $item_html); // ну это стрелочка вниз

            }


            $output .= $item_html; // приклеиваем теперь
            $output = str_replace(':&nbsp;', '', $output);
        }
        function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) { // вывод элемента

            $element->classes[] = 'vloz-'.$depth;
            if ( $element->current ) $element->classes[] = 'active'; // если элемент активный надо добавить бутстрап класс для подсветки
            $element->is_dropdown = !empty( $children_elements[$element->ID] ); // если у элемента подменю
            if ( $element->is_dropdown ) { // если да
                if ( $depth === 0 ) { // если li содержит субменю 1 уровня
                    $element->classes[] = 'dropdown-submenu'; // то добавим этот класс
                    if ($this->open_submenu_on_hover) $element->classes[] = '1-show-on-hover'; // если нужно показывать субменю по хуверу
                } elseif ( $depth === 1 ) { // если li содержит субменю 2 уровня
                    $element->classes[] = 'dropdown-submenu'; // то добавим этот класс, стандартный бутстрап не поддерживает подменю больше 2 уровня по этому эту ситуацию надо будет разрешать отдельно
                }
            }
            parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output); // вызываем стандартный метод родителя
        }
    }
}

