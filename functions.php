<?php //Load all scripts
function spaceroom_scripts() {
	if (!is_admin()) {
    wp_enqueue_style('blue-theme-v3-0', get_stylesheet_uri());
    wp_enqueue_style('blue-theme-v3-0', get_stylesheet_uri());

	wp_enqueue_script('jquery');
	wp_enqueue_script('jscompiled', get_template_directory_uri() . '/js/jscompiled.js', array('jquery')); // Load JS compiled
	wp_enqueue_script('core_custom', get_template_directory_uri() . '/js/core_custom.js', array('jquery', 'jscompiled'), true); // Load core script
	}
    if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') ){
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action('init', 'spaceroom_scripts');

function add_localization() {
    $lang_dir = get_template_directory() . '/lang';   
    load_theme_textdomain('blue_theme', $lang_dir);
} 
add_action('after_setup_theme', 'add_localization');

function register_my_menus() {
	register_nav_menus(
		array(
          'main_menu' => 'Main navigation menu',
          'footer_menu_01' => 'Footer navigation menu 1',
          'footer_menu_02' => 'Footer navigation menu 2',
		  'footer_menu_03' => 'Footer navigation menu 3',
		)
	);
}
add_action( 'init', 'register_my_menus' );

add_theme_support( 'post-thumbnails' );

add_theme_support( 'automatic-feed-links' ); 

if ( function_exists( 'add_image_size' ) ) { 
    add_image_size( 'featured', 900, 540, true ); 
	add_image_size( 'banner', 1500, 750, true ); 
    add_image_size( 'square', 650, 650, true ); 
	add_image_size( 'avatar', 300, 300, true ); 
}

//Hides post page navigaton if no extra pages
function show_posts_nav() {
    global $wp_query;
    return ($wp_query->max_num_pages > 1);
}
function mytheme_comment($comment, $args, $depth) {//Customised comments
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class('commentWrapper'); ?> id="li-comment-<?php comment_ID() ?>">
     <article id="comment-<?php comment_ID(); ?>">
		<div class="avatar">
			<?php echo get_avatar($comment,$size='50',$default='' ); ?>
			<div class="clear"></div>
		</div>
		<div class="commentBodyWrapper">
			<header class="commentHeader">
				<div class="detail">
					<?php printf(__('<span class="says">by</span> %s'), get_comment_author_link()) ?> <span class="divider">|</span>
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">	
						<?php printf('%1$s at %2$s', get_comment_date("d.m.Y"),  get_comment_time()) ?>
					</a>
				</div>
				<div class="clear"></div>
			  	<?php if ($comment->comment_approved == '0') : ?>
					 <?php echo ('Your comment is awaiting moderation.') ?>
			  	<?php endif; ?>
			</header>
			<section class="commentBody">
				<?php comment_text() ?>
				<div class="clear"></div>
			</section>
			<footer class="commentFooter">
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?> 
				<?php edit_comment_link('Edit','  ','') ?>
			</footer>
		</div>
     </article>
 </li>
<?php }

function custom_wp_link_pages( $args = '' ) {
    $defaults = array(
        'before' => '<footer><div class="pagination"><span class="paginationLabel">' . __( 'Pages:', 'blue-theme-v3-0' ) .'</span>', 
        'after' => '</div><div class="clear"></div></footer>',
        'text_before' => '',
        'text_after' => '',
        'next_or_number' => 'number', 
        'nextpagelink' => __( 'Next page', 'blue-theme-v3-0'),
        'previouspagelink' => __( 'Previous page', 'blue-theme-v3-0'),
        'pagelink' => '%',
        'echo' => 1
    );
    $r = wp_parse_args( $args, $defaults );
    $r = apply_filters( 'wp_link_pages_args', $r );
    extract( $r, EXTR_SKIP );
    global $page, $numpages, $multipage, $more, $pagenow;
    $output = '';
    if ( $multipage ) {
        if ( 'number' == $next_or_number ) {
            $output .= $before;
            for ( $i = 1; $i < ( $numpages + 1 ); $i = $i + 1 ) {
                $j = str_replace( '%', $i, $pagelink );
                $output .= ' ';
                if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
                    $output .= _wp_link_page( $i );
                else
                    $output .= '<span class="current-post-page">';

                $output .= $text_before . $j . $text_after;
                if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
                    $output .= '</a>';
                else
                    $output .= '</span>';
            }
            $output .= $after;
        } else {
            if ( $more ) {
                $output .= $before;
                $i = $page - 1;
                if ( $i && $more ) {
                    $output .= _wp_link_page( $i );
                    $output .= $text_before . $previouspagelink . $text_after . '</a>';
                }
                $i = $page + 1;
                if ( $i <= $numpages && $more ) {
                    $output .= _wp_link_page( $i );
                    $output .= $text_before . $nextpagelink . $text_after . '</a>';
                }
                $output .= $after;
            }
        }
    }
    if ( $echo )
        echo $output;
    return $output;
} 

function get_excerpt(){
$excerpt = get_the_content();
$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
$excerpt = strip_shortcodes($excerpt);
$excerpt = strip_tags($excerpt);
$excerpt = substr($excerpt, 0, 160);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
$excerpt = $excerpt.'...';
return $excerpt;
}

function editor_styles() {
    add_editor_style( 'css/custom-editor-style.css' );
}
add_action( 'init', 'editor_styles' );

function remove_pages_from_search() {
    global $wp_post_types;
    $wp_post_types['page']->exclude_from_search = true;
}
add_action('init', 'remove_pages_from_search');
// List category fix
function wp_list_categories_for_post_type($post_type, $args = '') {
    $exclude = array();

    // Check ALL categories for posts of given post type
    foreach (get_categories() as $category) {
        $posts = get_posts(array('post_type' => $post_type, 'category' => $category->cat_ID));

        // If no posts found, ...
        if (empty($posts))
            // ...add category to exclude list
            $exclude[] = $category->cat_ID;
    }

    // Set up args
    if (! empty($exclude)) {
        $args .= ('' === $args) ? '' : '&';
        $args .= 'exclude='.implode(',', $exclude);
    }    
    // List categories
    wp_list_categories($args);
}
add_action( 'customize_preview_init', 'blue_theme_customiser' );
function blue_theme_customiser() {
    wp_enqueue_script(
          'cd_customizer',
          get_template_directory_uri() . '/includes/customiser/customiser.js',
          array( 'jquery','customize-preview' ),
          '',
          true
    );
}
add_action( 'after_setup_theme', 'wpse_theme_setup' );
function wpse_theme_setup() {
    add_theme_support( 'title-tag' );//WP adds title tag to header
}
if ( ! isset( $content_width ) ) {
    $content_width = 960;
}
function the_titlesmall($before = '', $echo = true, $length = false) { 
$title = get_the_title(); // Limit header length
if ( strlen($title)> 130 ) {
    $after = '...';
}else {
    $after = '';
}
if ( $length && is_numeric($length) ) {
    $title = substr( $title, 0, $length );
}
if ( strlen($title)> 0 ) {
    $title = apply_filters('the_titlesmall', $before . $title . $before, $after);
    if ( $echo )
        echo $title.$after;
    else
        return $title;
    }
}
include('includes/customiser/customiser.php');
add_filter( 'wp_nav_menu_items', 'your_custom_menu_item', 10, 2 );
function your_custom_menu_item ( $items, $args ) {
if ($args->theme_location == 'main_menu' ) {
    if ( get_theme_mod( 'blue_theme_twitter' ) ){$items .= '<li class="navIcon"><a href="'.get_theme_mod( 'blue_theme_twitter' ).'" target="blank" class="fab fa-twitter"><span>Twitter</span></a></li>';}
    if ( get_theme_mod( 'blue_theme_facebook' ) ){$items .= '<li class="navIcon"><a href="'.get_theme_mod( 'blue_theme_facebook' ).'" target="blank" class="fab fa-facebook-f"><span>Facebook</span></a></li>';}
    if ( get_theme_mod( 'blue_theme_instagram' ) ){$items .= '<li class="navIcon"><a href="'.get_theme_mod( 'blue_theme_instagram' ).'" target="blank" class="fab fa-instagram"><span>Instagram</span></a></li>';}
    if ( get_theme_mod( 'blue_theme_youtube' ) ){$items .= '<li class="navIcon"><a href="'.get_theme_mod( 'blue_theme_youtube' ).'" target="blank" class="fab fa-youtube"><span>YouTube</span></a></li>';}
}
return $items;
}
include('includes/customiser/custom_css.php');

/*include('includes/custom_fields/admin_css.php');
require_once( __DIR__ . '/includes/custom_fields/pageSectionsAdmin.php');*/
