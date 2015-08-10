<?php

/**
 * Build the address
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://dev-notes.eu
 * @since      1.0.0
 *
 * @package    Address
 * @subpackage Address/admin/partials
 */
?>

<h3><span itemprop="name">{{site.business-name}}</span></h3>
<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
 <?= !empty( $address['address_line_1'] ) ? '<span itemprop="streetAddress">' . $address['address_line_1'] . '</span><br />' : null; ?>
 <?= !empty( $address['address_line_2'] ) ? '<span itemprop="streetAddress">' . $address['address_line_2'] . '</span><br />' : null; ?>
 <?= !empty( $address['town'] ) ? '<span itemprop="addressLocality">' . $address['town'] . '</span><br />' : null; ?>
 <?= !empty( $address['county'] ) ? '<span itemprop="addressLocality">' . $address['county'] . '</span><br />' : null; ?>
 <?= !empty( $address['country'] ) ? '<span itemprop="addressCountry">' . $address['country'] . '</span><br />' : null; ?>
 <?= !empty( $address['postcode'] ) ? '<span itemprop="postalCode">' . $address['postcode'] . '</span>' : null; ?>
</div>
