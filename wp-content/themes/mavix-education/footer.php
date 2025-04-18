<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mavix Education
 */

/**
 *
 * @hooked mavix_education_footer_start
 */
do_action( 'mavix_education_action_before_footer' );

/**
 * Hooked - mavix_education_footer_top_section -10
 * Hooked - mavix_education_footer_section -20
 */
do_action( 'mavix_education_action_footer' );

/**
 * Hooked - mavix_education_footer_end. 
 */
do_action( 'mavix_education_action_after_footer' );

wp_footer(); ?>

</body>  
</html>