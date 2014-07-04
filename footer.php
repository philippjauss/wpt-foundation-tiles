        </section>
      <a class="exit-off-canvas"></a>

      </div>
    </div>
    <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/foundation.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/masonry/jquery.masonry.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>    
    <script>
        $(document).foundation();
        
        $(window).on('resize orientationChanged', function() {
            triggerMasonry();               
         }); 
         
        // trigger masonry on document ready
        $(function(){
          $container = $('#container');
          triggerMasonry();
        });         
        
        
        
        var $container;

        function triggerMasonry() {

          // don't proceed if $container has not been selected
          if ( !$container ) {
            return;
          }
          // init Masonry
          $container.masonry({
            itemSelector: '.postintro'
          });
        }

        // trigger masonry when fonts have loaded
        WebFont.load({
            google: {
                families: ['Source Sans Pro']
            },
            
          active: triggerMasonry,
          inactive: triggerMasonry
        });

        // Expand side menu to page-height, even if the content is less
        $('a.left-off-canvas-toggle').click(function() {
            $('.inner-wrap').css('min-height', $(window).height() + 'px');
        });



    </script>

   
    <?php
       /* Always have wp_footer() just before the closing </body>
        * tag of your theme, or you will break many plugins, which
        * generally use this hook to reference JavaScript files.
        */
        wp_footer();
    ?>    
</body>
</html>
