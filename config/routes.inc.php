<?php

namespace App\Config;

use Nata\Routing\Router;

Router::connect('/', ['controller' => 'pages', 'action' => 'home']);
Router::connect('/:controller', ['action' => 'index']);
Router::connect('/:controller/:action/*');
