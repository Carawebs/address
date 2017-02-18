<?php
namespace Carawebs\Address\Settings;

/**
 * Control the registration of new settings in in the {$wpdb->prefix}_options table.
 */
class RegisterSection
{

    public function setSectionArgs(array $args, $pageSlug)
    {
        $this->sectionArgs = $args;
        $this->pageSlug = $pageSlug;
        return $this;
    }

    /**
    * Run if a new sub menu page under the Settings menu is required.
    */
    public function addSection() {

        add_action( 'admin_init', [$this, 'setupSection'] );

    }

    public function setupSection()
    {

        add_settings_section(
            $this->sectionArgs['id'],
            'Example Title',
            [$this, 'defineSection'],
            $this->pageSlug // THIS MUST BE THE menu_slug AS DEFINED WHEN SETTING UP PAGE.
        );
    }

    /**
     * Add a sub menu page to the Settings menu.
     * @return void
     */
    public function defineSection($args) {
        //var_dump($args);
        //echo "<h2>{$args['title']}</h2>";
        // echo '<p>id: ' . $args['id'] . '</p>';             // id: eg_setting_section
        // echo '<p>title: ' . $args['title'] . '</p>';       // title: Example settings section in reading
        // echo '<p>callback: ' . $args['callback'] . '</p>'; // callback: eg_setting_section_callback_function

    }

}
