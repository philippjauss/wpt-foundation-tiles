<div id="sidebar">
    <h2><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">Home</a></h2>
    
    <h2 ><?php _e('Categories'); ?></h2>
    <?php wft_categorylist_with_count(); ?>
    
    <h2 ><?php _e('Archives'); ?></h2>
    <?php wp_get_archives('type=monthly'); ?>

</div>
