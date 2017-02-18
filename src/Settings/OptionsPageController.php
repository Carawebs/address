<?php
namespace Carawebs\Address\Settings;

/**
* Control the registration of new settings in in the {$wpdb->prefix}_options table.
*/
class OptionsPageController
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
        AddOptionsPage $optionsPage,
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
            $this->optionsPage->setPageArgs($this->config)->addOptionsPage();
            $this->addSectionsAndFields();

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
        public function addSectionsAndFields()
        {
            $pageSlug = $this->config['page']['unique_page_slug'];
            $fields = [];
            foreach ($this->config['sections'] as $section) {
                // Temp. Amend registerSetting
                $reg = [
                    'option_group' => $section['option_group'],
                    'option_name' => $section['option_name'],
                    'option_args' => $section['option_args'] ?? NULL
                ];
                $this->registerSetting->init($reg);
                $this->registerSection->setSectionArgs($section, $pageSlug)->addSection();
                $fields[$section['id']] = $section['fields'];
            }
            // Get all fields from each group, and build them together?
            // $this->registerSection->setSectionArgs($section, $pageSlug)->addSection();
            $this->registerFields->setArgs($fields, $pageSlug)->addFields();
            // e.g.
            // foreach()
        }
    }
