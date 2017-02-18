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
    public function setArgs(array $args, $pageSlug)
    {
        var_dump($args);
        $this->config = $args;
        $this->pageSlug = $pageSlug;
        //$this->optionName = $args['option_name'];
        return $this;
    }

    public function addFields()
    {
        static $i = 1;
        // This action is getting the callback method ONCE. Dynamically setting the callback
        // therefore won't work to register multiple sections.
        add_action( 'admin_init', [$this, 'setupFields'] );
        var_dump($i);
        $i ++;
    }

    // This must be ALL Fields from ALL sections!
    public function setupFields()
    {
        foreach ($this->config as $section_id => $field) {
            var_dump($field);
            if (! $this->isFieldTypeValid($field)) {
                return;
            }
            // Loop through settings fields??
            // Get all fields from a common group??
            $args = [
                'option' => $this->optionName ?? NULL,
                'type' => $field[0]['type'] ?? NULL,
                'name' => $field[0]['name'] ?? NULL,
                'desc' => $field[0]['desc'] ?? NULL,
                'placeholder' => $field[0]['placeholder'] ?? NULL,
                'title' => $field[0]['title'] ?? NULL,
                'multi_options' => $field[0]['multi_options'] ?? NULL
            ];
            var_dump($args);
            add_settings_field(
                $args['name'],
                $args['title'],
                [ $this, 'fieldCallback' . ucfirst($args['type']) ],
                $this->pageSlug,
                $section_id, // The section ID
                $args
            );
        }
    }

    /**
     * Check that the type of field is allowed.
     *
     * @param  array  $field The field config
     * @return boolean
     */
    private function isFieldTypeValid($field)
    {
        return true;
    }
}
