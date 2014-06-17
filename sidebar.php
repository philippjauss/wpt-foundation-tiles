
<li><label><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">Home</a></label></li>
    
<li><label><?php _e('Categories'); ?></label></li>
    <?php wft_categorylist_with_count(); ?>
    
<li><label><?php _e('Archives'); ?></label></li>
    <?php wp_get_archives('type=monthly'); ?>


