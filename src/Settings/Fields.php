<?php
namespace Carawebs\Address\Settings;

abstract class Fields

{

    public function fieldCallbackText( array $args ) {
        $value = get_option( $args['name'] );
        printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />',
            $args['name'],
            $args['type'],
            $args['placeholder'],
            $value
        );

        //register_setting( 'carawebs-address-options-page', 'our_first_field' );
        echo ! empty( $args['desc'] ) ? "<p class='description'>{$args['desc']}</p>" : NULL;
    }

}
