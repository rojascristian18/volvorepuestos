<?php
Router::connect('/', array('controller' => 'categorias', 'action' => 'index'));
Router::connect('/repuestos', array('controller' => 'productos', 'action' => 'index'));
Router::connect('/repuestos/*', array('controller' => 'productos', 'action' => 'index'));
Router::connect('/repuestos/*/*', array('controller' => 'productos', 'action' => 'index'));

Router::connect('/concesionarios/:slug', array('controller' => 'concesionarios', 'action' => 'detail') );

Router::connect('/admin', array('controller' => 'productos', 'action' => 'index', 'admin' => true));
Router::connect('/admin/login', array('controller' => 'administradores', 'action' => 'login', 'admin' => true));

Router::connect('/seccion/*', array('controller' => 'pages', 'action' => 'display'));


CakePlugin::routes();
require CAKE . 'Config' . DS . 'routes.php';
