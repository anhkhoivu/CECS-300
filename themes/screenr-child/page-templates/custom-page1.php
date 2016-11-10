<?php
/*
Template Name: A Custom Page Template (1)
*/

get_header(); ?>

<?php
function wpdocs_custom_excerpt_length( $length ) {
    return 13;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
?>

<?php
    $new_loop = new WP_Query( array(
    'post_type' => 'stories',
        'posts_per_page' => 3 // put number of posts that you'd like to display
    ) );
?>
<?php if ( $new_loop->have_posts() ) : ?>
    <?php while ( $new_loop->have_posts() ) : $new_loop->the_post(); ?>
          <h2><?php the_title(); ?></h2>
          <?php //the_content(); ?>
		  <p>the excerpt</p>
		  <?php the_excerpt(); ?>
		  
		  
		  
		  
    <?php endwhile;?>
<?php else: ?>
<?php endif; ?>
<?php wp_reset_query(); ?>


	<div id="content" class="site-content">

		<div id="content-inside" class="container <?php echo esc_attr( get_theme_mod( 'layout_settings', 'right' ) ); ?>-sidebar">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'single' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // End of the loop. ?>

				</main><!-- #main -->
			</div><!-- #primary -->

			<?php get_sidebar(); ?>

		</div><!--#content-inside -->
	</div><!-- #content -->

<?php get_footer(); ?>
