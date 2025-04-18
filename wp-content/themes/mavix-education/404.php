<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Mavix Education
 */

get_header(); ?>
	<div id="content-wrapper" class="wrapper">
		<div class="section-gap clear">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

					<section class="error-404 not-found">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'mavix-education' ); ?></h1>
						</header><!-- .page-header -->

						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'mavix-education' ); ?></p>

							<?php get_search_form(); ?>
						</div><!-- .page-content -->
					</section><!-- .error-404 -->

				</main><!-- #main -->
			</div><!-- #primary -->
			
			<?php get_sidebar(); ?>

		</div><!-- .section-gap -->
	</div><!-- #content-wrapper -->

<?php
get_footer();
