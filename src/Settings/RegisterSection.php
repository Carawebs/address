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
    * Register sections.
    */
    public function addSection() {

        // add_action( 'admin_init', [$this, 'setupSection'] );
        add_action( 'admin_init', function() {

            // If the $_GET['tab'] is set, loop through the sections and display the
            // correct sections.
            if(isset($_GET['tab'])) {
                foreach($this->sectionArgs as $section) {
                    if($_GET['tab'] === preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($section['tab']))) {
                        $this->addSettingsSection($section);
                    }
                }
            } else {
                reset($this->sectionArgs);
                $firstSectionKey = key($this->sectionArgs);
                $firstSection = $this->sectionArgs[$firstSectionKey];
                $this->addSettingsSection($firstSection);
            }
        });
    }

    public function addSettingsSection($section)
    {
        add_settings_section(
            $section['id'],
            $section['title'],
            [$this, 'defineSection'],
            $this->pageSlug
        );
    }

    public function setupSection()
    {
        foreach($this->sectionArgs as $section) {
            if(isset($_GET['tab']) && $_GET['tab'] === preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($section['tab']))) {
                add_settings_section(
                    $section['id'],
                    $section['title'],
                    [$this, 'defineSection'],
                    $this->pageSlug // THIS MUST BE THE menu_slug AS DEFINED WHEN SETTING UP PAGE.
                );
            }
        }
    }

    /**
     * Add a sub menu page to the Settings menu.
     * @return void
     */
    public function defineSection($args) {
        echo $this->sectionArgs[$args['id']]['description'] ?? NULL;
    }
}
