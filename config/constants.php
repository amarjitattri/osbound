<?php

return [

    'options' => [

        'ONE_TIME_JQUERY_INFINITE_RESULTS' => 10,
        'JOB_MEDIA_DIRECTORY' => 'jobs/'
    
    ],

    'forms' => [
        'enquiries' => [
            'filters' => [
                'reasons' => [
                    '1' => "Too expensive",
                    '2' => 'Found Convenient alternative',
                    '3' => 'Slow response to enquiry',
                    '4' => 'Another competitor contracted',
                    '5' => 'Client not contactable'
                ],
                'status' => [
                    '1' => 'Live',
                    '2' => 'Converted',
                    '3' => 'Closed'
                ]
            ],
            'general_enquiry_questions' => [
                'enquiry_for' => [
                    'type' => 'select',
                    'title' => 'Enquiry For',
                    'field' => 'enquiry_for',
                    'options' => [
                        '1' => 'Osbond & Tutt',
                        '2' => 'London Spray Finishes'
                    ]
                ],
                'enquiry_owner' => [
                    'type' => 'select',
                    'title' => 'Enquiry Owner',
                    'field' => 'enquiry_owner',
                    'options' => [
                        '1' => [
                            '1' => 'John',
                            '2' => 'Steve'
                        ],
                        '2' => [
                            '1' => 'Alec',
                            '2' => 'Sales Rep 1'
                        ]
                    ]
                ],
                'hear_from' => [
                    'type' => 'select',
                    'title' => 'How did you hear about us?',
                    'field' => 'hear_from',
                    'options' => [
                        '1' => 'Email',
                        '2' => 'Google',
                        '3' => 'Instagram',
                        '4' => 'Facebook',
                        '5' => 'LinkedIn'
                    ]
                ], 
                'site_type' => [
                    'type' => 'select',
                    'title' => 'Site Type',
                    'field' => 'site_type',
                    'total' => '3',
                    'options' => [
                        '1' => 'Commercial building site',
                        '2' => 'Private home',
                        '3' => 'Private home building site',
                        '4' => 'Public space : Hotel, Restaurant, Museum',
                        '5' => 'vbcc',
                        '6' => 'Workshop/Commercial Premises',
                    ]
                ]

            ],

            'job_specific_enquiry_questions' => [
                'item_fixed' => [
                    'type' => 'select',
                    'title' => 'Is Item Fixed Or Portable',
                    'field' => 'item_fixed',
                    'options' => [
                        '1' => 'Fixed',
                        '2' => 'Portable',
                        '3' => 'Both'
                    ]
                ],

                'sheen_level' => [
                    'type' => 'select',
                    'title' => 'Do you have a sheen level in mind',
                    'field' => 'sheen_level',
                    'options' => [
                        '1' => 'Yes',
                        '2' => 'No'
                    ]
                ],
                
                'condition_substrate' => [
                    'type' => 'select',
                    'title' => 'Condition of Substrate',
                    'field' => 'condition_substrate',
                    'options' => [
                        '1' => 'New',
                        '2' => 'Existing',
                        '3' => 'Both'
                    ]
                ],
                
                'require_fitting_items' => [
                    'type' => 'select',
                    'title' => 'Removal & fitting of items required',
                    'field' => 'require_fitting_items',
                    'options' => [
                        '1' => 'Yes',
                        '2' => 'No',
                    ]
                ],
                
                'substrate_contact_area' => [
                    'type' => 'select',
                    'title' => 'Will Substrate be in a High Contact or Low Contact Area',
                    'field' => 'substrate_contact_area',
                    'options' => [
                        '1' => 'High Contact Area',
                        '2' => 'Low Contact Area',
                    ]
                ],
                
                'colour_choices' => [
                    'type' => 'select',
                    'title' => 'Colour Choices',
                    'sub_title' => 'Do you have a specific colour/effect in mind that you want to match or a colour card from
                    a paint supplier or do you want to visit our show room to pick from various effects',
                    'field' => 'colour_choices',
                    'options' => [
                        '1' => 'Specific Colour or Effect',
                        '2' => 'Colour Card from Paint Supplier',
                        '3' => 'Supply Own Materials or Paint',
                        '4' => 'Visit Showroom'
                    ]
                ],
                
                'contours_substrate_exposed' => [
                    'type' => 'select',
                    'title' => 'Do you want the contours of the substrate to be exposed?',
                    'sub_title' => 'With natural timber this could be the grain of the timber or the roughness of a textured piece of architectural metal',
                    'field' => 'contours_substrate_exposed',
                    'options' => [
                        '1' => 'Yes',
                        '2' => 'No',
                    ]
                ],

                'samples' => [
                    'type' => 'select',
                    'title' => 'Samples',
                    'field' => 'samples',
                    'options' => [
                        '1' => 'Samples Requested',
                        '2' => 'Samples Received',
                        '3' => 'Samples with Operatives',
                    ]
                ],


            ]

        ]
    ]
    
];

?>