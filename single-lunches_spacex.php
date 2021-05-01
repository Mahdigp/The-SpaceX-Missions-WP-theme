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
$post_id = get_the_ID();
$tdate = get_post_meta($post_id , 'tdate', true);
$nationality = get_post_meta($post_id , 'nationality', true);
$details = get_post_meta($post_id , 'details', true);
$manufacturer = get_post_meta($post_id , 'manufacturer', true);
$payloadtype = get_post_meta($post_id , 'payloadtype', true);
$picture = get_post_meta($post_id , 'picture', true);
$article_link = get_post_meta($post_id , 'article_link', true);
$video_link = get_post_meta($post_id , 'video_link', true);

?>


<div class="col-10">
<div class="lunch">
        <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
        <span class="tdate">Time and date: <?php echo $tdate ?>  </span>
        <span class="nationality">Nationality: <?php echo $nationality ?> </span>
        <span>Manufacturer: <?php echo $manufacturer ?>  </span>
        <span> <a  target="_blank" href=" <?php echo $picture ?> "> See Mission Patch </a> </span>
        <span>Payload type: <?php echo $payloadtype ?>  </span>
        <span> <a  target="_blank" href=" <?php echo $article_link ?>  "> Read Article </a> </span>
        <span> <a  target="_blank" href="<?php echo $video_link ?>> "> Watch Video </a> </span>

        <p> <?php echo $details ?> </p>
    
  

   </div>        </div>     




</div> <!-- .row -->
            </div><!-- .entry-content -->
        
 
        </article><!-- #post-<?php the_ID(); ?> -->



	</main><!-- #main -->

<?php
get_footer();?>