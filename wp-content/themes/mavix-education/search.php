<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
						if ( have_posts() ) : ?>


							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );

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
