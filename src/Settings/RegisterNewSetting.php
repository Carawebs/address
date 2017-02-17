<?php
namespace Carawebs\Address\Settings;

/**
* Control the registration of new settings in in the {$wpdb->prefix}_options table.
*/
class RegisterNewSetting extends Settings
{

    function __construct(Config $config = NULL)
    {
        $this->config = $config['page one'];
        $this->defineProperties();
        $this->registerSetting();
        $this->addOptionsPage();
    }

    public function defineProperties()
    {
        $group_name = 'General'; $option_name = 'Location'; // Temp
        // A settings group name. Should correspond to a whitelisted option key name (page).
        // Default whitelisted option key names include "general," "discussion,"
        // and "reading," among others.
        $this->option_group = $group_name;

        // The name of an option to sanitize and save.
        $this->option_name = $option_name;

        // Data used to describe the setting when registered.
        $this->option_args = ['sanitize_callback' => 'sanitize_' . strtolower($option_name)];

    }

    public function registerSetting()
    {
        register_setting(
            $this->option_group,
            $this->option_name,
            $this->option_args
        );
    }

    /**
    * If a new page is required, run this
    */
    function addOptionsPage() {
        add_action( 'admin_menu', function() {
            $pageTitle = 'Carawebs Address';
            $menuTitle = 'Address & Contact Details';
            $capability = 'manage_options';
            $menuSlug = 'carawebs-address-options-page';
            $outputMethod = 'outputOptionsPage';
            add_options_page(
                __( $pageTitle, 'textdomain' ), //
                __( $menuTitle, 'textdomain' ),
                $capability,
                $menuSlug,
                [$this, $outputMethod]
            );
        });
    }

    public function outputOptionsPage()
    {
        echo "<h2>Settings Go Here</h2>";
    }
}
