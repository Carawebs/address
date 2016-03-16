#Address WordPress Plugin
Work in Progress. Use at your own risk.

Adds an option page to add Physical address data to the options table of the database.

Builds the address data into a HTML block that is properly marked up according to [schema.org](http://schema.org).

Uses the [WP Plugin Boilerplate](https://github.com/DevinVinson/WordPress-Plugin-Boilerplate).

##Installation

1. Clone this repo to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add address data to your site: Dashboard >> Settings >> Address & Contact
4. Place `<?php do_action('carawebs_address'); ?>` in your templates
5. Use the shortcode `[address]` in the content area

##Available Filters

|Filter Hook|Value |Variables|
|----|----|----|
|`'carawebs_address_open_div'`|`'<div class="address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">'`|-|
|`'carawebs_address_business_name'`|`'<h3><span itemprop="name">' . $business_name . '</span></h3>'`|`$business_name`|
|`'carawebs_address_line_1'`|`'<span itemprop="streetAddress">' . $address_line_1 . '</span><br />'`|`$address_line_1`|
|`'carawebs_address_line_2'`|`'<span itemprop="streetAddress">' . $address_line_2 . '</span><br />'`|`$address_line_2`|
|`'carawebs_address_town'`|`'<span itemprop="addressLocality">' . $town . '</span><br />'`|`$town`|
|`'carawebs_address_county'`|`'<span itemprop="addressLocality">' . $address['county'] . '</span><br />'`|`$county`|
|`'carawebs_address_country'`|`'<span itemprop="addressCountry">' . $country . '</span><br />'`|`$country`|
|`'carawebs_address_postcode'`|`'<span itemprop="postalCode">' . $postcode . '</span>'`|`$postcode`|
|`'carawebs_address_close_div'`|`'</div>'`|-|

##Example Filter
The 'carawebs_address_business_name' filter receives two parameters:

* `'<h3><span itemprop="name">' . $business_name . '</span></h3>'`
* `$business_name`

An sample use of this filter within a theme would be:

~~~
<?php
add_filter( 'carawebs_address_business_name', __NAMESPACE__ . '\\filter_business_name', 1, 2 );

function filter_business_name( $content, $business_name ){

	return '<h4><span itemprop="name">' . $business_name . '</span></h4>';

}
~~~

## Changelog

1.0
* First Commit.
