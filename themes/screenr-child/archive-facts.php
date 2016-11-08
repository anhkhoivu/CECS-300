<?php
/**
 * The template for displaying 'facts' archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Screenr
 */

get_header(facts); ?>

	<div id="content" class="site-content">
		<div id="content-inside" class="container <?php echo esc_attr( get_theme_mod( 'layout_settings', 'right' ) ); ?>-sidebar">
		
		
		
		<div id="fact-description">
			<?php
				global $wp_post_types;
				$post_type = 'facts';
				$description = $wp_post_types[$post_type]->description;
			?>
			
			<p> <?php echo $description; ?> </p>
		</div><!-- #fact-description -->
		
		
		
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content' );
						?>

					<?php endwhile; ?>

					<?php the_posts_navigation(); ?>

				<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; ?>

				</main><!-- #main -->
			</div><!-- #primary -->

			<?php get_sidebar(); ?>

		</div><!--#content-inside -->
	</div><!-- #content -->

<?php get_footer(); ?>
