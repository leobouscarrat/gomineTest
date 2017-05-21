<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('DashedRoute');

Router::scope('/', function ($routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Downloads', 'action' => 'display']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
    $routes->connect('/tweety/*', ['controller' => 'Downloads', 'action' => 'display']);
    $routes->redirect('/sylvester/', ['controller' => 'Downloads', 'action' => 'display']);
    $routes->connect('/sylvester/:virtFolder/**', ['controller' => 'Downloads', 'action' => 'files'],['pass' => array('virtFolder')]);
    $routes->connect('/testdl/:virtFolder/**', ['controller' => 'Downloads', 'action' => 'files2'],['pass' => ['virtFolder']]);
	$routes->connect('/testdlf/:id/:virtPath/**', ['controller' => 'Downloads', 'action' => 'dlFolder'], ['pass' => ['id', 'virtPath']]);
//     $routes->connect('/downloaddlFile
    $routes->connect('/mysteries/:virtFolder/**', ['controller' => 'Downloads', 'action' => 'download'],['pass' => array('virtFolder')]);
    $routes->connect('/acme/',['controller' => 'Admin', 'action' => 'dashboard']);
    $routes->connect('/acme/BugsBunny',['controller' => 'vpn', 'action' => 'vpn-status']);
    $routes->connect('/acme/BugsBunny/carrot',['controller' => 'vpn', 'action' => 'vpn-users']);
    $routes->connect('/acme/vpn',['controller' => 'vpncomptes', 'action' => 'index']);
    $routes->connect('/acme/Granny',['controller' => 'Users', 'action' => 'index']);
    $routes->connect('/acme/Granny/bake/*',['controller' => 'Users', 'action' => 'edit']);
    $routes->connect('/acme/YosemiteSam',['controller' => 'FileManager', 'action' => 'files']);
    $routes->connect('/acme/FoghornLeghorn',['controller' => 'Admin', 'action' => 'tools']);
    $routes->connect('/acme/Film',['controller' => 'Film', 'action' => 'index']);
    $routes->connect('/acme/DLCategory',['controller' => 'DLCategory', 'action' => 'index']);
    $routes->connect('/acme/Contents',['controller' => 'Contents', 'action' => 'index']);
    $routes->connect('/acme/Ticketheme',['controller' => 'TicketTheme', 'action' => 'index']);
    $routes->connect('/acme/Ticket',['controller' => 'Ticket', 'action' => 'index']);
    
    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks('DashedRoute');
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
