<?php
/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package Mavix Education
 */

if( ! function_exists( 'mavix_education_site_branding' ) ) :
/**
* Site Branding
*
* @since 1.0.0
*/
function mavix_education_site_branding() { ?>
        <div class="header-top">
            <div class="wrapper">
                <div class="site-branding">
                    <div class="site-logo">
                        <?php if(has_custom_logo()):?>
                            <?php the_custom_logo();?>
                        <?php endif;?>
                    </div><!-- .site-logo -->

                    <div id="site-identity">
                        <h1 class="site-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">  <?php bloginfo( 'name' ); ?></a>
                        </h1>

                        <?php 
                            $mavix_education_description = get_bloginfo( 'description', 'display' );
                            if ( $mavix_education_description || is_customize_preview() ) : ?>
                            <p class="site-description"><?php echo esc_html($mavix_education_description);?></p>
                        <?php endif; ?>
                    </div><!-- #site-identity -->
                </div> <!-- .site-branding -->

                <?php $mavix_education_show_contact_details  = mavix_education_get_option( 'mavix_education_show_contact_details' );

                if( true == mavix_education_get_option('mavix_education_show_contact_details') ) { ?>
                    <div class="site-contact-details clear">
                        <?php
                        $mavix_education_address_one   = mavix_education_get_option( 'mavix_education_address_one' );
                        $mavix_education_address_two   = mavix_education_get_option( 'mavix_education_address_two' );
                        $mavix_education_phone_number  = mavix_education_get_option( 'mavix_education_phone_number' ); 
                        $mavix_education_opening_time  = mavix_education_get_option( 'mavix_education_opening_time' ); 
                        $mavix_education_email_id      = mavix_education_get_option( 'mavix_education_email_id' ); 
                        $mavix_education_support_text  = mavix_education_get_option( 'mavix_education_support_text' ); 

                        ?>

                        <button type="button" class="top-header-menu-toggle">
                            <i class="fa-solid fa-bars-staggered open-icon"></i>
                            <i class="fa-solid fa-xmark close-icon"></i>
                        </button>

                        <ul>
                            <?php if( !empty( $mavix_education_address_one || $mavix_education_address_two ) ):?>
                                <li>
                                    <i class="fa-regular fa-map"></i>
                                    <div class="list-details">
                                        <h2><?php echo esc_html( $mavix_education_address_one ); ?></h2>
                                        <span><?php echo esc_html( $mavix_education_address_two ); ?></span>
                                    </div><!-- .list-details -->
                                </li>
                            <?php endif;?>

                            <?php if( !empty( $mavix_education_phone_number || $mavix_education_opening_time ) ):?>
                                <li>
                                    <i class="fa-solid fa-mobile-screen-button"></i>
                                    <div class="list-details">
                                        <h2><?php echo esc_html( $mavix_education_phone_number ); ?></h2>
                                        <span><?php echo esc_html( $mavix_education_opening_time ); ?></span>
                                    </div><!-- .list-details -->
                                </li>
                            <?php endif;?>

                            <?php if( !empty( $mavix_education_email_id || $mavix_education_support_text ) ):?>
                                <li>
                                    <i class="fa-regular fa-envelope"></i>
                                    <div class="list-details">
                                        <h2><?php echo esc_html( $mavix_education_email_id ); ?></h2>
                                        <span><?php echo esc_html( $mavix_education_support_text ); ?></span>
                                    </div><!-- .list-details -->
                                </li>
                            <?php endif;?>
                        </ul>
                    </div><!-- .site-contact-details -->
                <?php } ?>
            </div><!-- .wrapper -->
        </div><!-- .header-top -->

        <div class="header-bottom">
            <div class="wrapper">
                <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php echo esc_attr__('Primary Menu', 'mavix-education'); ?>">
                    <button type="button" class="menu-toggle">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <?php
                    $mavix_education_show_menu_button   = mavix_education_get_option( 'mavix_education_show_menu_button' );
                    $mavix_education_menu_button_text   = mavix_education_get_option( 'mavix_education_menu_button_text' );
                    $mavix_education_menu_button_url    = mavix_education_get_option( 'mavix_education_menu_button_url' );

                    $mavix_education_custom_button = '';
                    if( $mavix_education_show_menu_button ) {
                        $mavix_education_custom_button .= '<div class="custom-menu-item"><a href="'. esc_url( $mavix_education_menu_button_url ) .'" class="btn">'
                                . esc_html( $mavix_education_menu_button_text ) .'</a>
                                </div>';
                    }

                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'nav-menu',
                        'fallback_cb'    => 'mavix_education_primary_navigation_fallback',
                    ) );
                    ?>

                    <?php echo $mavix_education_custom_button; ?>
                </nav><!-- #site-navigation -->
            </div><!-- .wrapper -->
        </div><!-- .header-bottom -->
<?php }
endif;
add_action( 'mavix_education_action_header', 'mavix_education_site_branding', 10 );

if ( ! function_exists( 'mavix_education_footer_top_section' ) ) :

  /**
   * Top  Footer 
   *
   * @since 1.0.0
   */
  function mavix_education_footer_top_section() {
      $mavix_education_footer_sidebar_data = mavix_education_footer_sidebar_class();
      $mavix_education_footer_sidebar    = $mavix_education_footer_sidebar_data['active_sidebar'];
      $mavix_education_footer_class      = $mavix_education_footer_sidebar_data['class'];
      if ( empty( $mavix_education_footer_sidebar ) ) {
        return;
      }      ?>
      <div class="footer-widgets-area section-gap <?php echo esc_attr( $mavix_education_footer_class ); ?>"> <!-- widget area starting from here -->
          <div class="wrapper">
            <?php
              for ( $i = 1; $i <= 4 ; $i++ ) {
                if ( is_active_sidebar( 'footer-' . $i ) ) {
                ?>
                  <div class="hentry">
                    <?php dynamic_sidebar( 'footer-' . $i ); ?>
                  </div>
                  <?php
                }
              }
            ?>
            </div>
          
      </div> <!-- widget area starting from here -->
    <?php
 }
endif;

add_action( 'mavix_education_action_footer', 'mavix_education_footer_top_section', 10 );

if ( ! function_exists( 'mavix_education_footer_section' ) ) :

  /**
   * Footer copyright
   *
   * @since 1.0.0
   */
  function mavix_education_footer_section() { ?>
    <div class="site-info">    
        <?php 
            $mavix_education_copyright_footer = mavix_education_get_option('copyright_text'); 
            if ( ! empty( $mavix_education_copyright_footer ) ) {
                $mavix_education_copyright_footer = wp_kses_data( $mavix_education_copyright_footer );
            }
            // Powered by content.
            $mavix_education_powered_by_text = sprintf( __( ' Theme Mavix Education by %s', 'mavix-education' ), '<a target="_blank" rel="designer" href="'. esc_url( 'http://creativthemes.com/' ) .'">Creativ Themes</a>' );
        ?>
        <div class="wrapper">
            <span class="copy-right"><?php echo esc_html($mavix_education_copyright_footer);?><?php echo $mavix_education_powered_by_text;?></span>
        </div><!-- .wrapper --> 
    </div> <!-- .site-info -->
    
  <?php }

endif;
add_action( 'mavix_education_action_footer', 'mavix_education_footer_section', 20 );

if ( ! function_exists( 'mavix_education_footer_sidebar_class' ) ) :
  /**
   * Count the number of footer sidebars to enable dynamic classes for the footer
   *
   * @since mavix_education 0.1
   */
  function mavix_education_footer_sidebar_class() {
    $mavix_education_data = array();
    $mavix_education_active_sidebar = array();
      $mavix_education_count = 0;

      if ( is_active_sidebar( 'footer-1' ) ) {
        $mavix_education_active_sidebar[]   = 'footer-1';
          $mavix_education_count++;
      }

      if ( is_active_sidebar( 'footer-2' ) ){
        $mavix_education_active_sidebar[]   = 'footer-2';
          $mavix_education_count++;
    }

      if ( is_active_sidebar( 'footer-3' ) ){
        $mavix_education_active_sidebar[]   = 'footer-3';
          $mavix_education_count++;
      }

      if ( is_active_sidebar( 'footer-4' ) ){
        $mavix_education_active_sidebar[]   = 'footer-4';
          $mavix_education_count++;
      }

      $mavix_education_class = '';

      switch ( $mavix_education_count ) {
          case '1':
            $mavix_education_class = 'col-1';
            break;
          case '2':
            $mavix_education_class = 'col-2';
            break;
          case '3':
            $mavix_education_class = 'col-3';
            break;
            case '4':
            $mavix_education_class = 'col-4';
            break;
      }

    $mavix_education_data['active_sidebar'] = $mavix_education_active_sidebar;
    $mavix_education_data['class']        = $mavix_education_class;

      return $mavix_education_data;
  }
endif;

if ( ! function_exists( 'mavix_education_excerpt_length' ) ) :

  /**
   * Implement excerpt length.
   *
   * @since 1.0.0
   *
   * @param int $length The number of words.
   * @return int Excerpt length.
   */
  function mavix_education_excerpt_length( $length ) {

    if ( is_admin() ) {
      return $mavix_education_length;
    }

    $mavix_education_excerpt_length = mavix_education_get_option( 'excerpt_length' );

    if ( absint( $mavix_education_excerpt_length ) > 0 ) {
      $mavix_education_length = absint( $mavix_education_excerpt_length );
    }

    return $mavix_education_length;
  }

endif;

add_filter( 'excerpt_length', 'mavix_education_excerpt_length', 999 );

if( ! function_exists( 'mavix_education_banner_header' ) ) :
    /**
     * Page Header
    */
    function mavix_education_banner_header() { ?>
        <?php if( !is_front_page() || is_home() ) { ?>
            <div id="header-image">
                <?php the_custom_header_markup(); ?>
                <header class='page-header'>
                    <div class="wrapper">
                        <?php mavix_education_banner_title();?>
                    </div><!-- .wrapper -->
                </header>
            </div><!-- #header-image -->
        <?php } ?>

        <?php
    }
endif;
add_action( 'mavix_education_banner_header', 'mavix_education_banner_header', 10 );

if( ! function_exists( 'mavix_education_banner_title' ) ) :
/**
 * Page Header
*/
function mavix_education_banner_title(){ 
    if ( ( is_front_page() && is_home() ) || is_home() ){ 
        $mavix_education_your_latest_posts_title = mavix_education_get_option( 'your_latest_posts_title' );?>
        <h2 class="page-title"><?php echo esc_html($mavix_education_your_latest_posts_title); ?></h2><?php
    }

    if( is_singular() ) {
        the_title( '<h2 class="page-title">', '</h2>' );
    }       

    if( is_archive() ){
        the_archive_description( '<div class="archive-description">', '</div>' );
        the_archive_title( '<h2 class="page-title">', '</h2>' );
    }

    if( is_search() ){ ?>
        <h2 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'mavix-education' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
    <?php }
    
    if( is_404() ) {
        echo '<h2 class="page-title">' . esc_html__( 'Error 404', 'mavix-education' ) . '</h2>';
    }
}
endif;

if ( ! function_exists( 'mavix_education_posts_tags' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function mavix_education_posts_tags() {
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() && has_tag() ) { ?>
                <div class="tags-links">

                    <?php /* translators: used between list items, there is a space after the comma */
                    $mavix_education_tags = get_the_tags();
                    if ( $mavix_education_tags ) {

                        foreach ( $mavix_education_tags as $tag ) {
                            echo '<span><a href="' . esc_url( get_tag_link( $tag->term_id ) ) .'">' . esc_html( $tag->name ) . '</a></span>'; // WPCS: XSS OK.
                        }
                    } ?>
                </div><!-- .tags-links -->
        <?php } 
    }
endif;