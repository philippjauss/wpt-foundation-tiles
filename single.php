<?php

/*****
 * Funktion : Einzelner Artikel des Themes wpt-foundation-tiles
 * Dateiname: single.php
 * Author   : Philipp Jauss
 * Version  : 1.0
 * Erstellt : 13. Juni 2014
 */

    get_header();

$options = get_option('wft_theme_options'); 
    
?>


        <div class="row">
            <div class="small-12 large-6 large-offset-3 columns">
                <div id="post" class="single">

                <?php if (have_posts()) : 
                        while (have_posts()) : the_post(); ?>
                    
                    
                    <div <?php post_class();?> id="post-<?php the_ID();?>">
                        <h1>
                            <a href="<?php the_permalink(); ?>" rel="bookmark">
                                <?php the_title();?>
                            </a>
                        </h1>
                        <h2 class="singletimestamp">
                                <?php echo "(" . get_the_time('j. F Y') . " - " . get_the_time() . ")";?>
                        </h2>
                        <div class="postcontent">
                            <?php the_content();?>
                            
                        </div>
                        <div class="authorinfo">
                            <h6>Über den Author</h6>
                            <div class="gravatarpic">
                              <?php   echo get_avatar( get_the_author_meta('user_email'), 96); 
                              ?>
                            </div>
                            <div class="authordetails">
                                <h7> <?php the_author_posts_link();?></h7>
                                <p><?php echo get_the_author_meta('description'); ?></p>
                            </div>

                        </div>
                        <div class="tags">
                            abgelegt unter: 
                                <?php the_category(', ');?><br>
                                <?php if(has_tag()) the_tags('Tags:&nbsp;',', ','<br>'); ?>
            
                        </div>
                        
                        <!-- share post -->                        
                         <?php if ($options['share_google'] == 1 or 
                                   $options['share_facebook'] == 1) { ?>
                        
                        <div class="sharearea">
                            <h6>Teilen</h6>
                            <ul>
                             <?php if ($options['share_facebook'] == 1) { ?>
                                <li class="facebook">
                                    <div class="fb-like" data-send="false" data-layout="button_count" data-width="100" data-show-faces="true">
                                    </div>
                                </li>
                             <?php } ?>   
                             <?php if ($options['share_google'] == 1) { ?>
                                <li class="google">
                                    <div class="g-plusone" data-size="medium">
                                    </div>
                                </li>
                             <?php } ?>
                            </ul>
                        </div>
                        
                        <?php } ?>
                        
                        <div class="postfooter">
                            
                        </div>
                    </div>
                    <div class="navigation">
                        <h3>Navigation in den Beiträgen
                        </h3>
                        <div class="alignleft">
                            <?php previous_post_link(); ?>
                        </div>
                        <div class="alignright">
                            <?php next_post_link('%link &raquo;'); ?>
                        </div>                        
                        <div class="postfooter">
                            &nbsp;
                        </div>
                    </div>
                    
                    <?php comments_template();?>
                   
                
                        
                <?php endwhile; else: ?>
                        <div class="showtile" >
                            <p><?php _e('Sorry, keine Posts gefunden.'); ?></p>
                        </div>
                <?php endif; ?>
                
                </div> 
            </div>
        </div>


<div id="delimiter">
</div>
<?php get_footer(); ?>


