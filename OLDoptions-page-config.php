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
            'unique_page_slug' => 'carawebs-address-options-page',
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
                        'default' => NULL,
                    ],
                    [
                        'type' => 'text',
                        'name' => 'town',
                        'title' => 'Town',
                        'default' => NULL,
                    ],
                    [
                        'type' => 'text',
                        'name' => 'county',
                        'title' => 'County',
                        'default' => NULL,
                    ],
                    [
                        'type' => 'textarea',
                        'name' => 'description',
                        'title' => 'Description',
                        'default' => NULL,
                    ],
                    [
                        'type' => 'select',
                        'name' => 'chooser',
                        'title' => 'Chooser',
                        'default' => NULL,
                        'multi_options' => [
                            'One' => 'sygg5253',
                            'Two' => '56t7hfgu',
                            'Three' => 'ontgrprt7'
                        ]
                    ]
                ]
            ],
            [
                'id' => 'prelim',
                'title' => 'Preliminary Section',
                'fields' =>[
                    [
                        'type' => 'text',
                        'name' => 'preee',
                        'title' => 'Test',
                        //'desc' => 'Enter data',
                        'default' => NULL,
                        'placeholder' => 'Type here'
                    ],
                ],
            ],
        ]
    ]
];
