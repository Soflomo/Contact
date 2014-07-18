<?php

return [
    'soflomo_contact' => [
        'to_address'   => null,
        'to_name'      => null,

        'subject'             => 'New message: %s',
        'email_template_html' => 'soflomo-contact/email/html',
        'email_template_text' => 'soflomo-contact/email/text',
    ],

    'ensemble_kernel' => [
        'routes' => [
            'contact' => [
                'options' => [
                    'defaults' => [
                        'controller' => 'Soflomo\Contact\Controller\ContactController',
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'ensemble_admin' => [
        'routes' => [
            'contact' => [
                'contact' => [
                    'type' => 'literal',
                    'options' => [
                        'route' => '/',
                        'defaults' => [
                            'controller' => 'Soflomo\ContactAdmin\Controller\ContactController',
                            'action'     => 'edit'
                        ],
                    ],
                ],
            ],
        ],
    ],

    'service_manager' => [
        'invokables' => [
            'Soflomo\Contact\Form\ContactForm'       => 'Soflomo\Contact\Form\ContactForm',
        ],
        'factories' => [
            'Soflomo\Contact\Options\ModuleOptions'  => 'Soflomo\Contact\Factory\ModuleOptionsFactory',
            'Soflomo\Contact\Service\ContactService' => 'Soflomo\Contact\Factory\ContactServiceFactory',
        ],
    ],

    'controllers' => [
        'factories' => [
            'Soflomo\Contact\Controller\ContactController' => 'Soflomo\Contact\Factory\ContactControllerFactory',
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],

    'doctrine' => [
        'driver' => [
            'soflomo_contact' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\XmlDriver',
                'paths' => __DIR__ . '/mapping'
            ],
            'orm_default' => [
                'drivers' => [
                    'Soflomo\Contact\Entity' => 'soflomo_contact'
                ],
            ],
        ],
    ],
];
