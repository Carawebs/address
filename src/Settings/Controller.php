<?php
namespace Carawebs\Address\Settings;

/**
 * Control the registration of new settings in in the {$wpdb->prefix}_options table.
 */
class Controller
{

    /**
     * Get the current page/tab being viewed
     * @since 2.0
     */
    public function getCurrentTab($referrer) {
        $request = parse_str($referrer, $request);
        if ( ! empty( $request['tab'] ) ) {
            return $request['tab'];
        } elseif ( ! empty( $this->default_tab ) ) {
            return $this->default_tab;
        } else {
            return $this->config['page']['unique_page_slug'];
        }
    }
}
