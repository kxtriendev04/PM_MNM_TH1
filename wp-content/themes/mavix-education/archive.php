<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mavix Education
 */

get_header(); ?>

	<div id="content-wrapper" class="section-gap">
		<div class="wrapper clear">
			<div id="primary" class="content-area">
				<main id="main" class="site-main blog-posts-wrapper" role="main">
					<div class="section-content col-3 clear">

						<?php
						if ( have_posts() ) :
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_format() );

							endwhile;
						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>
					</div>
				<?php the_posts_pagination(); ?>
				</main><!-- #main -->
			</div><!-- #primary -->

			<?php get_sidebar(); ?>

		</div><!-- .section-gap -->
	</div><!-- #content-wrapper -->

<?php
get_footer();
