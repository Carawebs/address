<?php
namespace Carawebs\Address\Settings;

/**
 * Control the registration of new settings in in the {$wpdb->prefix}_options table.
 */
class Controller
{
    /**
     * Create a new Settings\Controller instance
     * @param Config          $config          The configuration object
     * @param RegisterSetting $registerSetting Object that registers settings
     * @param OptionsPage     $optionsPage     Object that sets up options page
     * @param RegisterSection $registerSection Object that registers sections
     * @param RegisterFields  $registerFields  Object that registers fields
     */
    function __construct(
        Config $config,
        RegisterSetting $registerSetting,
        OptionsPage $optionsPage,
        RegisterSection $registerSection,
        RegisterFields $registerFields
        )
    {
        $this->config = $config->container;
        $this->registerSetting = $registerSetting;
        $this->registerSection = $registerSection;
        $this->optionsPage = $optionsPage;
        $this->registerFields = $registerFields;
        $this->setup();
    }

    /**
     * Setup the options for this plugin.
     *
     * @return void
     */
    public function setup()
    {
        foreach ($this->config as $value) {
            $optionName = $value['setting']['option_name'];
            $settingArgs = $value['setting'];
            $sectionsArgs = $value['sections'];
            $pageSlug = $value['page']['unique_page_slug'];

            $this->optionsPage->setPageArgs($value)->addOptionsPage();
            $this->registerSetting->init($settingArgs);
            $this->addSectionsAndFields($sectionsArgs, $pageSlug, $optionName);
        }
    }

    /**
     * Controls the registration of sections and fields.
     *
     * Loops through section arguments, which contains an array of field arguments
     * for each section.
     *
     * @param array $sectionArgs Section arguments, including field arguments
     * @param string $pageSlug   The page slug - defined as 'unique_page_slug' in $config['page']
     * @param string $optionName  The registered option name as defined by `register_setting()`
     */
    public function addSectionsAndFields($sectionArgs, $pageSlug, $optionName)
    {
        foreach ($sectionArgs as $value) {
            $this->registerSection->setSectionArgs($value, $pageSlug)->addSection();
            $this->registerFields->setArgs($value, $pageSlug, $optionName)->addFields();
        }
    }
}
