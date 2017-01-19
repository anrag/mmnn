<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package cshero
 */

if ( ! function_exists( 'cshero_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function cshero_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $GLOBALS['wp_query']->max_num_pages,
			'current'  => $paged,
			'mid_size' => 1,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => __( '&larr; Previous', 'organicfood' ),
			'next_text' => __( 'Next &rarr;', 'organicfood' ),
	) );

	if ( $links ) :

	?>
	<nav class="pagination" role="navigation">
            <?php echo $links; ?>
	</nav><!-- .navigation -->
	<?php
	endif;
}
endif;

if ( ! function_exists( 'cshero_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function cshero_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation clearfix" role="navigation">
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', __( '<span class="btn btn-default"><i class="fa fa-chevron-circle-left"></i>PREVIOUS POST</span>', 'organicfood' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     __( '<span class="btn btn-default">NEXT POST<i class="fa fa-chevron-circle-right"></i></span>', 'organicfood' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;
/*
 * Page title
 */
if (!function_exists('cshero_page_title')) {
    function cshero_page_title() { 
            ob_start();
            if(is_search()){
                echo __('Search Keyword: ', 'organicfood'). '<span class="keywork">'. get_search_query( false ). '</span>';
            }elseif (!is_archive()) {
                the_title();
            } else { 
                if (is_category()){
                    single_cat_title();
                }elseif(get_post_type() == 'recipe' || get_post_type() == 'portfolio' || get_post_type() == 'produce' || get_post_type() == 'team' || get_post_type() == 'testimonial' || get_post_type() == 'myclients' || get_post_type() == 'product'){
                    single_term_title();
                }elseif (is_tag()){
                    single_tag_title();
                }elseif (is_author()){
                    printf(__('Author: %s', 'organicfood'), '<span class="vcard">' . get_the_author() . '</span>');
                }elseif (is_day()){
                    printf(__('Day: %s', 'organicfood'), '<span>' . get_the_date() . '</span>');
                }elseif (is_month()){
                    printf(__('Month: %s', 'organicfood'), '<span>' . get_the_date('F Y') . '</span>');
                }elseif (is_year()){
                    printf(__('Year: %s', 'organicfood'), '<span>' . get_the_date('Y') . '</span>');
                }elseif (is_tax('post_format', 'post-format-aside')){
                    _e('Asides', 'organicfood');
                }elseif (is_tax('post_format', 'post-format-gallery')){
                    _e('Galleries', 'organicfood');
                }elseif (is_tax('post_format', 'post-format-image')){
                    _e('Images', 'organicfood');
                }elseif (is_tax('post_format', 'post-format-video')){
                    _e('Videos', 'organicfood');
                }elseif (is_tax('post_format', 'post-format-quote')){
                    _e('Quotes', 'organicfood');
                }elseif (is_tax('post_format', 'post-format-link')){
                    _e('Links', 'organicfood');
                }elseif (is_tax('post_format', 'post-format-status')){
                    _e('Statuses', 'organicfood');
                }elseif (is_tax('post_format', 'post-format-audio')){
                    _e('Audios', 'organicfood');
                }elseif (is_tax('post_format', 'post-format-chat')){
                    _e('Chats', 'organicfood');
                }else{
                    _e('Archives', 'organicfood');
                }
            }
                
            return ob_get_clean();
    }
}
/*
 * Page breadcrumb
 */
if (!function_exists('cshero_page_breadcrumb')) {
    function cshero_page_breadcrumb($delimiter) {
            ob_start();
    
            $home = __('Home', 'organicfood');
            $before = '<span class="current">'; // tag before the current crumb
            $after = '</span>'; // tag after the current crumb

            global $post;
            $homeLink = home_url();

            echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

            if ( is_category() ) {
                $thisCat = get_category(get_query_var('cat'), false);
                if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
                echo $before . __('Archive by category: ', 'organicfood') . single_cat_title('', false) . $after;

            } elseif ( is_search() ) {
                echo $before . __('Search results for: ', 'organicfood') . get_search_query() . $after;

            } elseif ( is_day() ) {
                echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F').' '. get_the_time('Y') . '</a> ' . $delimiter . ' ';
                echo $before . get_the_time('d') . $after;

            } elseif ( is_month() ) {
                echo $before . get_the_time('F'). ' '. get_the_time('Y') . $after;

            } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                if(get_post_type() == 'portfolio'){
                    $terms = get_the_terms(get_the_ID(), 'portfolio_category', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'portfolio_category', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                    }else{
                        echo $before . get_the_title() . $after;
                    }
                }elseif(get_post_type() == 'recipe'){
                    $terms = get_the_terms(get_the_ID(), 'recipe_category', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'recipe_category', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                    }else{
                        echo $before . get_the_title() . $after;
                    }
                }elseif(get_post_type() == 'produce'){
                    $terms = get_the_terms(get_the_ID(), 'produce_category', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'produce_category', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                    }else{
                        echo $before . get_the_title() . $after;
                    }
                }elseif(get_post_type() == 'team'){
                    $terms = get_the_terms(get_the_ID(), 'team_category', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'team_category', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                    }else{
                        echo $before . get_the_title() . $after;
                    }
                }elseif(get_post_type() == 'testimonial'){
                    $terms = get_the_terms(get_the_ID(), 'testimonial_category', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'testimonial_category', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                    }else{
                        echo $before . get_the_title() . $after;
                    }
                }elseif(get_post_type() == 'myclients'){
                    $terms = get_the_terms(get_the_ID(), 'clientscategory', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'clientscategory', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                    }else{
                        echo $before . get_the_title() . $after;
                    }
                }elseif(get_post_type() == 'product'){
                    $terms = get_the_terms(get_the_ID(), 'product_cat', '' , '' );
                    if($terms) {
                        the_terms(get_the_ID(), 'product_cat', '' , ', ' );
                        echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                    }else{
                        echo $before . get_the_title() . $after;
                    }
                }else{
                    $post_type = get_post_type_object(get_post_type());
                    $slug = $post_type->rewrite;
                    echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                    echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                }

            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                echo $cats;
                echo $before . get_the_title() . $after;
            }

            } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
                $post_type = get_post_type_object(get_post_type());
                echo $before . $post_type->labels->singular_name . $after;

            } elseif ( is_attachment() ) {
                $parent = get_post($post->post_parent);
                $cat = get_the_category($parent->ID); $cat = $cat[0];
                echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

            } elseif ( is_page() && !$post->post_parent ) {
                echo $before . get_the_title() . $after;

            } elseif ( is_page() && $post->post_parent ) {
                $parent_id  = $post->post_parent;
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo $breadcrumbs[$i];
                    if ($i != count($breadcrumbs) - 1)
                        echo ' ' . $delimiter . ' ';
                }
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

            } elseif ( is_tag() ) {
                echo $before . __('Posts tagged: ', 'organicfood') . single_tag_title('', false) . $after;

            } elseif ( is_author() ) {
                global $author;
                $userdata = get_userdata($author);
                echo $before . __('Articles posted by ', 'organicfood') . $userdata->display_name . $after;

            } elseif ( is_404() ) {
                echo $before . __('Error 404', 'organicfood') . $after;
            }

            if ( get_query_var('paged') ) {
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
                    echo ' '.$delimiter.' '.__('Page', 'organicfood') . ' ' . get_query_var('paged');
                if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
            }
                
            return ob_get_clean();
    }
}
