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




/*
 * Theme customizer (head color)
 */
function wft_register_theme_customizer ( $wp_customize){
    $wp_customize->add_setting(
        'wft_header_color',
        array(
            'default'     => '#53A93F'
        )
    );
    $wp_customize->add_setting(
        'wft_sidebar_color',
        array(
            'default'     => '#036602'
        )
    );
    $wp_customize->add_setting(
        'wft_bottomnav_color',
        array(
            'default'     => '#53A93F'
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
    </style>
    <?php
}
add_action( 'wp_head', 'wft_customizer_css' );







