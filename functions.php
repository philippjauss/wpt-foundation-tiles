<?php


add_theme_support( 'post-thumbnails' ); 

/* 
 * Returns the limited amount of word according to the limit passed
 * 
 * @version 1.0
 * 
 * @param   string  $string         Article complete text
 * @param   int     $word_limit     Number of words to return
 * 
 * @return  string  The excerpt of the article limited to the number of words passed
 */
function string_limit_words($string, $word_limit){
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}

/*
 * Echos the default article dummy image as HTML
 * 
 * @version 1.0 
 * 
 * 
 */
function wft_article_dummyimage(){
    $dummyImage='<img src="'.get_template_directory_uri().
            '/img/dummyArticleImg.png"'.
            ' class="attachment-post-thumbnail wp-post-image" alt="wordpress-logo-stacked-rgb" />';
    
    echo $dummyImage;
}


/*
 * Original wp_list_categories enhanced with replacement of the brackets around the numbers
 */
function wft_categorylist_with_count(){
    $categories = wp_list_categories('title_li=&show_count=1&echo=0');
    $categories = preg_replace('/<\/a> \(([0-9]+)\)/', ' (\\1)</a>', $categories);
    echo $categories;
}


/*
 *  Arrows to the nex-/previous links in the bottom navigation
 */
add_filter('next_posts_link_attributes', 'posts_link_attributes_n');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_p');
 
function posts_link_attributes_n() {
    return 'class="fi-arrow-left"';
}

function posts_link_attributes_p() {
    return 'class="fi-arrow-right"';
}

/*
 *  Arrows to the nex-/previous links in the bottom navigation
 */
function post_link_attributes_n() {
    return 'class="fi-arrow-left"';
}

function post_link_attributes_p() {
    return 'class="fi-arrow-right"';
}

add_filter('next_post_link_attributes', 'post_link_attributes_n');
add_filter('previous_post_link_attributes', 'post_link_attributes_p');



if ( ! function_exists( 'wft_comment' ) ) :
/**
 * Template for comments.
 *
 * Used by wp_list_comments callback to display comments. 
 * Copied from twenty-twelve comments template and modified.
 *
 */
function wft_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php echo 'pingback '; ?> <?php comment_author_link(); ?> <?php edit_comment_link('Edit', '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?>  id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . 'Post author' . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( '%1$s um %2$s' , get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php echo 'Dein Kommentar wartet auf Genehmigung.'; ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( 'Bearbeiten', '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->


		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

/* 
 * Theme menu editor
 */

function wft_register_additional_side_menu_entries (){
    register_nav_menu('side-menu',__('Side entries'));
}
add_action('init','wft_register_additional_side_menu_entries');

/*
 * Theme customizer
 */
function wft_register_theme_customizer ( $wp_customize){
    $wp_customize->add_setting(
        'wft_header_color',
        array(
            'default'     => '#259b24'
        )
    );
    $wp_customize->add_setting(
        'wft_sidebar_color',
        array(
            'default'     => '#0a7e07'
        )
    );
    $wp_customize->add_setting(
        'wft_bottomnav_color',
        array(
            'default'     => '#259b24'
        )
    );    
    
    $wp_customize->add_setting(
        'wft_postcontentheader_color',
        array(
            'default'     => '#d0f8ce'
        )
    );
    
    $wp_customize->add_setting(
        'wft_authorinfo_color',
        array(
            'default'     => '#a3e9a4'
        )
    );
    
    $wp_customize->add_setting(
        'wft_tags_color',
        array(
            'default'     => '#72d572'
        )
    );
    
    $wp_customize->add_setting(
        'wft_comments_color',
        array(
            'default'     => '#d0f8ce'
        )
    );    
    
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_color',
            array(
                'label'      => __( 'Header Color', 'wft' ),
                'section'    => 'colors',
                'settings'   => 'wft_header_color'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sidebar_color',
            array(
                'label'      => __( 'Sidebar Color', 'wft' ),
                'section'    => 'colors',
                'settings'   => 'wft_sidebar_color'
            )
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'bottomnav_color',
            array(
                'label'      => __( 'Bottom navigation Color', 'wft' ),
                'section'    => 'colors',
                'settings'   => 'wft_bottomnav_color'
            )
        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'postcontentheader_color',
            array(
                'label'      => __( 'Postcontent header color', 'wft' ),
                'section'    => 'colors',
                'settings'   => 'wft_postcontentheader_color'
            )
        )
    );    
    
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'authorinfo_color',
            array(
                'label'      => __( 'Author info color', 'wft' ),
                'section'    => 'colors',
                'settings'   => 'wft_authorinfo_color'
            )
        )
    );    

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tags_color',
            array(
                'label'      => __( 'Tags color', 'wft' ),
                'section'    => 'colors',
                'settings'   => 'wft_tags_color'
            )
        )
    );    
  
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'comments_color',
            array(
                'label'      => __( 'Comments color', 'wft' ),
                'section'    => 'colors',
                'settings'   => 'wft_comments_color'
            )
        )
    );    
        
    
    $wp_customize->add_section( 'wft_share', array(
            'title' => __('Teilen via Social Networks','wft'),
            'description' => __('Verfügbare Social Networks','wft'),
            'priority' => '4'
    ) );

    // add the settings and the controls

            $wp_customize->add_setting( 'wft_theme_options[share_google]', array(
                    'default' => 0,
                    'type' => 'option',
            ) );

            $wp_customize->add_control( 'wft_theme_options[share_google]', array(
                    'label' => __('Google+1-button','wft'),
                    'type' => 'checkbox',
                    'priority' => '2',
                    'section' => 'wft_share',
            ) );
            
           
            
            
            $wp_customize->add_setting( 'wft_theme_options[share_facebook]', array(
                    'default' => 0,
                    'type' => 'option',
            ) );

            $wp_customize->add_control( 'wft_theme_options[share_facebook]', array(
                    'label' => __('Facebook like-button','wft'),
                    'type' => 'checkbox',
                    'priority' => '3',
                    'section' => 'wft_share',
            ) );
            
            $wp_customize->add_setting( 'wft_theme_options[share_twitter]', array(
                    'default' => 0,
                    'type' => 'option',
            ) );

            $wp_customize->add_control( 'wft_theme_options[share_twitter]', array(
                    'label' => __('Twitter tweet-button','wft'),
                    'type' => 'checkbox',
                    'priority' => '4',
                    'section' => 'wft_share',
            ) );             
    
}
add_action ('customize_register','wft_register_theme_customizer');

function wft_customizer_css() {
    ?>
    <style type="text/css">
        .tab-bar { background: <?php echo get_theme_mod( 'wft_header_color' ); ?>; }
        .left-off-canvas-menu {background: <?php echo get_theme_mod( 'wft_sidebar_color' ); ?>; }
        ul.off-canvas-list li label {background: <?php echo get_theme_mod( 'wft_sidebar_color' ); ?>; }
        .bottomnavigation { background: <?php echo get_theme_mod( 'wft_bottomnav_color' ); ?>; }
        .bottomnavigationcontainer { background: <?php echo get_theme_mod( 'wft_bottomnav_color' ); ?>; }
        .postcontentheader { background-color: <?php echo get_theme_mod( 'wft_postcontentheader_color' ); ?>; }
        .authorinfo { background-color: <?php echo get_theme_mod( 'wft_authorinfo_color' ); ?>; }
        .tags { background-color: <?php echo get_theme_mod( 'wft_tags_color' ); ?>; }
        .comments { background-color: <?php echo get_theme_mod( 'wft_comments_color' ); ?>; }
    </style>
    <?php
}
add_action( 'wp_head', 'wft_customizer_css' );









