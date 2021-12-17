<?php
/**
 * Disable automatic general feed link outputting.
 */

automatic_feed_links( false );


function SportsFan_scripts() {
	wp_enqueue_style( 'style-main', get_stylesheet_uri() );
	
	wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css');
	wp_enqueue_style('font', get_template_directory_uri() . '/css/fonts.css');
	
	wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true);
	
}

add_action( 'wp_enqueue_scripts', 'SportsFan_scripts' );


remove_action('wp_head', 'wp_generator');

function fix_category_pagination($qs){
    if(isset($qs['category_name']) && isset($qs['paged'])){
        $qs['post_type'] = get_post_types($args = array(
            'public'   => true,
            '_builtin' => false
        ));
        array_push($qs['post_type'],'post');
    }
    return $qs;
}
add_filter('request', 'fix_category_pagination');

add_theme_support('post-thumbnails'); 
set_post_thumbnail_size(180, 180, TRUE);	

add_image_size( 'thumb270_146', 270, 146, true  );
add_image_size( 'thumb450_170', 450, 170, true  );
add_image_size( 'thumb144_187', 144, 187, true  );
add_image_size( 'thumb604_264', 604, 264, true  );
add_image_size( 'thumb92_107', 92, 107, true  );

function wp_corenavi() {
  global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['total'] = $max;
  $a['current'] = $current;

  $total = 1; //1 - выводить текст "Страница N из N", 0 - не выводить
  $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
  $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
  $a['prev_text'] = '<<'; //текст ссылки "Предыдущая страница"
  $a['next_text'] = '>>'; //текст ссылки "Следующая страница"

  if ($max > 1) echo '<div class="pagination">';
  //if ($total == 1 && $max > 1) $pages = '<span class="pages">Страницы</span>'."\r\n";
  echo $pages . paginate_links($a);
  if ($max > 1) echo '</div>';
} 


if ( function_exists('register_sidebar') ) {

	register_sidebar(array(
		'name' 			=> 'Header area 1',
		'id'            => 'header-area1',
		'before_widget' => '',
		'after_widget' 	=> '',
		'before_title' 	=> '<h3>',
		'after_title' 	=> '</h3>'
	));
	register_sidebar(array(
		'name' 			=> 'Header area 2',
		'id'            => 'header-area2',
		'before_widget' => '',
		'after_widget' 	=> '',
		'before_title' 	=> '<h3>',
		'after_title' 	=> '</h3>'
	));
	
	register_sidebar(array(
		'name' 			=> 'Index block1',
		'id'            => 'indexblock1',
		'before_widget' => '',
		'after_widget' 	=> '',
		'before_title' 	=> '<h2>',
		'after_title' 	=> '</h2>'
	));
	register_sidebar(array(
		'name' 			=> 'Index block Left',
		'id'            => 'indexblock-left',
		'before_widget' => '<div class="grid_6  alpha">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h2>',
		'after_title' 	=> '</h2>'
	));
	register_sidebar(array(
		'name' 			=> 'Index block Right',
		'id'            => 'indexblock-right',
		'before_widget' => '<div class="grid_6  omega">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h2>',
		'after_title' 	=> '</h2>'
	));
	
	register_sidebar(array(
		'name' 			=> 'Sidebar',
		'id'            => 'sidebar',
		'before_widget' => '',
		'after_widget' 	=> '',
		'before_title' 	=> '<h3>',
		'after_title' 	=> '</h3>'
	));
	
	
	register_sidebar(array(
		'name' 		=> 'Footer One',
		'id'            => 'footer-one',
		'before_widget' => '',
		'after_widget' 	=> '',
		'before_title' 	=> '<h4>',
		'after_title' 	=> '</h4>'
	));
	register_sidebar(array(
		'name' 		=> 'Footer Two',
		'id'            => 'footer-two',
		'before_widget' => '',
		'after_widget' 	=> '',
		'before_title' 	=> '<h4>',
		'after_title' 	=> '</h4>'
	));
	register_sidebar(array(
		'name' 		=> 'Footer Three',
		'id'            => 'footer-three',
		'before_widget' => '',
		'after_widget' 	=> '',
		'before_title' 	=> '<h4>',
		'after_title' 	=> '</h4>'
	));
	register_sidebar(array(
		'name' 		=> 'Footer four',
		'id'            => 'footer-four',
		'before_widget' => '',
		'after_widget' 	=> '',
		'before_title' 	=> '<h4>',
		'after_title' 	=> '</h4>'
	));
	
	register_sidebar(array(
		'name' 			=> 'Final Code',
        'description' 	=> 'For popups, web-analytics code and etc.',
		'id'            => 'final-code',
		'before_widget' => '',
		'after_widget' 	=> '',
		'before_title' 	=> '',
		'after_title' 	=> ''
	));	
}

function theme_template_url(){
	return get_bloginfo('template_url');
}
add_shortcode('template_url', 'theme_template_url');
add_filter('widget_text', 'do_shortcode');



function register_my_menus(){
	register_nav_menus(array(
		'main-menu'=>'Main menu',
		'footer-menu'=>'Footer menu'
	));
}
add_action('init','register_my_menus');


function new_excerpt_length($length) {
		return 5;
}
add_filter('excerpt_length', 'new_excerpt_length');


function new_excerpt_more($more) {
       global $post;
	return '<a href="'. get_permalink($post->ID) . '"> подробнее...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


function the_content_limit($max_char, $more_link_text = ' ', $stripteaser = 0, $more_file = '') {
    $content = get_the_content($more_link_text, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    $content = strip_tags($content);
   if (strlen($_GET['p']) > 0) {
      echo "<p>";
      echo $content;
     // echo "&nbsp;<a href='"; the_permalink(); echo "'>"."Читать полностью</a>";
      echo "</p>";
   }   else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
        $content = substr($content, 0, $espacio);
        $content = $content;
        echo "<p>";
        echo $content;
   // echo "&nbsp;<a href='"; the_permalink(); echo "'>"."Читать полностью</a>";
        echo "</p>";
   }   else {
      echo "<p>";
      echo $content;
    //  echo "&nbsp;<a href='"; the_permalink(); echo "'>"."Читать полностью</a>";
      echo "</p>";
   }
}    


function breadcrumbs() {

  $delimiter = ''; // разделить между ссылками  
  
  $home = 'Home';
  

  
  $before = '';
  $after = '';

  if ( !is_home() && !is_front_page() || is_paged() ) {
    echo '<div class="breadcrumbs">';
    global $post;
    $homeLink = get_bloginfo('url');
    echo '<a class="breadcrumbs__link" href="' . $homeLink . '">' . $home . '</a><span class="breadcrumbs__slash">/</span> ' . $delimiter . ' ';
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
		if ($thisCat->parent != 0) {
			$cat = get_the_category(); $cat = $cat[0];
			$cat_per = $category[0]->category_parent;
			
			//echo ' <li>' . get_category_parents($category, TRUE, '<span class="breadcrumbs__slash">/</span>') . '</li>';
			echo (get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' ')). '<span class="breadcrumbs__slash">/</span>';
		}
      echo ' <span class="breadcrumbs__active">' . single_cat_title('', false) . '</span>';

    } elseif ( is_day() ) {
      echo '<a class="breadcrumbs__link" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a><span class="breadcrumbs__slash">/</span> ' . $delimiter . ' ';
      echo '<a class="breadcrumbs__link" href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a><span class="breadcrumbs__slash">/</span> ' . $delimiter . ' ';
      echo ' <span class="breadcrumbs__active">' . get_the_time('d') . '</span>';

    } elseif ( is_month() ) {
      echo '<a class="breadcrumbs__link" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a><span class="breadcrumbs__slash">/</span> ' . $delimiter . ' ';
      echo ' <span class="breadcrumbs__active">' . get_the_time('F') . '</span>';

    } elseif ( is_year() ) {
      echo ' <span class="breadcrumbs__active">' . get_the_time('Y') . '</span>';

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo ' <a class="breadcrumbs__link" href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a><span class="breadcrumbs__slash">/</span> ' . $delimiter . ' ';
        echo ' <span class="breadcrumbs__active">' . get_the_title() . '</span>';
      } else {
        $cat = get_the_category(); 
		$cat = $cat[0];
		
		$category  = get_the_category();
		$cat_per = $category[0]->category_parent;
		
			echo ' ' . get_category_parents($cat, TRUE, ' <span class="breadcrumbs__slash">/</span> ') . ' ';
			echo ' <span class="breadcrumbs__active">' . get_the_title() . '</span>';
		
		
		
      }
	  
	  

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
     // echo $before . $post_type->labels->singular_name . $after;
	  echo ' <span class="breadcrumbs__active">' . $post_type->labels->singular_name . '</span>';

    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a class="breadcrumbs__link" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a><span class="breadcrumbs__slash">/</span> ' . $delimiter . ' ';
      echo '<span class="breadcrumbs__active">' . get_the_title() . '</span>';

    } elseif ( is_page() && !$post->post_parent ) {
	   echo ' <span class="breadcrumbs__active">' . get_the_title() . '</span>';

    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a class="breadcrumbs__link" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a><span class="breadcrumbs__slash">/</span>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
       echo ' <span class="breadcrumbs__active">' . get_the_title() . '</span>';

    } elseif ( is_search() ) {
      echo $before . 'Search for "' . get_search_query() . '"' . $after;

    } elseif ( is_tag() ) {
      echo $before . 'Записи с тегом "' . single_tag_title('', false) . '"' . $after;

    } elseif ( is_author() ) {
      global $author;
      $userdata = get_userdata($author);
      echo $before . 'Статьи автора ' . $userdata->display_name . $after;

    } elseif ( is_404() ) {
      echo ' <span class="breadcrumbs__active">Error 404</span>';
    }

    echo '</div>';
  }
}


function kama_excerpt($args=''){  
    global $post;  
        parse_str($args, $i);  
        $maxchar     = isset($i['maxchar']) ?  (int)trim($i['maxchar'])     : 350;  
        $text        = isset($i['text']) ?          trim($i['text'])        : '';  
        $save_format = isset($i['save_format']) ?   trim($i['save_format'])         : false;  
        $echo        = isset($i['echo']) ?          false                   : true;  
  
    if (!$text){  
        $out = $post->post_excerpt ? $post->post_excerpt : $post->post_content;  
        $out = mb_ereg_replace ("!\[/?.*\]!U", '', $out ); //убираем шоткоды, например:[singlepic id=3]  
        // для тега <!--more-->  
        if( !$post->post_excerpt && strpos($post->post_content, '<!--more-->') ){  
            preg_match ('/(.*)<!--more-->/s', $out, $match);  
            $out = str_replace("\r", '', trim($match[1], "\n"));  
            $out = mb_ereg_replace( "!\n\n+!s", "</p><p>", $out );  
            $out = "<p>". str_replace( "\n", "", $out ) ."</p>";  
            if ($echo)  
                return print $out;  
            return $out;  
        }  
    }  
  
    $out = $text.$out;  
    if (!$post->post_excerpt)  
        $out = strip_tags($out, $save_format);  
  
    if ( iconv_strlen($out, 'utf-8') > $maxchar ){  
        $out = iconv_substr( $out, 0, $maxchar, 'utf-8' );  
		$out = mb_ereg_replace('@(.*)\s[^\s]*$@s', '\\1 ', $out); //убираем последнее слово, ибо оно в 99% случаев неполное  
    }  
  
    if($save_format){  
        $out = str_replace( "\r", '', $out );  
        $out = mb_ereg_replace( "!\n\n+!", "</p><p>", $out );  
        $out = "<p>". str_replace ( "\n", "", trim($out) ) .' '."</p>"; 
		
    }  
  
    if($echo) return print $out;  
    return $out;  
}    



function kama_excerpt_exp($args=''){  
    global $post;  
        parse_str($args, $i);  
        $maxchar     = isset($i['maxchar']) ?  (int)trim($i['maxchar'])     : 350;  
        $text        = isset($i['text']) ?          trim($i['text'])        : '';  
        $save_format = isset($i['save_format']) ?   trim($i['save_format'])         : false;  
        $echo        = isset($i['echo']) ?          false                   : true;  
  
    if (!$text){  
        $out = $post->post_excerpt ? $post->post_excerpt : $post->post_content;  
        $out = mb_ereg_replace ("!\[/?.*\]!U", '', $out ); //убираем шоткоды, например:[singlepic id=3]  
        // для тега <!--more-->  
        if( !$post->post_excerpt && strpos($post->post_content, '<!--more-->') ){  
            preg_match ('/(.*)<!--more-->/s', $out, $match);  
            $out = str_replace("\r", '', trim($match[1], "\n"));  
            $out = mb_ereg_replace( "!\n\n+!s", "</p><p>", $out );  
            $out = "". str_replace( "\n", "", $out ) ."";  
            if ($echo)  
                return print $out;  
            return $out;  
        }  
    }  
  
    $out = $text.$out;  
    if (!$post->post_excerpt)  
        $out = strip_tags($out, $save_format);  
  
    if ( iconv_strlen($out, 'utf-8') > $maxchar ){  
        $out = iconv_substr( $out, 0, $maxchar, 'utf-8' );  
		$out = mb_ereg_replace('@(.*)\s[^\s]*$@s', '\\1 ', $out); //убираем последнее слово, ибо оно в 99% случаев неполное  
    }  
  
    if($save_format){  
        $out = str_replace( "\r", '', $out );  
        $out = mb_ereg_replace( "!\n\n+!", "</p><p>", $out );  
        $out = "". str_replace ( "\n", "", trim($out) ) .' '.""; 
		
    }  
  
    if($echo) return print $out;  
    return $out;  
}    


function mytheme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	<?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
	</div>
	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
		<br />
	<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
		<?php
			/* translators: 1: date, 2: time */
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
		?>
	</div>

	<?php comment_text(); ?>

	<div class="reply">
	<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}




add_action( 'init', 'custom_rewrite_rules' );
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	
	// Remove from TinyMCE
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter out the tinymce emoji plugin.
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}


function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');




/**
 * Функция для изменения части WHERE запроса SQL.
 *
 * @param  string $where Предложение WHERE запроса.
 * @return string        Изменённый WHERE запрос.
 */
function os_restrict_by_first_letter( $where ) {

	// Условие проверяет наличие GET запроса с параметром 'az'.
	if ( isset( $_GET['az'] ) ) {

		// Глобализация переменной $wpdb.
		global $wpdb;

		// Изменения касаются только страниц архива.
		if ( ! is_tag() && ! is_date() && is_archive() && is_main_query() ) {

			if($_GET['az']=='0-9'){
				// Устанавливается значение из параметра 'az'.
				$where .= $wpdb->prepare( " AND ( SUBSTRING( {$wpdb->posts}.post_title, 1, 1 ) REGEXP '^[0-9]+$' ) " );
			}else{
				// Устанавливается значение из параметра 'az'.
				$where .= $wpdb->prepare( " AND SUBSTRING( {$wpdb->posts}.post_title, 1, 1 ) = %s ", sanitize_text_field( wp_unslash( $_GET['az'] ) ) );
			}
		}
	}

	// Возвращаются изменённые данные.
	return $where;
}

// Установка фильтра для хука 'posts_where'.
//add_filter( 'posts_where', 'os_restrict_by_first_letter' );






add_filter( 'posts_where', 'title_like_posts_where', 10, 2 );
function title_like_posts_where( $where, &$wp_query ) {
    global $wpdb;
    if ( $post_title_like = $wp_query->get( 'post_title_like' ) ) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'' . esc_sql( $wpdb->esc_like( $post_title_like ) ) . '%\'';
    }
    return $where;
}

	
/***********************************Filter Posts by Title *************************************/

add_action( 'wp_ajax_get_posts_by_name', 'get_posts_by_name' );
add_action( 'wp_ajax_nopriv_get_posts_by_name', 'get_posts_by_name' );
function get_posts_by_name(){
	extract($_POST);
	/* Data Comes from ajax request */
	$alphabet = $selected_alpha;
	if ($selected_alpha == 11){ $alphabet = ''; }
	$cat = $selected_cat;
	
	
	$args = array('child_of' => $cat);
	$categories = get_categories( $args );
	
	foreach($categories as $category) { 
		$cat_arr[] = $category->term_id;
	}
	
	if ($cat_arr){ 
		$cat_req = $cat_arr;
	}else{
		$cat_req = array($cat);
	}
							
	
	if ($selected_sort=='asc'){
	
		$listing = new WP_Query( array(
		'post_type'=>'post',
	    'post_status'=>'publish',
	    'category__in' => $cat_req,
	    'posts_per_page'=>-1, 
		'post_title_like' => $alphabet,
	    'order' => 'ASC',
        'orderby'    => array( 'meta_value' => 'DESC','title' => 'ASC' ),
		
		//'meta_key' => 'wpb_post_views_count',
        //'orderby' => 'meta_value_num', 
        //'order' => 'ASC',		
		));  
	}else{
		
		$listing = new WP_Query( array(
		'post_type'=>'post',
	    'post_status'=>'publish',
	    'category__in' => $cat_req,
	    'posts_per_page'=>-1, 
		'post_title_like' => $alphabet,
	    //'order' => 'DESC',
        //'orderby'    => array( 'meta_value' => 'DESC','title' => 'DESC' ),
		
		'meta_key' => 'wpb_post_views_count',
        'orderby' => 'meta_value_num', 
        'order' => 'ASC',		
		));  
		
	}
	
	
	if ( $listing->have_posts() ) : while( $listing->have_posts() ) : $listing->the_post();?>
		<?php //echo $post_id=$listing->post->ID.' | '; ?>
		
		<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumb92_107');	?>
						
			<div class="covers__teams-item">
				<div class="covers__team-img"><a href="<?php the_permalink(); ?>"><img src="<?php echo $large_image_url[0];?>"></a></div>
				<div class="covers__team-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></div>
					<div class="categories__item-yellow">
					<div class="categories__yellow-like categories__yellow-btn" pid="<?php echo $listing->post->ID; ?>"><img src="<?php bloginfo('template_url'); ?>/img/icons/like.png"></div>
					<div class="categories__yellow-dislike categories__yellow-btn" pid="<?php echo $listing->post->ID; ?>"><img src="<?php bloginfo('template_url'); ?>/img/icons/dislike.png"></div>
				</div>
			</div>
		
	<?php endwhile; else: ?><div class="listing-item"><p>No data!</p></div><?php endif; 
	wp_reset_query();
	wp_die();
}

add_action( 'wp_ajax_like_post', 'like_post' );
add_action( 'wp_ajax_nopriv_like_post', 'like_post' );

function like_post(){
	extract($_POST);
	/* Data Comes from ajax request */
	$pid = $like_pid;
	$ip = $_SERVER['REMOTE_ADDR'];
	// Like
	$like_count = get_post_meta($pid, 'likes', true);
	$last_ip = get_post_meta($pid, 'last_ip', true);

	if($like_count) {
		$like_count = $like_count + 1;
	}else {
		$like_count = 1;
	}

	if($ip != $last_ip){
		$processed_like = update_post_meta($pid, 'likes', $like_count);
	}
	$processed_ip = update_post_meta($pid, 'last_ip', $ip);
	
	?>	
	 
	<img src="<?php bloginfo('template_url'); ?>/img/icons/like.png">
	<span class="count"><?php 	echo get_post_meta($pid, 'likes', true); ?></span>
	
	<?php
	
	wp_die();
}


add_action( 'wp_ajax_dislike_post', 'dislike_post' );
add_action( 'wp_ajax_nopriv_dislike_post', 'dislike_post' );

function dislike_post(){
	extract($_POST);
	/* Data Comes from ajax request */
	$pid = $dislike_pid;
	$ip = $_SERVER['REMOTE_ADDR'];
	// Dislike
	$dislike_count = get_post_meta($pid, 'dislikes', true);
	$last_ip = get_post_meta($pid, 'last_ip', true);
	
	if($dislike_count) {
		$dislike_count = $dislike_count + 1;
	}else {
		$dislike_count = 1;
	}

	
	if($ip != $last_ip){
		$processed_dislike = update_post_meta($pid, 'dislikes', $dislike_count);
	}
	$processed_ip = update_post_meta($pid, 'last_ip', $ip);
	
	?>
	 
	<img src="<?php bloginfo('template_url'); ?>/img/icons/dislike-black.png">
	<span class="count"><?php 	echo get_post_meta($pid, 'dislikes', true); ?></span>
	
	<?php
	
	wp_die();
}