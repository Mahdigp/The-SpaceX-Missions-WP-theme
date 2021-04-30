<?php
/*
 * Template Name: The Lunches Custom Page
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







$result= wp_remote_retrieve_body(wp_remote_get('https://api.spacexdata.com/v3/launches'));
$result=json_decode($result);
echo '<pre>';
//print_r($result[0]->title);
foreach ($result as $values) {
	$time=$values->launch_date_unix;

	$missionName=$values->mission_name;
    $nationality=$values->rocket->second_stage->payloads->nationality;
    
	echo $values->mission_name . ',';
	echo $nationality . '</br>';


/*
	$new_post = array(
		'ID' => '',
		'post_type' => 'lunches_spacex', // Custom Post Type Slug
		'post_status' => 'publish',
		'post_title' => $missionName,
   
    );

      $post_id = wp_insert_post($new_post);


update_field('nationality', 'Tom',$post_id);

*/

}
echo '</pre>';

?></div> <!-- .row -->
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