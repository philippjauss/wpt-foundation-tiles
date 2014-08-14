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
                        <div class="postcontentheader singlepadding">
                            <h1>
                                <a href="<?php the_permalink(); ?>" rel="bookmark">
                                    <?php the_title();?>
                                </a>
                            </h1>
                            <h2 class="singletimestamp">
                                    <?php echo "(" . get_the_time('j. F Y') . " - " . get_the_time() . ")";?>
                            </h2>
                        </div>    
                        <div class="postcontent singlepadding">
                            <?php the_content();?>
                            
                        </div>
                        
                         <!-- share post -->                        
                         <?php if ($options['share_google'] == 1 or 
                                   $options['share_twitter'] == 1 or
                                   $options['share_facebook'] == 1) { ?>
                        
                        <div class="sharearea">
                            <div class="row">
                                


                             <?php if ($options['share_google'] == 1) { ?>
                                <div class="small-4 large-4 columns text-center">
                                    <!-- Fügen Sie dieses Tag an der Stelle ein, an der die Teilen-Schaltfläche erscheinen soll. -->
                                    <div class="g-plus" data-action="share" data-annotation="vertical-bubble" data-height="60"></div>

                                    <!-- Fügen Sie dieses Tag nach dem letzten Teilen-Tag ein. -->
                                    <script type="text/javascript">
                                          window.___gcfg = {lang: 'de'};

                                          (function() {
                                            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                                            po.src = 'https://apis.google.com/js/platform.js';
                                            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                                          })();
                                        </script>
                                    </div>
                             <?php } ?>

                             <?php if ($options['share_twitter']==1) { ?>
                                <div class="small-4 large-4 columns text-center">
                                    <a href="https://twitter.com/share" class="twitter-share-button" data-lang="de" data-count="vertical">Twittern</a>
                                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
                                            if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';
                                                fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
                                    </script>
                                </div>
                             <?php } ?>
                                
                             <?php if ($options['share_facebook'] == 1) { ?>
                                <div class="small-4 large-4 columns text-center">
                                    <div class="fb-like" data-layout="box_count" data-action="like" data-show-faces="false" data-share="false"></div>
                                </div>
                             <?php } ?>                                
                            
                        </div>
                        
                        <?php } ?>                       
                     </div>   
                        <div class="authorinfo singlepadding">
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
                        <div class="tags singlepadding">
                            <h6>Abgelegt unter: </h6>
                                <?php the_category(', ');?><br><br>
                                <?php if(has_tag()) the_tags('<h6>Tags:</h6>',', ','<br>'); ?>
            
                        </div>
                        

                        
                        <div class="postfooter">
                            
                        </div>
                    
                    <div class="singlenavigation singlepadding">
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


