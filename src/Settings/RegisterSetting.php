<?php
namespace Carawebs\Address\Settings;

/**
* Control the registration of new settings in in the {$wpdb->prefix}_options table.
*/
class RegisterSetting extends Page
{

    /**
     * Register a setting.
     * @param  array  $args [description]
     * @return [type]       [description]
     */
    public function init(array $args)
    {
        register_setting(
            $args['option_group'],
            $args['option_name'],
            $args['option_args'] ?? NULL
        );
    }

}
