<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mavix Education
 */
/**
* Hook - mavix_education_action_doctype.
*
* @hooked mavix_education_doctype -  10
*/
do_action( 'mavix_education_action_doctype' );
?>
<head>
<?php
/**
* Hook - mavix_education_action_head.
*
* @hooked mavix_education_head -  10
*/
do_action( 'mavix_education_action_head' );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

<?php

/**
* Hook - mavix_education_action_before.
*
* @hooked mavix_education_page_start - 10
*/
do_action( 'mavix_education_action_before' );

/**
*
* @hooked mavix_education_header_start - 10
*/
do_action( 'mavix_education_action_before_header' );

/**
*
*@hooked mavix_education_site_branding - 10
*@hooked mavix_education_header_end - 15 
*/
do_action('mavix_education_action_header');

/**
*
* @hooked mavix_education_content_start - 10
*/
do_action( 'mavix_education_action_before_content' );

/**
 * Banner start
 * 
 * @hooked mavix_education_banner_header - 10
*/
do_action( 'mavix_education_banner_header' );  
