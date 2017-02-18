<?php
namespace Carawebs\Address\Settings;

abstract class Fields

{

    public function fieldCallbackText( array $args ) {
        $fieldArgs = $this->createFieldArgs($args);
        printf( '<input name="%1$s" id="%2$s" type="%3$s" placeholder="%4$s" value="%5$s" />',
            $fieldArgs['name'],
            $fieldArgs['id'],
            $fieldArgs['type'],
            $fieldArgs['placeholder'],
            $fieldArgs['value']
        );
        echo ! empty( $args['desc'] ) ? "<p class='description'>{$args['desc']}</p>" : NULL;
    }

    public function fieldCallbackTextarea( array $args ) {
        $fieldArgs = $this->createFieldArgs($args);
        printf( '<textarea name="%1$s" id="%2$s" type="%3$s" placeholder="%4$s">%5$s</textarea>',
            $fieldArgs['name'],
            $fieldArgs['id'],
            $fieldArgs['type'],
            $fieldArgs['placeholder'],
            $fieldArgs['value']
        );
        echo ! empty( $args['desc'] ) ? "<p class='description'>{$args['desc']}</p>" : NULL;
    }

    /**
     * Create the specific arguments necessary to populate the field callback.
     *
     * @param array $args 'Raw' field arguments
     */
    public function createFieldArgs(array $args)
    {
        $settings = (array)get_option( $args['option'] );
        $option = $args['option'];
        $name = $option . '[' . $args['name'] . ']';
        $id = $args['name'];
        $type = $args['type'];
        $placeholder = $args['placeholder'];
        $value = $settings[$args['name']] ?? NULL;
        $value = esc_attr($value);
        return compact('name', 'id', 'type', 'placeholder', 'value');
    }


}
