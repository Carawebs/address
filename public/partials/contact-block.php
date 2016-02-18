<?php
/**
 * 
 */

?>
<ul class="carawebs-address-contact-list">
  <?php if ( !empty( $email ) ): ?>
  <li>
    <span itemprop="email">
    <a class="email" href="mailto:<?= $email; ?>" title="Email Us">
      Email Us
    </a>
    </span>
  </li>
  <?php endif; ?>
  <?php if ( !empty ( $twitter ) ): ?>
    <li>
      <a class="twitter" href="<?= $twitter; ?>" title="Follow us on Twitter">
        Follow Us on Twitter
      </a>
    </li>
  <?php endif; ?>
  <?php if ( !empty ( $facebook ) ): ?>
    <li>
      <a class="facebook" href="<?= $facebook; ?>" title="Find us on Facebook">
        Find Us on Facebook
      </a>
    </li>
  <?php endif; ?>
  <?php if ( !empty ( $landline ) && ! Helpers::is_phone() ): ?>
    <li>
      <span class="nonclick-phone">
        <?= apply_filters( 'carawebs_address_landline_button', 'Call us: ' . $landline, $landline ); ?>
      </span>
    </li>
  <?php endif; ?>
  <?php if ( !empty ( $landline ) && Helpers::is_phone() ): ?>
    <li>
      <a class="clickable-phone" href="tel:<?= $landline; ?>">
        Click to Call <?= $landline; ?>
      </a>
    </li>
  <?php endif; ?>
</ul>
