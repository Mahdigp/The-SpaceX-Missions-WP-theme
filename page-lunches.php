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
    query_posts(array( 
        'post_type' => 'lunches_spacex',
        'showposts' => -1 
    ) );  
?>

<?php while (have_posts()) : the_post(); ?>
<div class="col-3">
<div class="lunch">
        <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
        <span class="tdate"><?php  the_field('tdate'); ?> </span>
        <span class="nationality"><?php  the_field('nationality'); ?> </span>
        <p> <?php  the_field('details'); ?></p>
  

    <a class="more" href="<?php the_permalink() ?>">Read more</a> </div>        </div>     
<?php endwhile;?>



</div> <!-- .row -->
            </div><!-- .entry-content -->
        
 
        </article><!-- #post-<?php the_ID(); ?> -->



	</main><!-- #main -->

<?php
get_footer();?>