<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Mavix Education
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function mavix_education_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( is_front_page() && is_home() ) {
		$mavix_education_sidebar_layout_blog = mavix_education_get_option('layout_options_blog'); 
		$classes[] = esc_attr( $mavix_education_sidebar_layout_blog );
	}

	if ( !is_front_page() && is_home() ) {
		$mavix_education_sidebar_layout_blog = mavix_education_get_option('layout_options_blog'); 
		$classes[] = esc_attr( $mavix_education_sidebar_layout_blog );
	}

	if( is_archive() || is_search() || is_404() ) {
		$mavix_education_sidebar_layout_archive = mavix_education_get_option('layout_options_archive'); 
		$classes[] = esc_attr( $mavix_education_sidebar_layout_archive );
	}

	if( is_page() ) {
		$mavix_education_sidebar_layout_page = mavix_education_get_option('layout_options_page'); 
		$classes[] = esc_attr( $mavix_education_sidebar_layout_page );
	}

	if( is_single() ) {
		$mavix_education_sidebar_layout_single = mavix_education_get_option('layout_options_single'); 
		$classes[] = esc_attr( $mavix_education_sidebar_layout_single );
	}

	return $classes;
}
add_filter( 'body_class', 'mavix_education_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function mavix_education_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'mavix_education_pingback_header' );

if ( ! function_exists( 'mavix_education_the_excerpt' ) ) :

	/**
	 * Generate excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $length Excerpt length in words.
	 * @param WP_Post $post_obj WP_Post instance (Optional).
	 * @return string Excerpt.
	 */
	function mavix_education_the_excerpt( $length = 0, $post_obj = null ) {

		global $post;

		if ( is_null( $post_obj ) ) {
			$post_obj = $post;
		}

		$length = absint( $length );

		if ( 0 === $length ) {
			return;
		}

		$mavix_education_source_content = $post_obj->post_content;

		if ( ! empty( $post_obj->post_excerpt ) ) {
			$mavix_education_source_content = $post_obj->post_excerpt;
		}

		$mavix_education_source_content = preg_replace( '`\[[^\]]*\]`', '', $mavix_education_source_content );
		$mavix_education_trimmed_content = wp_trim_words( $mavix_education_source_content, $length, '&hellip;' );
		return $mavix_education_trimmed_content;

	}

endif;

//  Customizer Control
if (class_exists('WP_Customize_Control') && ! class_exists( 'mavix_education_Image_Radio_Control' ) ) {
	/**
 	* Customize sidebar layout control.
 	*/
	class mavix_education_Image_Radio_Control extends WP_Customize_Control {

		public function render_content() {

			if (empty($this->choices))
				return;

			$name = '_customize-radio-' . $this->id;
			?>
			<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
			<ul class="controls" id='mavix-education-img-container'>
				<?php
				foreach ($this->choices as $value => $label) :
					$class = ($this->value() == $value) ? 'mavix-education-radio-img-selected mavix-education-radio-img-img' : 'mavix-education-radio-img-img';
					?>
					<li style="display: inline;">
						<label>
							<input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($name); ?>" <?php
							  $this->link();
							  checked($this->value(), $value);
							  ?> />
							<img src='<?php echo esc_url($label); ?>' class='<?php echo esc_attr($class); ?>' />
						</label>
					</li>
					<?php
				endforeach;
				?>
			</ul>
			<?php
		}

	}
}	
