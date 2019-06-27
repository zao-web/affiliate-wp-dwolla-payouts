<?php
namespace AffiliateWpDwollaPayouts\Core;

/**
 * This is a very basic test case to get things started. You should probably rename this and make
 * it work for your project. You can use all the tools provided by WP Mock and Mockery to create
 * your tests. Coverage is calculated against your includes/ folder, so try to keep all of your
 * functional code self contained in there.
 *
 * References:
 *   - http://phpunit.de/manual/current/en/index.html
 *   - https://github.com/padraic/mockery
 *   - https://github.com/10up/wp_mock
 */

use AffiliateWpDwollaPayouts as Base;

class Core_Tests extends Base\TestCase {

	protected $testFiles = [
		'functions/core.php'
	];

	/**
	 * Test load method.
	 */
	public function test_setup() {
		// Setup
		\WP_Mock::expectActionAdded( 'init', 'AffiliateWpDwollaPayouts\Core\i18n' );
		\WP_Mock::expectActionAdded( 'init', 'AffiliateWpDwollaPayouts\Core\init' );
		\WP_Mock::expectAction( 'affiliate_wp_dwolla_payouts_loaded' );

		// Act
		setup();

		// Verify
		$this->assertConditionsMet();
	}

	/**
	 * Test internationalization integration.
	 */
	public function test_i18n() {
		// Setup
		\WP_Mock::userFunction( 'get_locale', array(
			'times' => 1,
			'args' => array(),
			'return' => 'en_US',
		) );
		\WP_Mock::onFilter( 'plugin_locale' )->with( 'en_US', 'affiliate-wp-dwolla-payouts' )->reply( 'en_US' );
		\WP_Mock::userFunction( 'load_textdomain', array(
			'times' => 1,
			'args' => array( 'affiliate-wp-dwolla-payouts', 'lang_dir/affiliate-wp-dwolla-payouts/affiliate-wp-dwolla-payouts-en_US.mo' ),
		) );
		\WP_Mock::userFunction( 'plugin_basename', array(
			'times' => 1,
			'args' => array( 'path' ),
			'return' => 'path',
		) );
		\WP_Mock::userFunction( 'load_plugin_textdomain', array(
			'times' => 1,
			'args' => array( 'affiliate-wp-dwolla-payouts', false, 'path/languages/' ),
		) );

		// Act
		i18n();

		// Verify
		$this->assertConditionsMet();
	}

	/**
	 * Test initialization method.
	 */
	public function test_init() {
		// Setup
		\WP_Mock::expectAction( 'affiliate_wp_dwolla_payouts_init' );

		// Act
		init();

		// Verify
		$this->assertConditionsMet();
	}

	/**
	 * Test activation routine.
	 */
	public function test_activate() {
		// Setup
		\WP_Mock::userFunction( 'flush_rewrite_rules', array(
			'times' => 1
		) );

		// Act
		activate();

		// Verify
		$this->assertConditionsMet();
	}

	/**
	 * Test deactivation routine.
	 */
	public function test_deactivate() {
		// Setup

		// Act
		deactivate();

		// Verify
		$this->assertTrue( true ); // Replace with actual assertion
	}
}
