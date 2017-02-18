<?php
namespace Carawebs\Address\Settings;

/**
* Control the registration of new settings in in the {$wpdb->prefix}_options table.
*/
class RegisterFields extends Fields
{
    /**
    * Register a setting.
    *
    * @param array  $args The settings array
    * @param string  $pageSlug The options page slug
    * @param string  $optionName
    * @return $this
    */
    public function setArgs(array $args, $pageSlug, $optionName)
    {
        $this->config = $args;
        $this->pageSlug = $pageSlug;
        $this->optionName = $optionName;
        return $this;
    }

    public function addFields()
    {
        add_action( 'admin_init', [$this, 'setupFields'] );
    }

    public function setupFields()
    {
        foreach ($this->config['fields'] as $value) {
            if (! $this->isFieldTypeValid($value)) {
                return;
            }
            $args = [
                'option' => $this->optionName ?? NULL,
                'type' => $value['type'] ?? NULL,
                'name' => $value['name'] ?? NULL,
                'desc' => $value['desc'] ?? NULL,
                'placeholder' => $value['placeholder'] ?? NULL,
                'title' => $value['title'] ?? NULL,
                'multi_options' => $value['multi_options'] ?? NULL
            ];
            add_settings_field(
                $args['name'],
                $args['title'],
                [ $this, 'fieldCallback' . ucfirst($args['type']) ],
                $this->pageSlug,
                $this->config['id'],
                $args
            );
        }
    }

    /**
     * Check that the type of field is allowed.
     *
     * @param  array  $value The field config
     * @return boolean
     */
    private function isFieldTypeValid($value)
    {
        return true;
    }
}
