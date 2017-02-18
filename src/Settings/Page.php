<?php
namespace Carawebs\Address\Settings;

/**
* Control the registration of new settings in in the {$wpdb->prefix}_options table.
*/
abstract class Page
{

    public function setPageArgs(array $args)
    {
        $this->pageArguments = $args['page'];
        $this->optionGroup = $args['setting']['option_group'];
        return $this;
    }

}
