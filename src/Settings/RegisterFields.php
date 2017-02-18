<?php
namespace Carawebs\Address\Settings;

/**
* Control the registration of new settings in in the {$wpdb->prefix}_options table.
*/
class RegisterFields extends Fields
{

    /**
    * Register a setting.
    * @param  array  $args [description]
    * @return [type]       [description]
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
        add_action( 'admin_init', [$this, 'setup_fields'] );
    }

    public function setup_fields() {
        foreach ($this->config['fields'] as $value) {
            $args = [
                'option' => $this->optionName ?? NULL,
                'type' => $value['type'] ?? NULL,
                'name' => $value['name'] ?? NULL,
                'desc' => $value['desc'] ?? NULL,
                'placeholder' => $value['placeholder'] ?? NULL,
                'title' => $value['title'] ?? NULL
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

}
