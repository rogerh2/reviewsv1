<?php
/**
 * Welcome Screen Class
 */
class Integral_Welcome {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'integral_welcome_register_menu' ) );

		/* activation notice */
		add_action( 'admin_init', array( $this, 'integral_activation_admin_notice' ) );

		/* enqueue script and style for welcome screen */
		add_action( 'admin_enqueue_scripts', array( $this, 'integral_welcome_style_and_scripts' ) );

		/* load welcome screen */
		add_action( 'integral_welcome', array( $this, 'integral_welcome_getting_started' ), 	    10 );
		add_action( 'integral_welcome', array( $this, 'integral_welcome_theme_support' ),        	20 );
		add_action( 'integral_welcome', array( $this, 'integral_welcome_import_demo' ), 		    30 );
		add_action( 'integral_welcome', array( $this, 'integral_welcome_child_themes' ), 		    40 );

		/* Dismissable notice */
		add_action('admin_init',array($this,'dismiss_welcome'),1);
	}

	/**
	 * Creates the dashboard page
	 */
	public function integral_welcome_register_menu() {
		add_theme_page( __( 'Setup Integral', 'integral' ), __( 'Setup Integral', 'integral' ), 'activate_plugins', 'integral-welcome', array( $this, 'integral_welcome_screen' ) );
	}

	/**
	 * Adds an admin notice upon successful activation.
	 */
	public function integral_activation_admin_notice() {
		global $current_user;

		if ( is_admin()) {

			$current_theme = wp_get_theme();
			$welcome_dismissed = get_user_meta($current_user->ID,'integral_welcome_admin_notice');

			if($current_theme->get('Name')== "Integral" && !$welcome_dismissed){
				add_action( 'admin_notices', array( $this, 'integral_welcome_admin_notice' ), 99 );
			}

		}
	}
	/**
	 * Adds a button to dismiss the notice
	 */
	function dismiss_welcome() {
		global $current_user;
		$user_id = $current_user->ID;

		if ( isset($_GET['integral_welcome_dismiss']) && $_GET['integral_welcome_dismiss'] == '1' ) {
			add_user_meta($user_id, 'integral_welcome_admin_notice', 'true', true);
		}
	}
	/**
	 * Display an admin notice linking to the welcome screen

	 */
	public function integral_welcome_admin_notice() {
		
		$dismiss_url = '<a href="' . esc_url( wp_nonce_url( add_query_arg( 'integral_welcome_dismiss', '1' ) ) ) . '" class="theme-notice-dismiss" target="_parent">' . __('Dismiss','integral') . '</a>';
		?>
			<div class="notice theme-notice is-dismissible">
				<div class="theme-notice-logo"><span></span></div>
				<div class="theme-notice-message wp-theme-fresh">
					<strong><?php _e( 'Welcome! Thank you for choosing Integral! ', 'integral' ); ?></strong><br />
					<?php _e( 'Visit our welcome page to setup Integral and start customizing your site.', 'integral' ); ?></div>
				<div class="theme-notice-cta">
					<a href="<?php echo esc_url( admin_url( 'themes.php?page=integral-welcome#getting_started' ) ); ?>" class="button button-hero" style="text-decoration: none;"><?php _e( 'Setup Integral', 'integral' ); ?></a>
					<a target="_blank" href="<?php echo esc_url('https://www.themely.com/themes/integral/'); ?>" class="button button-primary button-hero" style="text-decoration: none;"><?php _e( 'Upgrade to Integral PRO!', 'integral' ); ?></a>
				</div>
			</div>

			<style>
				.wrap .theme-notice.notice {
				    padding: 0;
				    margin: 5px 0 10px;
				    border: 1px solid #E5E5E5;
				    background: #FFF;
				    overflow: hidden;
				    -webkit-border-radius: 6px;
				    border-radius: 6px;
				    -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.05);
				    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.05);
				    position: relative;
				    z-index: 1;
				    min-height: 80px;
				    display: table;
				    / The magic ingredient! / font: 13px "Open Sans", sans-serif;
				}
				.wrap .theme-notice.notice.loading:before {
				    content: attr(data-message);
				    position: absolute;
				    left: 0;
				    right: 0;
				    top: 0;
				    bottom: 0;
				    background-color: rgba(255, 255, 255, 0.7);
				    z-index: 5;
				    text-align: center;
				    line-height: 80px;
				    font-size: 22px;
				    font-weight: bold;
				}
				.theme-notice > div {
				    display: table-cell;
				    vertical-align: middle;
				    cursor: default;
				    line-height: 1.5;
				}
				.theme-notice.notice.loading > div {
				    -webkit-filter: blur(2px);
				    -moz-filter: blur(2px);
				    -o-filter: blur(2px);
				    -ms-filter: blur(2px);
				    filter: blur(2px);
				}
				.theme-notice-logo {
				    background-color: #0073aa;
					background-image: url('<?php echo get_template_directory_uri(); ?>/inc/welcome/images/themely-logo.png');    
					background-repeat: no-repeat;
				    background-position: 50% 50%;
				}
				.theme-notice-logo span {
				    display: block;
				    width: 100px;
				    height: 80px;
				}
				.theme-notice-message {
				    padding: 10px 20px;
				    color: #444;
				}
				.theme-notice-message strong {
				    color: #000;
				}
				.theme-notice-cta {
				    border-left: 1px solid #E5E5E5;
				    background: #F8F8F8;
				    padding: 0 30px;
				    position: relative;
				    white-space: nowrap;
				}
				.wp-core-ui .theme-notice-cta button,
				.wp-core-ui .theme-notice-cta .button-primary:active {
				    vertical-align: middle;
				}
				.wp-core-ui .theme-notice-cta input[type="email"] {
				    vertical-align: middle;
				    line-height: 20px;
				    margin: 0;
				    min-width: 50px;
				    max-width: 320px;
				    text-align: center;
				    padding-left: 0;
				    padding-right: 0;
				}
				.theme-notice-dismiss {
				    background: transparent;
				    border: 0;
				    cursor: pointer;
				    color: #BBB;
				    padding:0;
				}
				.theme-notice-dismiss:hover {
				    color: #666;
				}
				@media only all and (max-width: 1200px) {
				    .theme-notice-dismiss {
				        display: block;
				        margin: 0 auto;
				        line-height: 18px;
				        padding-top: 8px;
				        padding-bottom: 2px;
				    }
				}
				@media only all and (max-width: 1000px) {
				    .wrap .theme-notice.notice {
				        display: block;
				        font-size: 13px;
				    }
				    .theme-notice > .theme-notice-logo {
				        float: left;
				        display: inline-block;
				        height: 80px;
				        margin: 10px;
				        border-radius: 4px;
				    }
				    .theme-notice > .theme-notice-message {
				        width: auto;
				        display: block;
				        padding: 10px;
				        min-height: 80px;
				    }
				    .theme-notice > .theme-notice-cta {
				        display: block;
				        border-top: 1px solid #E5E5E5;
				        border-left: 0;
				        text-align: center;
				        white-space: normal;
				        line-height: 30px;
				        padding: 10px 20px;
				    }
				    .wp-core-ui .theme-notice > .theme-notice-cta > input[type="email"],
				    .theme-notice > .theme-notice-cta > button {
				        font-size: 14px;
				    }
				    .theme-notice > .theme-notice-cta > .theme-notice-dismiss {
				        display: inline-block;
				        float: none;
				        line-height: 26px;
				        padding-top: 0;
				        padding-bottom: 0;
				        font-size: 13px;
				    }
				}
				@media only all and (max-width: 500px) {
				    .wp-core-ui .theme-notice > .theme-notice-cta > input[type="email"],
				    .theme-notice > .theme-notice-cta > button {
				        display: block;
				        width: 100% !important;
				        max-width: none;
				        margin-bottom: 4px;
				        font-size: 16px;
				        height: 34px;
				    }
				    .theme-notice > .theme-notice-cta > .theme-notice-dismiss {
				        margin-top: 5px;
				        font-size: 14px;
				        height: 23px;
				    }
				}
			</style>
		<?php
	}

	/**
	 * Load welcome screen css and javascript
	 */
	public function integral_welcome_style_and_scripts( $hook_suffix ) {

		if ( 'appearance_page_integral-welcome' == $hook_suffix ) {
			wp_enqueue_style( 'integral-welcome-screen-css', get_template_directory_uri() . '/inc/welcome/css/welcome.css' );
			wp_enqueue_script( 'integral-welcome-screen-js', get_template_directory_uri() . '/inc/welcome/js/welcome.js', array('jquery') );
		}
	}

	/**
	 * Welcome screen content
	 */
	public function integral_welcome_screen() {

		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );
		?>

		<div class="wrap about-wrap theme-welcome">

            <h1><?php esc_html_e('Welcome to Integral', 'integral'); ?> <span><?php esc_html_e('VERSION 1.3.7.7', 'integral'); ?></span></h1>

            <div class="about-text"><?php esc_html_e('Integral is a powerful one-page theme for professionals, agencies and businesses. Its strength lies in displaying content on a single page in a simple and elegant manner. It\'s super easy to customize and allows you to create a stunning website in minutes.', 'integral'); ?></div>

            <a class="wp-badge" href="<?php echo esc_url('https://www.themely.com/'); ?>" target="_blank"><span><?php esc_html_e('Visit Website', 'integral'); ?></span></a>

            <div class="clearfix"></div>

			<ul class="nav-tab-wrapper" role="tablist">
	            <li role="presentation" class="nav-tab nav-tab-active"><a href="#getting_started" aria-controls="getting_started" role="tab" data-toggle="tab"><?php esc_html_e( 'Getting Started','integral'); ?></a></li>
	            <li role="presentation" class="nav-tab"><a href="#theme_support" aria-controls="theme_support" role="tab" data-toggle="tab"><?php esc_html_e( 'Theme Support','integral'); ?></a></li>
	            <li role="presentation" class="nav-tab"><a href="#import_demo" aria-controls="import_demo" role="tab" data-toggle="tab"><?php esc_html_e( 'Import Demo','integral'); ?></a></li>
	            <li role="presentation" class="nav-tab"><a href="#child_themes" aria-controls="child_themes" role="tab" data-toggle="tab"><?php esc_html_e( 'Child Themes','integral'); ?></a></li>
	        </ul>

			<div class="info-tab-content">

				<?php do_action( 'integral_welcome' ); ?>

			</div>

		</div>

		<?php
	}

	/**
	 * Getting started
	 */
	public function integral_welcome_getting_started() {
		require_once( get_template_directory() . '/inc/welcome/getting-started.php' );
	}

	/**
	 * Theme Support
	 */
	public function integral_welcome_theme_support() {
		require_once( get_template_directory() . '/inc/welcome/theme-support.php' );
	}

	/**
	 * Import Demo
	 */
	public function integral_welcome_import_demo() {
		require_once( get_template_directory() . '/inc/welcome/import-demo.php' );
	}

	/**
	 * Child themes
	 */
	public function integral_welcome_child_themes() {
		require_once( get_template_directory() . '/inc/welcome/child-themes.php' );
	}
}

$GLOBALS['Integral_Welcome'] = new Integral_Welcome();