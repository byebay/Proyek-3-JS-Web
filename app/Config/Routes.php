<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', function () {
    return redirect()->to('/login');
});

$routes->get('/hello', 'Home::HelloWorld');

// Autentikasi
$routes->get('/login', 'UserController::login');
$routes->post('/login', 'UserController::loginProcess');
$routes->get('/logout', 'UserController::logout');


$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/matakuliah-mhs', 'MatakuliahMhs::index');
    $routes->get('/matakuliah-mhs/take/(:num)', 'MatakuliahMhs::take/$1');
    $routes->post('/matakuliah-mhs/store', 'MatakuliahMhs::store');
    // Home / dashboard
    $routes->get('/home','UserController::home');

    // Admin 
    $routes->group('', ['filter' => 'auth:admin'], function($routes) {
        $routes->get('/user', 'UserController::index');
        $routes->get('/detail/(:num)', 'UserController::detail/$1');

        // CRUD + Mata Kuliah
        $routes->get('/matakuliah', ('Courses::index'));
        $routes->get('/tambahmatakuliah', 'Courses::create');
        $routes->post('/courses/store', 'Courses::store');
        $routes->get('/editmatakuliah/(:num)', 'Courses::edit/$1');
        $routes->post('/updatematakuliah/(:num)', 'Courses::update/$1');
        $routes->get('/courses/delete/(:num)', 'Courses::delete/$1');

        // Hapus akun
        $routes->get('/hapus-akun', 'UserController::hapusAkunForm');
        $routes->post('/hapus-akun', 'UserController::hapusAkunProcess');

        // CRUD User
        $routes->get('/tambah', 'UserController::tambah');
        $routes->post('/simpan', 'UserController::simpan');
        $routes->get('/edit/(:num)', 'UserController::edit/$1');
        $routes->post('/update/(:num)', 'UserController::update/$1'); 
        $routes->get('/delete/(:num)', 'UserController::delete/$1');



    });
});
