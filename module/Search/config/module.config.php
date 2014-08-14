<?php
/**
 * Configuration file generated by ZFTool
 * The previous configuration file is stored in module.config.old
 *
 * @see https://github.com/zendframework/ZFTool
 */
return array(
    /* Removed
    'doctrine' => array(
        'driver' => array(
            'search_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Search/Entity')
            ),

            'orm_default' => array(
                'drivers' => array(
                    'Search\Entity' => 'search_entities')
            ),
        )
    ),
    */

    'router' => array(
        'routes' => array(
            'search' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/search',
                    'defaults' => array(
                        'controller' => 'Search\Controller\Search',
                        'action'     => 'index',
                    ),
                ),
            ),

            'form'  => array(
                'type'  => 'segment',
                'options'    => array(
                    'route' =>  '/form[/][/:sku]',
                    'constraints'   =>  array(
//                        'action'    =>  '[a-zA-Z]*',
                        'sku'    =>  '[0-9a-zA-Z\-]+',
                    ),

                    'defaults'  =>  array(
                        'controller'    => 'Search\Controller\Form',
                        'action'        =>  'index',

                    ),
                ),
            ),


            'quicksearch'  => array(
                'type'  => 'Zend\Mvc\Router\Http\Literal',
                'options'    => array(
                    'route' =>  '/search/quicksearch',

                    'defaults'  =>  array(
                        'controller'    => 'Search\Controller\Search',
                        'action'        =>  'quicksearch',

                    ),
                ),
            ),

            'mfcload'  => array(
                'type'  => 'Zend\Mvc\Router\Http\Literal',
                'options'    => array(
                    'route' =>  '/form/manufacturerload',

                    'defaults'  =>  array(
                        'controller'    => 'Search\Controller\Form',
                        'action'        =>  'manufacturerLoad',

                    ),
                ),
            ),

            'brand'  => array(
                'type'  => 'Zend\Mvc\Router\Http\Literal',
                'options'    => array(
                    'route' =>  '/form/brandload',

                    'defaults'  =>  array(
                        'controller'    => 'Search\Controller\Form',
                        'action'        =>  'brandLoad',
                    ),
                ),
            ),

            'imagesave'  => array(
                'type'  => 'Zend\Mvc\Router\Http\Literal',
                'options'    => array(
                    'route' =>  '/form/imagesave',

                    'defaults'  =>  array(
                        'controller'    => 'Search\Controller\Form',
                        'action'        =>  'imageSave',
                    ),
                ),
            ),

            'submitform'  => array(
                'type'  => 'Zend\Mvc\Router\Http\Literal',
                'options'    => array(
                    'route' =>  '/form/submit',

                    'defaults'  =>  array(
                        'controller'    => 'Search\Controller\Form',
                        'action'        =>  'submitForm',

                    ),
                ),
            ),
        ),
    ),

    'controllers' => array('invokables' => array('Search\Controller\Search' => 'Search\Controller\SearchController',
                                                 'Search\Controller\Form'   => 'Search\Controller\FormController'
                                                )
    ),
    'event_listener_construct' =>  array(
        'logger'  =>  array(
            'extra'    =>  array(
                'entity_id' => 'entity_id',
                'oldvalue'  =>  'oldvalue',
                'newvalue'  =>  'newvalue',
                'manufacturer'  =>  'manufacturer',
                'datechanged'   =>  'datechanged',
                'changedby' =>  'changedby',
                'property'  =>  'property',
            ),
        ),
    ),

    'view_manager' => array('template_path_stack' => array(__DIR__ . '/../view')),


    'di' => array(
    'services' => array(
        'Search' => 'Search\Model\SearchTable')),

);
