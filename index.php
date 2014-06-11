<?php get_header(); ?>

        <div class="row">
            <div class="small-12 large-12 columns">


                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                        <div class="showtile" >
                            <h1><?php the_title(); ?></h1>
                            <h4>Posted on <?php the_time('F jS, Y'); ?></h4>
                            <?php $excerpt = get_the_excerpt(); ?>
                            <p><?php echo string_limit_words($excerpt,25) . " ...";?></p>
                        </div>
                    </a>
                    
                <?php endwhile; else: ?>
                        <div class="showtile" >
                            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                        </div>
                <?php endif; ?>
                
                

            </div>
        </div>

<div id="delimiter">
</div>
<?php get_footer(); ?>