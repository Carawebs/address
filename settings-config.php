<?php
return [
    [
        'type' => 'options_page',
        'setting' => [
            'option_name' => 'carawebs_address',
            'option_group' => 'General'
        ],
        'page' => [
            'page_title' => 'Carawebs Address',
            'menu_title' => 'Address & Contact Details',
            'capability' => 'manage_options',
            'menu_slug' => 'carawebs-address-options-page',
        ],
        'sections' => [
            [
                'id' => 'main',
                'title' => 'Main Section',
                'fields' =>[
                    [
                        'type' => 'text',
                        'name' => 'address_line_1',
                        'title' => 'Address Line One',
                        //'desc' => 'Enter data',
                        'default' => NULL,
                        'placeholder' => 'Type here'
                    ],
                    [
                        'type' => 'text',
                        'name' => 'address_line_2',
                        'title' => 'Address Line Two',
                        //'desc' => 'Enter data',
                        'default' => NULL,
                    ],
                    [
                        'type' => 'text',
                        'name' => 'town',
                        'title' => 'Town',
                        //'desc' => 'Enter data',
                        'default' => NULL,
                    ],
                    [
                        'type' => 'text',
                        'name' => 'county',
                        'title' => 'County',
                        //'desc' => 'Enter data',
                        'default' => NULL,
                    ],
                    [
                        'type' => 'textarea',
                        'name' => 'description',
                        'title' => 'Description',
                        //'desc' => 'Enter data',
                        'default' => NULL,
                    ]
                ]
            ]
        ]
    ]
];
