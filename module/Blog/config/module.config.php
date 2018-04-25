<?php
/**
 * Created by PhpStorm.
 * User: guabirabadev
 * Date: 24/04/2018
 * Time: 12:41
 */

namespace Blog;

use Zend\ServiceManager\Factory\InvokableFactory;

return [
  'controllers' => [
      'factories' => [
          #Controller\BlogController::class =>  InvokableFactory::class,
      ]
  ],

  'router' => [
      'routes' =>[
//          'blog' => [
//              'type' => 'literal',
//              'options' => [
//                  'route' => '/blog',
//                  'defaults' => [
//                      'controller' => Controller\BlogController::class,
//                      'action' => 'index'
//                  ]
//              ]
//          ],
          'post' => [
              'type' => 'segment',
              'options' => [
                  'route' => '/blog[/:action[/:id]]',
                  'constraints' => [
                    'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    'id' => '[0-9]+',
                  ],
                  'defaults' => [
                      'controller' => Controller\BlogController::class,
                      'action' => 'index'
                  ]
              ]
          ]
      ]
  ],

    'view_manager' => [
        'template_path_stack' => [
            'blog' => __DIR__ . "/../view"
        ]
    ]

];