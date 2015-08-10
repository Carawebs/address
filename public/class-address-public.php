<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://dev-notes.eu
 * @since      1.0.0
 *
 * @package    Address
 * @subpackage Address/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Address
 * @subpackage Address/public
 * @author     David Egan <david@carawebs.com>
 */
class Address_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	private $option_name;
	private $options;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->option_name = 'carawebs_' . $plugin_name;
		$this->options = get_option( $this->option_name . '_data' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Address_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Address_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/address-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Address_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Address_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/address-public.js', array( 'jquery' ), $this->version, false );

	}

	public function define_hooks() {

		//$this->loader->add_action( 'init', $plugin_public, 'register_shortcodes' );

	}

	public function register_shortcodes() {

		add_shortcode( 'address', array( $this, 'address_shortcode') );
		add_shortcode( 'anothershortcode', array( $this, 'another_shortcode_function') );

	}

	public function address_shortcode( $atts ){

		$address = $this->get_address();

		return $address;

	}

	private function get_address() {

		$address = $this->options;
		ob_start()

		?>
		<?= !empty( $address['business_name'] ) ? '<h3><span itemprop="name">' . $address['business_name'] . '</span></h3>' : null; ?>
    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
		 <?= !empty( $address['address_line_1'] ) ? '<span itemprop="streetAddress">' . $address['address_line_1'] . '</span><br />' : null; ?>
		 <?= !empty( $address['address_line_2'] ) ? '<span itemprop="streetAddress">' . $address['address_line_2'] . '</span><br />' : null; ?>
		 <?= !empty( $address['town'] ) ? '<span itemprop="addressLocality">' . $address['town'] . '</span><br />' : null; ?>
		 <?= !empty( $address['county'] ) ? '<span itemprop="addressLocality">' . $address['county'] . '</span><br />' : null; ?>
		 <?= !empty( $address['country'] ) ? '<span itemprop="addressCountry">' . $address['country'] . '</span><br />' : null; ?>
		 <?= !empty( $address['postcode'] ) ? '<span itemprop="postalCode">' . $address['postcode'] . '</span>' : null; ?>
    </div>
		<?php

		return ob_get_clean();

	}

}
