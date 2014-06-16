<?php

/*****
 * Funktion : Einzelner Artikel des Themes wpt-foundation-tiles
 * Dateiname: single.php
 * Author   : Philipp Jauss
 * Version  : 1.0
 * Erstellt : 13. Juni 2014
 */

    get_header();
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
                        <div class="postcontent">
                            <?php the_content();?>
                            
                        </div>
                        <div class="tags">
                            abgelegt unter: 
                                <?php the_category(', ');?><br>
                                <?php if(has_tag()) the_tags('Tags:&nbsp;',', ','<br>'); ?>
                            geschrieben von 
                                <?php the_author_posts_link();?> <br>
                            am 
                                <?php the_time('j. F Y'); ?>
                            um
                                <?php the_time();?>
                            
                                
                            
                        </div>
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


