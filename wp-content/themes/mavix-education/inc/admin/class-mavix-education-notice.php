<?php
/**
 * Mavix Education main admin class
 *
 * @package Mavix Education
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class mavix_education_Admin_Main
 */
class mavix_education_Notice {
    public $theme_name;

    /**
     * Mavix Education Notice constructor.
     */
    public function __construct() {

        global $admin_main_class;

        add_action( 'admin_enqueue_scripts', array( $this, 'mavix_education_enqueue_scripts' ) );

        add_action( 'wp_loaded', array( $this, 'mavix_education_hide_welcome_notices' ) );
        add_action( 'wp_loaded', array( $this, 'mavix_education_welcome_notice' ) );


        add_action( 'wp_ajax_mavix_education_activate_plugin', array( $admin_main_class, 'mavix_education_activate_demo_importer_plugin' ) );
        add_action( 'wp_ajax_mavix_education_install_plugin', array( $admin_main_class, 'mavix_education_install_demo_importer_plugin' ) );

        add_action( 'wp_ajax_mavix_education_install_free_plugin', array( $admin_main_class, 'mavix_education_install_free_plugin' ) );
        add_action( 'wp_ajax_mavix_education_activate_free_plugin', array( $admin_main_class, 'mavix_education_activate_free_plugin' ) );

        //theme details
        $theme = wp_get_theme();
        $this->theme_name = $theme->get( 'Name' );
    }

    /**
     * Localize array for import button AJAX request.
     */
    public function mavix_education_enqueue_scripts() {
        wp_enqueue_style( 'mavix-education-admin-style', get_template_directory_uri() . '/inc/admin/assets/css/admin.css', array(), 20151215 );

        wp_enqueue_script( 'mavix-education-plugin-install-helper', get_template_directory_uri() . '/inc/admin/assets/js/plugin-handle.js', array( 'jquery' ), 20151215 );

        $demo_importer_plugin = WP_PLUGIN_DIR . '/creativ-demo-importer/creativ-demo-importer.php';
        if ( ! file_exists( $demo_importer_plugin ) ) {
            $action = 'install';
        } elseif ( file_exists( $demo_importer_plugin ) && !is_plugin_active( 'creativ-demo-importer/creativ-demo-importer.php' ) ) {
            $action = 'activate';
        } else {
            $action = 'redirect';
        }

        wp_localize_script( 'mavix-education-plugin-install-helper', 'ogAdminObject',
            array(
                'ajax_url'      => esc_url( admin_url( 'admin-ajax.php' ) ),
                '_wpnonce'      => wp_create_nonce( 'mavix_education_plugin_install_nonce' ),
                'buttonStatus'  => esc_html( $action )
            )
        );
    }

    /**
     * Add admin welcome notice.
     */
    public function mavix_education_welcome_notice() {

        if ( isset( $_GET['activated'] ) ) {
            update_option( 'mavix_education_admin_notice_welcome', true );
        }

        $welcome_notice_option = get_option( 'mavix_education_admin_notice_welcome' );

        // Let's bail on theme activation.
        if ( $welcome_notice_option ) {
            add_action( 'admin_notices', array( $this, 'mavix_education_welcome_notice_html' ) );
        }
    }

    /**
     * Hide a notice if the GET variable is set.
     */
    public static function mavix_education_hide_welcome_notices() {
        if ( isset( $_GET['mavix-education-hide-welcome-notice'] ) && isset( $_GET['_mavix_education_welcome_notice_nonce'] ) ) {
            if ( ! wp_verify_nonce( $_GET['_mavix_education_welcome_notice_nonce'], 'mavix_education_hide_welcome_notices_nonce' ) ) {
                wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', 'mavix-education' ) );
            }

            if ( ! current_user_can( 'manage_options' ) ) {
                wp_die( esc_html__( 'Cheat in &#8217; huh?', 'mavix-education' ) );
            }

            $hide_notice = sanitize_text_field( $_GET['mavix-education-hide-welcome-notice'] );
            update_option( 'mavix_education_admin_notice_' . $hide_notice, false );
        }
    }

    /**
     * function to display welcome notice section
     */
    public function mavix_education_welcome_notice_html() {
        $current_screen = get_current_screen();

        if ( $current_screen->id !== 'dashboard' && $current_screen->id !== 'themes' ) {
            return;
        }
        ?>
        <div id="mavix-education-welcome-notice" class="mavix-education-welcome-notice-wrapper updated notice">
            <a class="mavix-education-message-close notice-dismiss" href="<?php echo esc_url( wp_nonce_url( remove_query_arg( array( 'activated' ), add_query_arg( 'mavix-education-hide-welcome-notice', 'welcome' ) ), 'mavix_education_hide_welcome_notices_nonce', '_mavix_education_welcome_notice_nonce' ) ); ?>">
                <span class="screen-reader-text"><?php esc_html_e( 'Dismiss this notice.', 'mavix-education' ); ?>
            </a>
            <div class="mavix-education-welcome-title-wrapper">
                <h2 class="notice-title"><?php esc_html_e( 'Congratulations!', 'mavix-education' ); ?></h2>
                <p class="notice-description">
                    <?php
                        printf( esc_html__( '%1$s is now installed and ready to use. Clicking on Get started with Mavix Education will install and activate Creativ Demo Importer Plugin.', 'mavix-education' ), $this->theme_name );
                    ?>
                </p>
            </div><!-- .mavix-education-welcome-title-wrapper -->
            <div class="welcome-notice-details-wrapper">

                <div class="notice-detail-wrap general">
                    
                    <div class="general-info-links">
                        <div class="buttons-wrap">
                            <button class="mavix-education-get-started button button-primary button-hero" data-done="<?php esc_attr_e( 'Done!', 'mavix-education' ); ?>" data-process="<?php esc_attr_e( 'Processing', 'mavix-education' ); ?>" data-redirect="<?php echo esc_url( wp_nonce_url( add_query_arg( 'mavix-education-hide-welcome-notice', 'welcome', admin_url( 'admin.php' ).'?page=ct-options' ) , 'mavix_education_hide_welcome_notices_nonce', '_mavix_education_welcome_notice_nonce' ) ); ?>">
                                <?php printf( esc_html__( 'Get started with %1$s', 'mavix-education' ), esc_html( $this->theme_name ) ); ?>
                            </button>
                        </div><!-- .buttons-wrap -->
                    </div><!-- .general-info-links -->
                </div><!-- .notice-detail-wrap.general -->

            </div><!-- .welcome-notice-details-wrapper -->
        </div><!-- .mavix-education-welcome-notice-wrapper -->
<?php
    }
}
new mavix_education_Notice();