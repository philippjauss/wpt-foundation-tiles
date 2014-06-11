        </section>
      <a class="exit-off-canvas"></a>

      </div>
    </div>
    <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/foundation.min.js"></script>
    <script>
        $(document).foundation();
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
