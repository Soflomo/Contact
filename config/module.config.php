<?php

return array(
    'soflomo_contact' => array(
        'to_address'   => null,
        'to_name'      => null,

        'subject'             => 'New message: %s',
        'email_template_html' => 'soflomo-contact/email/html',
        'email_template_text' => 'soflomo-contact/email/text',
    ),

    'ensemble_kernel' => array(
        'routes' => array(
            'contact' => array(
                'options' => array(
                    'defaults' => array(
                        'controller' => 'Soflomo\Contact\Controller\ContactController',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'service_manager' => array(
        'invokables' => array(
            'Soflomo\Contact\Form\ContactForm'       => 'Soflomo\Contact\Form\ContactForm',
        ),
        'factories' => array(
            'Soflomo\Contact\Options\ModuleOptions'  => 'Soflomo\Contact\Factory\ModuleOptionsFactory',
            'Soflomo\Contact\Service\ContactService' => 'Soflomo\Contact\Factory\ContactServiceFactory',
        ),
    ),

    'controllers' => array(
        'factories' => array(
            'Soflomo\Contact\Controller\ContactController' => 'Soflomo\Contact\Factory\ContactControllerFactory',
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

    'doctrine' => array(
        'driver' => array(
            'soflomo_contact' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\XmlDriver',
                'paths' => __DIR__ . '/mapping'
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Soflomo\Contact\Entity' => 'soflomo_contact'
                ),
            ),
        ),
    ),
);
