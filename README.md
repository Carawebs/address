#Address WordPress Plugin
Work in Progress. Use at your own risk.

Adds an option page to add Physical address data to the options table of the database.

Builds the address data into a HTML block that is properly marked up according to [schema.org](http://schema.org).

Uses the [WP Plugin Boilerplate](https://github.com/DevinVinson/WordPress-Plugin-Boilerplate).

##Installation

1. Clone this repo to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add address data to your site: Dashboard >> Settings >>Address & Contact
4. Place `<?php do_action('carawebs_address'); ?>` in your templates
5. Use the shortcode `[address]` in the content area

## Changelog

= 1.0 =
* First Commit.
