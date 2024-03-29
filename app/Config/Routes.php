<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
use App\Controllers\Home;
use App\Controllers\Usuario;
use App\Controllers\Comprovante;

$routes->get('usuario/cadastro', [Usuario::class, 'telaDeCadastro']);
$routes->post('usuario/salvar', [Usuario::class, 'salvar']);
$routes->get('usuario/edicao/(:segment)', [Usuario::class, 'telaDeDetalhe'],['filter' => 'authGuard']);
$routes->post('usuario/atualizar', [Usuario::class, 'atualizar'],['filter' => 'authGuard']);
$routes->get('usuario/deletar/(:segment)', [Usuario::class, 'deletar'],['filter' => 'authGuard']);
$routes->get('usuario', [Usuario::class, 'telaDeListagem'],['filter' => 'authGuard']);
// $routes->get('usuario', [Usuario::class, 'telaDeListagem']);

$routes->get('comprovante', [Comprovante::class, 'index'],['filter' => 'authGuard']);
$routes->get('comprovante/cadastrar', [Comprovante::class, 'cadastrar'],['filter' => 'authGuard']);
$routes->post('comprovante/salvar', [Comprovante::class, 'salvar']);
$routes->post('comprovante/atualizar', [Comprovante::class, 'atualizar'],['filter' => 'authGuard']);
$routes->get('comprovante/edicao/(:segment)', [Comprovante::class, 'edicao'], ['filter' => 'authGuard']);
$routes->get('comprovante/upload/(:segment)', [Comprovante::class, 'upload']);
$routes->get('comprovante/deletar/(:segment)', [Comprovante::class, 'deletar']);

$routes->get('/', 'Home::index');
$routes->get('login', [Home::class, 'index']);
$routes->post('logar', [Home::class, 'logar']);
$routes->get('(:segment)', [Home::class, 'view']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
