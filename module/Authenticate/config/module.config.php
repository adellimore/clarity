<?php
/**
 * Configuration file generated by ZFTool
 * The previous configuration file is stored in module.config.old
 *
 * @see https://github.com/zendframework/ZFTool
 */
return array(
    'router' => array(
        'routes' => array(
            'auth' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/authenticate',
                    'defaults' => array(
                        'controller' => 'Authenticate\Controller\Authenticate',
                        'action'     => 'index',
                    )
                ),
            ),
            'login' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/authenticate/login',
                    'defaults' => array(
                        'controller' => 'Authenticate\Controller\Authenticate',
                        'action'     => 'login',
                    )
                ),
            ),
            'register' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/authenticate/register',
                    'defaults' => array(
                        'controller' => 'Authenticate\Controller\Authenticate',
                        'action'     => 'register',
                    )
                ),
            ),
            'logout' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/logout',
                    'defaults' => array(
                        'controller' => 'Authenticate\Controller\Authenticate',
                        'action'     => 'logout',
                    )
                ),
            ),
        ),
    ),
    'services' => array(
        // Keys are the service names
        // Values are objects
        'auth_service' => new Authenticate\Authenticator\AuthenticationAdapter(),
    ),

    'controllers' => array('invokables' => array('Authenticate\Controller\Authenticate' => 'Authenticate\Controller\AuthenticateController')),

    'view_manager' => array('template_path_stack' => array(__DIR__ . '/../view')),

    'di' => array(
        'services' => array(
            'Authenticate\Model\AuthTable' => 'Authenticate\Model\AuthTable'))
);