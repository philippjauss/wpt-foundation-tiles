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
         
        // trigger masonry on document load, after all images have been loaded
        $(window).load(function(){
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
                families: ['Arimo']
            },
            
          active: triggerMasonry,
          inactive: triggerMasonry
        });

        // Expand side menu to page-height, even if the content is less
        $('a.left-off-canvas-toggle').click(function() {
            $('.inner-wrap').css('min-height', $(window).height() + 'px');
        });



    </script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-13077377-3', 'auto');
      ga('send', 'pageview');

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
