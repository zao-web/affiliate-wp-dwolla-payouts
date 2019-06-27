<?php
/**
 * Plugin Name: AffiliateWpDwollaPayouts
 * Plugin URI:
 * Description:
 * Version:     0.1.0
 * Author:      10up
 * Author URI:  https://10up.com
 * Text Domain: affiliate-wp-dwolla-payouts
 * Domain Path: /languages
 *
 * @package AffiliateWpDwollaPayouts
 */

// Useful global constants.
define( 'AFFILIATE_WP_DWOLLA_PAYOUTS_VERSION', '0.1.0' );
define( 'AFFILIATE_WP_DWOLLA_PAYOUTS_URL', plugin_dir_url( __FILE__ ) );
define( 'AFFILIATE_WP_DWOLLA_PAYOUTS_PATH', plugin_dir_path( __FILE__ ) );
define( 'AFFILIATE_WP_DWOLLA_PAYOUTS_INC', AFFILIATE_WP_DWOLLA_PAYOUTS_PATH . 'includes/' );

// Include files.
require_once AFFILIATE_WP_DWOLLA_PAYOUTS_INC . 'functions/core.php';

// Activation/Deactivation.
register_activation_hook( __FILE__, '\AffiliateWpDwollaPayouts\Core\activate' );
register_deactivation_hook( __FILE__, '\AffiliateWpDwollaPayouts\Core\deactivate' );

// Bootstrap.
AffiliateWpDwollaPayouts\Core\setup();

// Require Composer autoloader if it exists.
if ( file_exists( AFFILIATE_WP_DWOLLA_PAYOUTS_PATH . '/vendor/autoload.php' ) ) {
	require_once AFFILIATE_WP_DWOLLA_PAYOUTS_PATH . 'vendor/autoload.php';
}
