<?php
/**
 * The template for displaying all single facts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Screenr
 */

get_header(); ?>

	<div id="content" class="site-content">

	
		<div id="content-inside" class="container full-width">	
		
			<div id="primary" class="content-area">			
			
				<main id="main" class="site-main" role="main">

				
				
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'single-facts' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // End of the loop. ?>

				</main><!-- #main -->
			</div><!-- #primary -->

		</div><!--#content-inside -->
	</div><!-- #content -->

<?php get_footer(); ?>