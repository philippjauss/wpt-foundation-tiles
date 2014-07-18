<?php
/*
 * Funktion: Kommentare für das Thema Wordpress Theme Foundation Tiles
 * Dateiname: comments.php
 * Author: Philipp Jauss
 * Version: 0.1
 * Erstellt: 07. Juli 2014
 */
?>

<!-- Anfang Kommentare -->
<div class="comments singlepadding">
    <?php if (post_password_required()): //sind Kommentare geschützt ?>
        <p>Bitte Passwort eingeben um die Kommentare anzuzeigen </p>
    <?php
        return;
        endif;
    ?>
    <?php if (comments_open()): //Kommentare sind erlaubt ?>
        
        
        
            <?php if (have_comments()): // Falls bereits Kommentare vorhanden ?>
                
                <ul class="commentlist">
                    <?php wp_list_comments( array( 
                        'callback' => 'wft_comment',
                        'style' => 'ul' ) ); ?>


                    <?php if( count($comments) >= get_option('comments_per_page') )://Nur wenn > 50 Kommentare ?>
                        <div class="navigation">
                            <div class="alignleft"><?php previous_comments_link() ?></div>
                            <div class="alignright"><?php next_comments_link() ?></div>
                        </div>
                    <?php endif; //ende count()?>
                </ul>
            <?php else: // have_comments() ?>
                <p>Noch kein Kommentar. Sei der Erste, der etwas schreibt.</p>
            <?php endif; // have_comments() ?>
            
</div>
            
            <div id ="commentbox" class="singlepadding">
            <h3 id="postcomment">Hinterlasse einen Kommentar</h3>
            <?php if ( get_option('comment_registration') &&
                    !is_user_logged_in() ): //Registrierung verlangt und nicht angemeldet ?>
                <p>
                    <?php printf('Du musst <a href"%s"> angemeldet sein </a>, '.
                            ' um einen Kommentar zu schreiben.',
                            wp_login_url(get_permalink()));?>
                </p>

            <?php else: // Registrierung verlangt und nicht angemeldet ?>
            
                <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php"
                      method="post" id="commentform">
                    <?php if (is_user_logged_in()): // Benutzer ist angemdeldet ?>
                        <p>
                            <?php printf('Du bist als %s angemeldet',
                                    '<a href="'.get_option('siteurl').
                                    '/wp-admin/profile.php">'.$user_identity.
                                    ' ('.$user_login.')</a>'); ?>
                                    <br />
                                    Bei diesem Konto
                                    <a href="<?php echo wp_logout_url(get_permalink()); ?>"
                                       title="Bei diesem Konto abmelden">abmelden &raquo;</a>
                        </p>
                    <?php else: // is_user_logged_in() ?>
                        <p>
                            <label for="author">
                                Name 
                                    <?php if ($req): echo '(obligatorisch)'; endif; ?>
                            </label>
                            <input type="text" name="author" id="author"
                                   value="<?php esc_attr_e(comment_author()); ?>"
                                   size="22" tabindex="1" />
                        </p>
                        <p>
                            <label for="email">
                                eMail (wird nicht veröffentlicht 
                                    <?php if ($req): echo ', obligatorisch'; endif; ?>
                            </label>
                            <input type="text" name="email" id="email"
                                   value="<?php esc_attr_e(comment_author_email()); ?> "            
                                   size="22" tabindex="2" />
                        </p>
                        <p>
                            <label for="url">
                                Webseite
                            </label>
                            <input type="text" name="url" id="url"
                                   value="<?php esc_attr_e(comment_author_url()); ?>"
                                   size="22" tabindex="3" />
                        </p>
                    <?php endif; // is_user_logged_in() ?>
                    <p>
                        <label for="comment" id="labelComment">
                            Kommentar
                        </label>
                        <textarea name="comment" id="comment"
                            cols="100%" rows="10" tabindex="4">
                        </textarea>
                    </p>
                    <p>
                        <input class="button expand" name="submit" type="submit"
                               id="submit" tabindex="5" value="Kommentar Senden" />
                        <input type="hidden" name="comment_post_ID"
                               value="<?php echo $id; ?>" />
                    </p>
                    <?php do_action('comment_form', $post->ID); ?>
                </form>
            
            <?php endif; // Registrierung verlang und angemeldet ?>
           </div>      
        
        
        <?php else: // comments_open () ?>
            <h3 id="postcomment">Kommentare</h3>
            <p class="noComments">
                Momentan sind die Kommentare für diesen Artikel deaktiviert.
            </p>
        <?php endif; // comments_open() ?>
        <div class="commentsFoter">&nbsp;</div>
