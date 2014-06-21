<?php get_header(); ?>

        <div class="row">
            <div class="small-12 large-12 columns">
                <div id="container">


                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                        <div class="postintro">
                            <div class="postexcerpt">
                             
                            <?php 
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail(); 
                                }
                                else {
                                    wft_article_dummyimage();
                                }
                            ?>
                            <h1><?php the_title(); ?></h1>
                            <h4><?php the_time('F jS, Y'); ?></h4>
                            <?php $excerpt = get_the_excerpt(); ?>
                            <p><?php echo string_limit_words($excerpt,25) . " ...";?></p>
                            </div>
                        </div>
                    </a>
                    
                <?php endwhile; else: ?>
                    <div class="postintro">
                        <p><?php _e('Sorry, keine Posts gefunden.'); ?></p>
                    </div>
                <?php endif; ?>

                </div>
            </div>
        </div>
    <div class="row">
        <div class="small-12 large-12 columns">
            <div class="navigation">
                <div class="small-4 columns bottomnavigation bottomleft"><?php next_posts_link(' &laquo;  ','') ?></div>
                <div class="small-4 columns bottomnavigation bottomcenter"><a href="#"><i class="foundicon-arrow-up"></i></a></div>
                <div class="small-4 columns bottomnavigation bottomright"><?php previous_posts_link(' &raquo;') ?></div>
                
            </div>                    
        </div>
    </div>


<?php get_footer(); ?>