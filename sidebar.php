
<li><label><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">Home</a></label></li>
<hr>    
<li><label><?php _e('Categories'); ?></label></li>
    <?php wft_categorylist_with_count(); ?>
<hr>    
<li><label><?php _e('Archives'); ?></label></li>
    <?php wp_get_archives('type=monthly'); ?>
<hr>

<ul>
  <?php wp_list_pages('sort_column=menu_order&title_li='); ?>
</ul>
