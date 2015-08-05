<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://dev-notes.eu
 * @since      1.0.0
 *
 * @package    Address
 * @subpackage Address/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Address
 * @subpackage Address/admin
 * @author     David Egan <david@carawebs.com>
 */
class Address_Admin {

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

	/**
	 * The options name to be used in this plugin
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     string      $option_name    Option name of this plugin
	 */
	private $option_name;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->option_name = 'carawebs_' . $plugin_name;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/address-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/address-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add an options page under the Settings submenu
	 *
	 * @since  1.0.0
	 */
		public function add_options_page() {

	    $this->plugin_screen_hook_suffix = add_options_page(
	    //add_options_page(
	        __( 'Address Settings', 'address' ),
	        __( 'Address Settings', 'address' ),
	        'manage_options',
	        $this->plugin_name,
	        array( $this, 'display_options_page' )
	    );

		}

	/**
	 * Render the options page for plugin
	 *
	 * @since  1.0.0
	 */
	public function display_options_page() {
	    include_once 'partials/address-admin-display.php';
	}

	public function register_setting(){

		// Add a General section
		add_settings_section(
			'general',
	    //$this->option_name . '_general',
	    __( 'General', 'address' ),
	    //array( $this, $this->option_name . '_general_cb' ),
	    array( $this, 'general_cb' ),
	    $this->plugin_name
		);

		add_settings_field(
	    $this->option_name . '_address_1',
	    __( 'Address Line 1', 'address_1' ),
	    array( $this, $this->option_name . '_position_cb' ),
	    $this->plugin_name,
			$this->option_name . '_general',
	    array( 'label_for' => $this->option_name . '_position' )
		);
	}

	/**
 * Render the text for the general section
 *
 * @since  1.0.0
 */
	public function general_cb() {

  echo '<p>' . __( 'Please change the settings accordingly.', 'address' ) . '</p>';

	}

}
