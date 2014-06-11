<div id="sidebar">
    
<h2 ><?php _e('Categories'); ?></h2>
<?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
<h2 ><?php _e('Archives'); ?></h2>
<?php wp_get_archives('type=monthly'); ?>

</div>
