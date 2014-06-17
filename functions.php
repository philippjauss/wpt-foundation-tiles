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

function wft_categorylist_with_count(){
    $categories = wp_list_categories('title_li=&show_count=1&echo=0');
    $categories = preg_replace('/<\/a> \(([0-9]+)\)/', ' (\\1)</a>', $categories);
    echo $categories;
}





