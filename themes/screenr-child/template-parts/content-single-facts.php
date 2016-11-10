<?php
/**
 * Template part for displaying facts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Screenr
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php if ( 'post' === get_post_type() && $meta = screenr_posted_on( false ) ) : ?>
		<div class="entry-meta">
			<?php echo $meta; ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>

		<?php
        if ( ! get_theme_mod( 'disable_featured_image', 0 ) ) {
            if (has_post_thumbnail()) {
                echo '<div class="entry-thumb">';
                the_post_thumbnail('screenr-blog-list');
                echo '</div>';
            }
        }
		?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		
		<!-- Initializing custom field variables -->
		<?php
			$image = get_field('image');
			$image_width = get_field('image_width');
			$image_height = get_field('image_height');
			$aria_described_by = get_field('aria_described_by');
			$name_of_link = get_field('name_of_link');
			$link_of_source = get_field('link_of_source');
		?>

		<!-- Story meta content -->
		<div id="story-meta">
			
			<img
				src="<?php echo $image[url]; ?>"
				alt="<?php echo $image[alt]; ?>"
				width="<?php echo $image_width; ?>"
				height="<?php echo $image_height; ?>"
				aria-describedby="<?php echo $aria_described_by; ?>"
			>
			
			
			<br>
			
			<b>Source: </b>
			
			<a href="<?php echo esc_url($link_of_source);?>">
				<?php echo $name_of_link;?>
			</a>
			

			
		
		</div><!-- #story-meta -->
		
		<hr>
		
		<!-- Summary: bringing in WP's default content editor -->
		<div id="editor-content">
		<h2>Summary</h2>
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( esc_html__( 'Continue reading %s', 'screenr' ), '<span class="meta-nav">&rarr;</span>' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'screenr' ),
					'after'  => '</div>',
				) );			
			?>
		</div><!-- #editor-content -->
		
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php screenr_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
