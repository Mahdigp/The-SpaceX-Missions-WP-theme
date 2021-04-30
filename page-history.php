<?php
/*
 * Template Name: The History Custom Page
 * description: >-
  This Page a custom page to render all history of SpaceX missions.
 */
/**

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_SpaceX_Missions
 */

get_header();
?>

	<main id="primary" class="site-main">

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header><!-- .entry-header -->
        
        
            <div class="entry-content">
                <div class="row">
                <?php
          $resulth= wp_remote_retrieve_body(wp_remote_get('https://api.spacexdata.com/v3/history'));
          $resulth=json_decode($resulth);
          foreach ($resulth as $valuesh) {
              ?>
              <div class="col-5"><div class="history-mission"> 
            <?php 
            $time=$valuesh->event_date_unix;
            echo '<h2>' . $valuesh->title . '</h2>';

            echo '<span class="date">' . date('Y-m-d', $time) . ' </span>';
        
            echo '<span class="time">' . date('H:i:s', $time) . '</span> ';
        
        
            echo '<p>' . $valuesh->details . '</p>';
            echo '<a target="blank" class="more" href=" ' . ($valuesh->links->article) . '">More Info</a> ';

            echo '</div></div>';
          }
               
 
    
                ?> </div> <!-- .row -->
            </div><!-- .entry-content -->
        
            <?php if ( get_edit_post_link() ) : ?>
                <footer class="entry-footer">
                    <?php
                    edit_post_link(
                        sprintf(
                            wp_kses(
                                /* translators: %s: Name of current post. Only visible to screen readers */
                                __( 'Edit <span class="screen-reader-text">%s</span>', 'the-spacex-missions' ),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            wp_kses_post( get_the_title() )
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                    ?>
                </footer><!-- .entry-footer -->
            <?php endif; ?>
        </article><!-- #post-<?php the_ID(); ?> -->



	</main><!-- #main -->

<?php
get_footer();?>