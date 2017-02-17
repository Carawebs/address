<?php
namespace Carawebs\Address\Settings;

/**
 * Control the registration of new settings in in the {$wpdb->prefix}_options table.
 */
class Controller
{

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
        $this->optionsPageSetup();
    }

    public function optionsPageSetup()
    {
        foreach ($this->config as $value) {
            $this->optionsPage->setPageArgs($value['page'])->addOptionsPage();
            $this->registerSetting->init($value['setting']);
            $this->addSectionsAndFields($value['sections'], $value['page']['menu_slug']);

        }
    }

    public function addSectionsAndFields($sectionArgs, $pageSlug)
    {
        foreach ($sectionArgs as $value) {
            $this->registerSection->setSectionArgs($value, $pageSlug)->addSection();
            $this->registerFields->setArgs($value, $pageSlug)->addFields();
        }
    }
}
